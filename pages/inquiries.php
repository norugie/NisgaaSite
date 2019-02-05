<?php $faqs = $site->faqList($database, 2); ?>
<div class="col-md-9">
    <!-- FAQ INTRO CONTENT -->
    <section>
        <div class="row">
            <div class="col-md-12">
                <div class="heading">
                    <h2>FREQUENTLY ASKED QUESTIONS</h2>
                </div>
                <p class="lead">Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo.</p>
                <p class="lead">If you have any questions, please feel free to <a href="index.php?page=contact_us">contact us</a>.</p>
            </div>
        </div>
    </section>
    
    <!-- FAQ ANSWERS CONTENT -->
    <section>
        <div class="row">
            <div class="col-md-12">
                <div id="accordion" role="tablist">
                    <?php
                        $ctr = 0;
                        foreach($faqs as $faq):
                    ?>
                        <div class="card">
                            <div id="heading-<?php echo $ctr; ?>" role="tab" class="card-header">
                                <h4 class="mb-0 mt-0"><a data-toggle="collapse" href="#faq-<?php echo $ctr; ?>" aria-expanded="true" aria-controls="faq-<?php echo $ctr; ?>"><?php echo $faq['faq_question']; ?></a></h4>
                            </div>
                            <div id="faq-<?php echo $ctr; ?>" role="tabpanel" aria-labelledby="heading-<?php echo $ctr; ?>" data-parent="#accordion" class="collapse">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <p><?php echo $faq['faq_answer']; ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php 
                        $ctr++;
                        endforeach; 
                    ?>
                </div>
            </div>
        </div>
    </section>
    <br>
</div>