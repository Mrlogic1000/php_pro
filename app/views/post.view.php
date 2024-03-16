<?php $this->view('header',[]); ?>
<div class="row p2 col-md-8 shadow mx-auto border rounded">   
    

        <div class="my-3">
            <?php if(!empty($post)): ?>          
            <?php $this->view("post-full",['post'=>$post])?>          
            <?php endif; ?>
            <?php $pager->display(); ?>

        </div>

    </div>
    
    <?php $this->view('footer',[]); ?>