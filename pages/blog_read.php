<div id="blog-post" class="col-md-9">
    <h2 class="text-center"><?php echo $post_info['post_title']; ?></h2>
    <p class="text-muted text-uppercase mb-small text-center text-sm">By <?php echo $post_info['firstname'] . " " . $post_info['lastname']; ?> |  <?php echo date_format(date_create($post_info['post_date']), 'd M Y'); ?></p>
    <div id="post-content">
        <?php echo $post_info['post_text']; ?>
    </div>
    <!-- <div id="comments">
        <h4 class="text-uppercase">2 comments</h4>
        <div class="row comment">
            <div class="col-md-12">
                <h5 class="text-uppercase">Julie Alma</h5>
                <p class="posted"><i class="fa fa-clock-o"></i> September 23, 2011 at 12:00 am</p>
                <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo.</p>
            </div>
        </div>
        <div class="row comment">
            <div class="col-md-12">
                <h5 class="text-uppercase">Louise Armero</h5>
                <p class="posted"><i class="fa fa-clock-o"></i> September 23, 2012 at 12:00 am</p>
                <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo.</p>
            </div>
        </div>
    </div>
    <div id="comment-form">
        <h4 class="text-uppercase">Leave a comment</h4>
        <form>
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <label for="name">Name <span class="required text-primary">*</span></label>
                        <input id="name" type="text" class="form-control">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <label for="email">Email <span class="required text-primary">*</span></label>
                        <input id="email" type="text" class="form-control">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <label for="comment">Comment <span class="required text-primary">*</span></label>
                        <textarea id="comment" rows="4" class="form-control"></textarea>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 text-right">
                    <button class="btn btn-template-outlined"><i class="fa fa-comment-o"></i> Post comment</button>
                </div>
            </div>
        </form>
    </div> -->
</div>