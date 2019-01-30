<?php $faqs = $interaction->faqList($database); ?>


<?php require '../components/modals/new_inquiry.php'; ?>
<?php require '../components/modals/edit_inquiry.php'; ?>
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <div class="row clearfix">
                    <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 text-xs-sm-center">
                        <h4>INQUIRY LIST</h4>      
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                        <center>
                            <button type="button" class="btn bg-blue waves-effect" data-toggle="modal" data-target="#new-inquiry-modal" style="display: inline-block;">ADD NEW INQUIRY</button>
                        </center>
                    </div>
                </div>
            </div>
            <div class="body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                        <thead>
                            <tr>
                                <th>Question</th>
                                <th>Answer</th>
                                <th>Modify</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Question</th>
                                <th>Answer</th>
                                <th>Modify</th>
                                <th>Delete</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php foreach($faqs as $faq): ?>
                                <tr>
                                    <td><?php echo $faq['faq_question']; ?></td>
                                    <td><?php echo $faq['faq_answer']; ?></td>
                                    <td>
                                        <center>
                                            <button type="button" class="btn bg-green waves-effect" data-toggle="modal" data-target="#edit-inquiry-modal" 
                                data-values='<?php echo json_encode(str_replace("'", "&apos;", $faq)); ?>' 
                                onclick="editInquiry(this);">MODIFY</button>
                                        </center>
                                    </td>
                                    <td>
                                        <center>
                                            <button type="button" class="btn bg-red waves-effect">DELETE</button>
                                        </center>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>