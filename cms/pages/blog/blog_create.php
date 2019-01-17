<?php 

    $categories = $post->categoryListNoEventNoAnnouncement($database); 
    $cats =  json_encode($categories);

?>

<style>

    div.token-input-dropdown-facebook {           
        z-index: 9999!important;
        width: 850px;
    }

</style>


<div class="header">
    <div class="row clearfix">
        <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 text-xs-sm-center">
            <h4>NEW POST</h4>      
        </div>
        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
            <center>
                <button type="button" class="btn bg-blue waves-effect" style="display: inline-block;" onclick="window.location.href='post.php?tab=post&page=blog'">BLOG LIST</button>
            </center>
        </div>
    </div>
</div>
<div class="body">
    <p class="font-12"><i><b>Note:</b> Fields marked with an asterisk are required</i></p><br>
    <!-- Inline Layout -->
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <form class="new_form_validate" action="../functions/post.php?post=true&addPost=true" method="POST" enctype="multipart/form-data">
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <label for="post_title">Post Title *</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" class="form-control" id="post_title" name="post_title" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <label for="post_categories">Post Categories *</label>
                        <div class="form-group">
                            <input type="text" value=""  name="post_categories_id" hidden>
                            <div class="form-line">
                                <input type="text" class="form-control" id="post_categories" name="post_categories" required>
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
                                    $("#post_categories").tokenInput(<?php echo $cats; ?>, {
                                        theme: "facebook",
                                        propertyToSearch: "cat_desc",
                                        resultsFormatter: function(item){ 
                                            return "<li>" + "<div style='display: inline-block; padding-left: 10px;'><div class='cat_desc'>" + item.cat_desc + "</div></div></li>" },
                                        tokenFormatter: function(item){ 
                                            return "<li><p>" + item.cat_desc + "</p></li>" },
                                        preventDuplicates: true,
                                        onAdd: function(item){
                                            categories.push(item.id);
                                            console.log(categories);
                                            $('input[name="post_categories_id"]').val(categories);
                                        },
                                        onDelete: function(item){
                                            categories.remove(item.id);
                                            console.log(categories);
                                            $('input[name="post_categories_id"]').val(categories);
                                        }
                                    });
                                });
                            </script>
                            
                        </div>
                    </div>
                </div>
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <label for="post_thumbnail">Post Thumbnail</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="file" name="post_thumbnail" id="post_thumbnail" accept="image/*">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <label for="post_content" style="margin-bottom:10px;">Post Content *</label><br>
                        <div class="form-group">
                            <div class="form-line">
                                <textarea class="tinymce_editor" id="post_content" name="post_content">

                                </textarea>
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
        </div>
    </div>
    <!-- #END# Inline Layout -->
</div>