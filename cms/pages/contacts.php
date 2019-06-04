<!-- School Information -->

<?php $school = $interaction->schoolInfo($database); ?>
<?php  require '../components/modals/edit_school.php'; ?>
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <div class="row clearfix">
                    <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 text-xs-sm-center">
                        <h4>SCHOOL INFORMATION</h4>      
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                        <center>
                            <button type="button" data-toggle="modal" data-target="#edit-school-modal" class="btn bg-green waves-effect" style="display: inline-block;" 
                            data-values='<?php echo json_encode(str_replace("'", "&apos;", $school)); ?>' onclick="editSchool(this);"><i class="material-icons">edit</i><span>MODIFY</span></button>
                        </center>
                    </div>
                </div>
            </div>
            <div class="body">
                <div class="row clearfix">
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <p><b>School Name:</b> <?php echo $school['school_name']; ?></p>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <p><b>Address:</b> <?php echo $school['school_addr']; ?></p>
                    </div>
                </div>
                <div class="row clearfix">
                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                        <p><b>School Abbreviation:</b> <?php echo $school['school_abbv']; ?></p>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                        <p><b>Email Address:</b> <?php echo $school['school_email']; ?></p>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                        <p><b>Phone Number: </b> <?php echo $school['school_phone']; ?></p>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                        <p><b>School Head: </b> <?php echo $school['school_principal']; ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- School list information - Visible only when logged in user is an Admin -->
<?php if($_SESSION['type'] == 1){ ?>
<div class="row clearfix">
    <!-- NESS -->
    <?php $school = $interaction->SchoolInfoPerSchool($database, 3); ?>
    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
                        <h4>SCHOOL INFORMATION - NESS</h4>      
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
                        <center>
                            <button type="button" data-toggle="modal" data-target="#edit-school-modal" class="btn bg-green waves-effect" style="display: inline-block;" 
                            data-values='<?php echo json_encode(str_replace("'", "&apos;", $school)); ?>' onclick="editSchool(this);"><i class="material-icons">edit</i><span>MODIFY</span></button>
                        </center>
                    </div>
                </div>
            </div>
            <div class="body">
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <p><b>School Name:</b> <?php echo $school['school_name']; ?></p>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <p><b>Address:</b> <?php echo $school['school_addr']; ?></p>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <p><b>School Abbreviation:</b> <?php echo $school['school_abbv']; ?></p>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <p><b>Email Address:</b> <?php echo $school['school_email']; ?></p>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <p><b>Phone Number: </b> <?php echo $school['school_phone']; ?></p>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <p><b>Principal: </b> <?php echo $school['school_principal']; ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- GES -->
    <?php $school = $interaction->SchoolInfoPerSchool($database, 5); ?>
    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
                        <h4>SCHOOL INFORMATION - GES</h4>      
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
                        <center>
                            <button type="button" data-toggle="modal" data-target="#edit-school-modal" class="btn bg-green waves-effect" style="display: inline-block;" 
                            data-values='<?php echo json_encode(str_replace("'", "&apos;", $school)); ?>' onclick="editSchool(this);"><i class="material-icons">edit</i><span>MODIFY</span></button>
                        </center>
                    </div>
                </div>
            </div>
            <div class="body">
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <p><b>School Name:</b> <?php echo $school['school_name']; ?></p>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <p><b>Address:</b> <?php echo $school['school_addr']; ?></p>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <p><b>School Abbreviation:</b> <?php echo $school['school_abbv']; ?></p>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <p><b>Email Address:</b> <?php echo $school['school_email']; ?></p>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <p><b>Phone Number: </b> <?php echo $school['school_phone']; ?></p>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <p><b>Principal: </b> <?php echo $school['school_principal']; ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- AAMES -->
    <?php $school = $interaction->SchoolInfoPerSchool($database, 4); ?>
    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
                        <h4>SCHOOL INFORMATION - AAMES</h4>      
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
                        <center>
                            <button type="button" data-toggle="modal" data-target="#edit-school-modal" class="btn bg-green waves-effect" style="display: inline-block;" 
                            data-values='<?php echo json_encode(str_replace("'", "&apos;", $school)); ?>' onclick="editSchool(this);"><i class="material-icons">edit</i><span>MODIFY</span></button>
                        </center>
                    </div>
                </div>
            </div>
            <div class="body">
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <p><b>School Name:</b> <?php echo $school['school_name']; ?></p>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <p><b>Address:</b> <?php echo $school['school_addr']; ?></p>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <p><b>School Abbreviation:</b> <?php echo $school['school_abbv']; ?></p>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <p><b>Email Address:</b> <?php echo $school['school_email']; ?></p>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <p><b>Phone Number: </b> <?php echo $school['school_phone']; ?></p>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <p><b>Principal: </b> <?php echo $school['school_principal']; ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- NBES -->
    <?php $school = $interaction->SchoolInfoPerSchool($database, 6); ?>
    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
                        <h4>SCHOOL INFORMATION - NBES</h4>      
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
                        <center>
                            <button type="button" data-toggle="modal" data-target="#edit-school-modal" class="btn bg-green waves-effect" style="display: inline-block;" 
                            data-values='<?php echo json_encode(str_replace("'", "&apos;", $school)); ?>' onclick="editSchool(this);"><i class="material-icons">edit</i><span>MODIFY</span></button>
                        </center>
                    </div>
                </div>
            </div>
            <div class="body">
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <p><b>School Name:</b> <?php echo $school['school_name']; ?></p>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <p><b>Address:</b> <?php echo $school['school_addr']; ?></p>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <p><b>School Abbreviation:</b> <?php echo $school['school_abbv']; ?></p>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <p><b>Email Address:</b> <?php echo $school['school_email']; ?></p>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <p><b>Phone Number: </b> <?php echo $school['school_phone']; ?></p>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <p><b>Principal: </b> <?php echo $school['school_principal']; ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php } ?>

<!-- Department list information - Visible only when logged in user is an Admin -->
<?php if($_SESSION['type'] == 1){ ?>
<div class="row clearfix">
    <!-- FINANCE -->
    <?php $school = $interaction->SchoolInfoPerSchool($database, 10); ?>
    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
                        <h4>DEPARTMENT INFORMATION - FINANCE</h4>      
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
                        <center>
                            <button type="button" data-toggle="modal" data-target="#edit-school-modal" class="btn bg-green waves-effect" style="display: inline-block;" 
                            data-values='<?php echo json_encode(str_replace("'", "&apos;", $school)); ?>' onclick="editSchool(this);"><i class="material-icons">edit</i><span>MODIFY</span></button>
                        </center>
                    </div>
                </div>
            </div>
            <div class="body">
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <p><b>Department Name:</b> <?php echo $school['school_name']; ?></p>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <p><b>Address:</b> <?php echo $school['school_addr']; ?></p>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <p><b>Department Abbreviation:</b> <?php echo $school['school_abbv']; ?></p>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <p><b>Email Address:</b> <?php echo $school['school_email']; ?></p>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <p><b>Phone Number: </b> <?php echo $school['school_phone']; ?></p>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <p><b>Department Head: </b> <?php echo $school['school_principal']; ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- SDSS -->
    <?php $school = $interaction->SchoolInfoPerSchool($database, 9); ?>
    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
                        <h4>DEPARTMENT INFORMATION - STUDENT DATA SUPPORT SERVICES</h4>      
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
                        <center>
                            <button type="button" data-toggle="modal" data-target="#edit-school-modal" class="btn bg-green waves-effect" style="display: inline-block;" 
                            data-values='<?php echo json_encode(str_replace("'", "&apos;", $school)); ?>' onclick="editSchool(this);"><i class="material-icons">edit</i><span>MODIFY</span></button>
                        </center>
                    </div>
                </div>
            </div>
            <div class="body">
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <p><b>Department Name:</b> <?php echo $school['school_name']; ?></p>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <p><b>Address:</b> <?php echo $school['school_addr']; ?></p>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <p><b>Department Abbreviation:</b> <?php echo $school['school_abbv']; ?></p>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <p><b>Email Address:</b> <?php echo $school['school_email']; ?></p>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <p><b>Phone Number: </b> <?php echo $school['school_phone']; ?></p>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <p><b>Department Head: </b> <?php echo $school['school_principal']; ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- TECH -->
    <?php $school = $interaction->SchoolInfoPerSchool($database, 1); ?>
    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
                        <h4>DEPARTMENT INFORMATION - TECH</h4>      
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
                        <center>
                            <button type="button" data-toggle="modal" data-target="#edit-school-modal" class="btn bg-green waves-effect" style="display: inline-block;" 
                            data-values='<?php echo json_encode(str_replace("'", "&apos;", $school)); ?>' onclick="editSchool(this);"><i class="material-icons">edit</i><span>MODIFY</span></button>
                        </center>
                    </div>
                </div>
            </div>
            <div class="body">
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <p><b>Department Name:</b> <?php echo $school['school_name']; ?></p>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <p><b>Address:</b> <?php echo $school['school_addr']; ?></p>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <p><b>Department Abbreviation:</b> <?php echo $school['school_abbv']; ?></p>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <p><b>Email Address:</b> <?php echo $school['school_email']; ?></p>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <p><b>Phone Number: </b> <?php echo $school['school_phone']; ?></p>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <p><b>Department Head: </b> <?php echo $school['school_principal']; ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- MAINTENANCE -->
    <?php $school = $interaction->SchoolInfoPerSchool($database, 7); ?>
    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
                        <h4>DEPARTMENT INFORMATION - MAINTENANCE</h4>      
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
                        <center>
                            <button type="button" data-toggle="modal" data-target="#edit-school-modal" class="btn bg-green waves-effect" style="display: inline-block;" 
                            data-values='<?php echo json_encode(str_replace("'", "&apos;", $school)); ?>' onclick="editSchool(this);"><i class="material-icons">edit</i><span>MODIFY</span></button>
                        </center>
                    </div>
                </div>
            </div>
            <div class="body">
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <p><b>Department Name:</b> <?php echo $school['school_name']; ?></p>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <p><b>Address:</b> <?php echo $school['school_addr']; ?></p>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <p><b>Department Abbreviation:</b> <?php echo $school['school_abbv']; ?></p>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <p><b>Email Address:</b> <?php echo $school['school_email']; ?></p>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <p><b>Phone Number: </b> <?php echo $school['school_phone']; ?></p>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <p><b>Department Head: </b> <?php echo $school['school_principal']; ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php } ?>


<!-- Contacts -->

<?php $contacts = $interaction->contactList($database); ?>
<?php require '../components/modals/new_contact.php'; ?>
<?php require '../components/modals/edit_contact.php'; ?>

<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <div class="row clearfix">
                    <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 text-xs-sm-center">
                        <h4>CONTACT LIST</h4>      
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                        <center>
                            <button type="button" class="btn bg-blue waves-effect" data-toggle="modal" data-target="#new-contact-modal" style="display: inline-block;"><i class="material-icons">add</i><span>NEW CONTACT</span></button>
                        </center>
                    </div>
                </div>
            </div>
            <div class="body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                        <thead>
                            <tr>
                                <th>Contact Name</th>
                                <th>Position</th>
                                <th>School</th>
                                <th>Email Address</th>
                                <th>Phone Number</th>
                                <th>Modify</th>
                                <th>Delete/Reactivate</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Contact Name</th>
                                <th>Position</th>
                                <th>School</th>
                                <th>Email Address</th>
                                <th>Phone Number</th>
                                <th>Modify</th>
                                <th>Delete/Reactivate</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php foreach($contacts as $contact): ?>
                                <tr>
                                    <td><?php echo $cname = $contact['firstname'] . " " . $contact['lastname'];?></td>
                                    <td><?php echo $contact['position'];?></td>
                                    <td><?php echo $contact['school_abbv'];?></td>
                                    <td><?php echo $contact['email'];?></td>
                                    <td><?php echo $contact['phone'];?></td>
                                    <td><center><button type="button" class="btn bg-green waves-effect" data-toggle="modal" data-target="#edit-contact-modal" 
                                    data-values='<?php echo json_encode(str_replace("'", "&apos;", $contact)); ?>'
                                        onclick="editContact(this);" <?php if($contact['status'] == 'Inactive') echo "disabled"; ?>><i class="material-icons">mode_edit</i><span>MODIFY</span></button></center></td>
                                    <?php if($contact['status'] == 'Active'){ ?>
                                        <td><center><button type="button" class="btn bg-red waves-effect" data-type="delete-contact" data-id="<?php echo $contact['id']; ?>" data-name="<?php echo str_replace(' ', '%20', $cname); ?>" onclick="alertDesign(this);"><i class="material-icons">clear</i><span>DELETE</span></button></center></td>
                                    <?php } else { ?>
                                        <td><center><button type="button" class="btn bg-cyan waves-effect" data-type="reactivate-contact" data-id="<?php echo $contact['id']; ?>" data-name="<?php echo str_replace(' ', '%20', $cname); ?>" onclick="alertDesign(this);"><i class="material-icons">check</i><span>REACTIVATE</span></button></center></td>
                                    <?php } ?>   
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>