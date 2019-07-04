<?php

    Class ErrorLog {
        public function errorMessage($error){
            return "<div class='alert bg-red alert-dismissible' role='alert'>
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
                    Something went wrong while processing your request. <br>
                    <b>Error Description: </b>" . $error . "<br>
                    Please contact your administrator.
                    </div>";
        }
    }

?>