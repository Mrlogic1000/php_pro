<?php $this->view('header',[]); ?>
<div class="row p2 col-md-8 shadow mx-auto border rounded">   
    <div class="col-md-2 text-center">
        <a href="<?= ROOT?>/profile/<?=$row->id?>">
        <span>
            <img class="profile-image rounded-circle m-4" src="<?= get_image($row->image)?>"
                style=" height: 100px; width:100px; object-fit:cover;" alt="...">                
                <?php if(user('id')== $row->id): ?>       
            
            <?php endif ?>

        </span>
       
        <h5><?= $row->username ?></h5>
                </a>
        <!-- Ajax -->
        
    </div>  

        <div class="col-md-10 my-3">
            <?php if(!empty($posts)): ?>
            <?php foreach($posts as $post): ?>
            <!-- <?php print_r($post->user->username) ?> -->
            <?php $this->view("post-small",['post'=>$post])?>
            <?php endforeach; ?>
            <?php endif; ?>
            <?php $pager->display(); ?>

        </div>

    </div>
    
    <?php $this->view('footer',[]); ?>