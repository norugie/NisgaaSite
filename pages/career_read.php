<?php require 'components/modals/apply.php'; ?>

<div id="blog-post" class="col-md-9">
    <h2 class="text-center"><?php echo $career['title']; ?></h2>
    <p class="text-muted text-uppercase mb-small text-center text-sm"><strong>Closing Date:</strong>  <?php echo date_format(date_create($career['close_date']), 'd M Y'); ?></p>
    <div id="post-content">
        <hr>
        <div class="row text-center">
            <div class="col-md-4"><strong>Job ID: </strong><?php echo preg_replace('/[a-zA-Z]/', '', $career['job_id']); ?></div>
            <div class="col-md-4"><strong>Job Type: </strong><?php echo $career['job_type']; ?></div>
            <div class="col-md-4"><strong>School: </strong><?php echo $career['school_name']; ?></div>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-12">
                <p class="intro"><?php echo $career['job_desc']; ?></p>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-6 text-center mb-3"><a href="jobs/<?php echo $career['file']; ?>" download class="btn btn-outline-primary">Download job posting</a></div>
            <div class="col-md-6 text-center"><a  href="#" data-toggle="modal" data-target="#apply-modal" data-values='<?php echo json_encode(str_replace("'", "&apos;", $career)); ?>' onclick="applyInfo(this);" class="btn btn-template-main">Apply for this job</a></div>
        </div>
    </div>
</div>

<script>

    function applyInfo(apply) {

        apply = $(apply).data("values");


    }

</script>