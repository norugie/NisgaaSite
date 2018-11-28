<?php 
    $roles = $district->roleList($database);
    $schools = $district->schoolList($database); 
?>
<!-- Add Job Modal -->
<div class="modal fade" id="edit-job-modal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #607D8B; color: #fff; margin: 0; padding: 15px;">
                <button type="button" class="close" data-dismiss="modal">
                       <span aria-hidden="true">&times;</span>
                       <span class="sr-only">Close</span>
                </button>
                <h4 class="modal-title" id="largeModalLabel">Edit Job Posting</h4>
            </div>
            <div class="modal-body">

            </div>
        </div>
    </div>
</div>
