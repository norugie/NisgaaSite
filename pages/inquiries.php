<?php $faqs = $site->faqList($database, $schoolContent); ?>
<div class="col-md-9">
    <!-- FAQ INTRO CONTENT -->
    <section>
        <div class="row">
            <div class="col-md-12">
                <div class="heading">
                    <h2>FREQUENTLY ASKED QUESTIONS</h2>
                </div>
                <p class="lead">Need some help? We've put together some commonly asked questions to give you more information about School District no. 92 (Nisga’a).</p>
                <p class="lead">If you have a question that you can't find the answer to, please feel free to <a href="/contacts">contact us</a>.</p>
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