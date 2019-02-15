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
                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                        <p><b>School Abbreviation:</b> <?php echo $school['school_abbv']; ?></p>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                        <p><b>Email Address:</b> <?php echo $school['school_email']; ?></p>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                        <p><b>Phone Number: </b> <?php echo $school['school_phone']; ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


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
                            <button type="button" class="btn bg-blue waves-effect" data-toggle="modal" data-target="#new-contact-modal" style="display: inline-block;">NEW CONTACT</button>
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
                                    <td><?php echo $contact['firstname'] . " " . $contact['lastname'];?></td>
                                    <td><?php echo $contact['position'];?></td>
                                    <td><?php echo $contact['school_abbv'];?></td>
                                    <td><?php echo $contact['email'];?></td>
                                    <td><?php echo $contact['phone'];?></td>
                                    <td><center><button type="button" class="btn bg-green waves-effect" data-toggle="modal" data-target="#edit-contact-modal" 
                                        data-values=''
                                        onclick="editContact(this);" <?php if($contact['status'] == 'Inactive') echo "disabled"; ?>>MODIFY</button></center></td>
                                    <?php if($contact['status'] == 'Active'){ ?>
                                        <td><center><button type="button" class="btn bg-red waves-effect" data-type="delete-contact" data-id="<?php echo $contact['id']; ?>" data-name="<?php echo str_replace(' ', '%20', $contact['position']); ?>" onclick="alertDesign(this);">DELETE</button></center></td>
                                    <?php } else { ?>
                                        <td><center><button type="button" class="btn bg-cyan waves-effect" data-type="reactivate-contact" data-id="<?php echo $contact['id']; ?>" data-name="<?php echo str_replace(' ', '%20', $contact['position']); ?>" onclick="alertDesign(this);">REACTIVATE</button></center></td>
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