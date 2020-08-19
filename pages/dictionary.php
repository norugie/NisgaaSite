<?php $words = $site->wordList($database); ?>

<div class="col-md-9">
   
    <!-- DICTIONARY CONTENT -->
    <section>
        <div class="row">
            <div class="col-md-12" id="filter-list">
                <div class="form-group">
                    <input type="text" id="keyword" name="keyword" aria-label="Help Searchbar" class="form-control search" placeholder="Type in your help keyword(s) here..." autocomplete="off" data-search>
                </div>
                <div class="row">
                    <ul class="list">
                        <?php foreach($words as $word): ?>
                            <li class="lead mb-0">
                                <h4 class="inquiry-item"><?php echo $word['word']; ?></h4>
                                <p class="small text-uppercase"><?php echo $word['word_meaning'];?></p>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    
</div>

<script src="/js/list.min.js"></script>
<script>
    var options = {
    valueNames: [ 'inquiry-item' ]
    };

    var userList = new List('filter-list', options);
</script>