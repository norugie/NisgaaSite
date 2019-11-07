<div class="header">
    <div class="row clearfix">
        <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 text-xs-sm-center">
            <h4>MODIFY MEDIA POST</h4>      
        </div>
        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
            <center>
                <button type="button" class="btn bg-blue waves-effect" style="display: inline-block;" onclick="window.location.href='post.php?tab=post&page=media'"><i class="material-icons">list</i><span>LIST</span></button>
            </center>
        </div>
    </div> 
</div>
<div class="body">
    <p class="font-12"><i><b>Note:</b> Fields marked with an asterisk are required</i></p><br>
    <!-- Inline Layout -->
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

            <?php if($_GET['modify'] == 'details'){ ?>
                <!-- Media details here -->
                <form class="edit_form_validate" action="../functions/post.php?post=true&editMedia=true" method="POST" enctype="multipart/form-data">
                    <input type="text" id="edit_media_post_id" name="edit_media_post_id" value="<?php echo $media_info['id']; ?>" hidden>
                    <input type="text" id="edit_media_post_id_name" name="edit_media_post_id_name" value="<?php echo $media_info['post_id']; ?>" hidden>
                    <div class="row clearfix">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <label for="edit_media_post_title">Media Post Title *</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" class="form-control" id="edit_media_post_title" name="edit_media_post_title" value="<?php echo $media_info['post_title']; ?>" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <input type="text" name="post_thumbnail_previous" value="<?php echo $media_info['post_thumbnail']; ?>" hidden>
                            <label for="post_thumbnail">Media Thumbnail</label>
                            <p class="font-12"><i><b>Note:</b> The max image size you can upload is 10 MB.</i></p>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="file" name="post_thumbnail" id="post_thumbnail" accept="image/x-png, image/jpeg">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <label for="edit_media_post_content" style="margin-bottom:10px;">Media Post Description</label><br>
                            <div class="form-group">
                                <div class="form-line">
                                    <textarea rows="2" class="form-control no-resize" id="edit_media_post_content" name="edit_media_post_content"><?php echo $media_info['post_text']; ?></textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row clearfix">
                        <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12" style="float: right;">
                            <button type="submit" class="btn bg-blue-grey btn-block btn-lg waves-effect">SAVE</button>  
                        </div>
                    </div>

                </form>

            <?php } else { ?>
                <!-- Media categories here -->

                <?php 

                    $categories = $post->categoryListNoEventNoAnnouncement($database); 
                    $cats =  json_encode($categories);

                ?>

                <style>

                    div.token-input-dropdown-facebook {           
                        z-index: 9999!important;
                        width: 1020px;
                    }

                </style>

                <form action="../functions/post.php?post=true&editMediaCategories=true" method="POST">
                    <input type="text" id="edit_media_cat_id" name="edit_media_cat_id" value="<?php echo $media_info['id']; ?>" hidden>
                    <input type="text" id="edit_media_cat_id_name" name="edit_media_cat_id_name" value="<?php echo $media_info['post_title']; ?>" hidden>
                    <div class="row clearfix">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <label for="edit_media_categories">Media Categories *</label>
                            <div class="form-group">
                                <?php
                                    $post_cats_values = array();
                                    $post_cats = $post->categoriesPerPostList($database, $media_info['id']);
                                    foreach($post_cats as $cat):
                                        array_push($post_cats_values, $cat['id']);
                                    endforeach;
                                ?>
                                <input type="text" value="<?php echo implode(',', $post_cats_values); ?>"  name="edit_media_categories_id" hidden>
                                <div class="form-line">
                                    <input type="text" class="form-control" id="edit_media_categories" name="edit_media_categories" required>
                                </div>
                                <script type="text/javascript">
                                    
                                    var categories = new Array();
                                    
                                    Array.prototype.remove = function() {
                                        var what, a = arguments, L = a.length, ax;
                                        while (L && this.length) {
                                            what = a[--L];
                                            while ((ax = this.indexOf(what)) !== -1) {
                                                this.splice(ax, 1);
                                            }
                                        }
                                        return this;
                                    };
                                    
                                    $(document).ready(function() {
                                        $("#edit_media_categories").tokenInput(<?php echo $cats; ?>, {
                                            theme: "facebook",
                                            propertyToSearch: "cat_desc",
                                            prePopulate: [
                                                <?php
                                                foreach($post_cats as $cat):
                                                ?>
                                                 {id: <?php echo $cat['id']; ?>, cat_desc: "<?php echo $cat['cat_desc']; ?>"},
                                                <?php
                                                endforeach;    
                                                ?>
                                            ],
                                            resultsFormatter: function(item){ 
                                                return "<li>" + "<div style='display: inline-block; padding-left: 10px;'><div class='cat_desc'>" + item.cat_desc + "</div></div></li>" },
                                            tokenFormatter: function(item){ 
                                                return "<li><p>" + item.cat_desc + "</p></li>" },
                                            preventDuplicates: true,
                                            onAdd: function(item){
                                                categories.push(item.id);
                                                console.log(categories);
                                                $('input[name="edit_media_categories_id"]').val(categories);
                                            },
                                            onDelete: function(item){
                                                categories.remove(item.id);
                                                console.log(categories);
                                                $('input[name="edit_media_categories_id"]').val(categories);
                                            }
                                        });
                                    });
                                </script>
                                
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12" style="float: right;">
                            <button type="submit" class="btn bg-blue-grey btn-block btn-lg waves-effect">SAVE</button>  
                        </div>
                    </div>
                </form>
            <?php } ?>
        </div>
    </div>
    <!-- #END# Inline Layout -->
</div>