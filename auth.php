<?php

    require_once __DIR__ . '/../vendor/autoload.php';

    require_once("functions/connect.php");

    session_start();

    // Setting for Microsoft PHP SDK. For any changes to the configuration, refer to these files.
    require_once("functions/auth_settings.php");
    require_once("functions/auth_helper.php");
    require_once("functions/token.php");

    use Microsoft\Graph\Graph;
    use Microsoft\Graph\Model;

    if(!isset($_GET['code'])){
        $authUrl = AuthHelper::getAuthorizationUrl();
        header('location: '.$authUrl);
        exit();
    } else {

        $token = AuthHelper::getAccessTokenFromCode($_GET['code']);
        $graph = new Graph();
        $graph->setAccessToken($token->accessToken);
        $user = $graph->createRequest('GET', '/me?$select=displayName,givenName,surname,mail,department,id')
                ->setReturnType(Model\User::class)
                ->execute(); // Get O365 logged in user information
        $groups = $graph->createCollectionRequest('GET', '/me/memberOf')
                ->setReturnType(Model\Group::class)
                ->execute(); // Get O365 logged in user group list

        $gs = array();

        foreach($groups as $group):
            array_push($gs, $group->getDisplayName());
        endforeach;

        if(in_array("webadmins", $gs)){
            $username =  strstr($user->getMail(), '@', true);
            $password = $user->getId();

            $database = new Database();

            // Check if account is already in database
            $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
            $query = mysqli_query($database->con, $sql);
            if(!$query){
                session_destroy();
                header("location:https://login.microsoftonline.com/common/oauth2/logout?post_logout_redirect_uri=https://www.nisgaa.bc.ca/error");
            } else {
                $loginInfo = mysqli_fetch_assoc($query); 

                $id;
                $status;
                $role;
                $school;
                $firstname = $user->getGivenName();
                $lastname = $user->getSurname();
                $email = $user->getMail();
                
                if(in_array("appadmins", $gs)){
                    $role = 1;
                } else if($user->getDepartment() === "SDO" || $user->getDepartment() === "TechOffice") {
                    $role = 2;
                } else {
                    $role = 4;
                }
                
                if($user->getDepartment() === "TechOffice"){
                    $school = 1;
                } else if($user->getDepartment() === "NESS"){
                    $school = 3;
                } else if($user->getDepartment() === "AAMES"){
                    $school = 4;
                } else if($user->getDepartment() === "GES"){
                    $school = 5;
                } else if($user->getDepartment() === "NBES"){
                    $school = 6;
                } else {
                    $school = 2;
                }

                if(count($loginInfo) === 0){
                    // Create new account into the database if account doesn't exist
                    $sql = "INSERT INTO users VALUES (null, '$username', '$firstname', '$lastname', '$email', '$password', '$role', '$school', 'user.png', 'Active')";
                    $query = mysqli_query($database->con, $sql);
                    if(!$query){
                        session_destroy();
                        header("location:https://login.microsoftonline.com/common/oauth2/logout?post_logout_redirect_uri=https://www.nisgaa.bc.ca/error");
                    } else {
                        $sql = "SELECT id FROM users ORDER BY id DESC LIMIT 1";
                        $query = mysqli_query($database->con, $sql);
                        if(!$query){
                            session_destroy();
                            header("location:https://login.microsoftonline.com/common/oauth2/logout?post_logout_redirect_uri=https://www.nisgaa.bc.ca/restricted");
                        } else {
                            $row = mysqli_fetch_assoc($query);
                            
                            $id = $row['id'];
                            $status = $row['status'];
                        }
                    }
                } else {
                    $id = $loginInfo['id'];
                    $status = $loginInfo['status'];

                    if($loginInfo['school'] != $school || $loginInfo['type'] != $role){
                        // Update account based off of differences from user's O365 account
                        $sql = "UPDATE users SET user_type = '$role', school = '$school' WHERE id = '$id'";
                        $query = mysqli_query($database->con, $sql);
                        if(!$query){
                            session_destroy();
                            header("location:https://login.microsoftonline.com/common/oauth2/logout?post_logout_redirect_uri=https://www.nisgaa.bc.ca/error");
                        }
                    }
                }
                
                $_SESSION['id'] = $id;
                $_SESSION['type'] = $role;
                $_SESSION['username'] = $username;
                $_SESSION['school'] = $school;
                $_SESSION['alert'] = 'unalerted';
                $_SESSION['error_message'] = 'none';
                $_SESSION['event_view'] = 'LIST';
                
                if($status == 'Active'){
                    header("location: /cms/");
                } else {
                    session_destroy();
                    header("location:https://login.microsoftonline.com/common/oauth2/logout?post_logout_redirect_uri=https://www.nisgaa.bc.ca/restricted");
                }

            }
            
        } else {
            session_destroy();
            header("location:https://login.microsoftonline.com/common/oauth2/logout?post_logout_redirect_uri=https://www.nisgaa.bc.ca/restricted");
        }
    }

?>