<div class="row post border p-1">
    <div class="col-3 bg-light text-center">
        <a href="<?= ROOT?>/profile/<?=$post->user->id?>">
            <img class="profile-image rounded-circle m-1" src="<?= get_image($post->user->image ?? '')?>"
                style=" height: 80px; width:80px; object-fit:cover;">
            <h4><?= $post->user->username ?? 'unknow' ?></h4>
        </a>
    </div>
    <div class="col-9 text-start">
        <div class="muted"><?= get_date($post->date)?></div>

        <p><?= $post->post?></p>
        <?php if(!empty($post->image)):?>
        <a href="<?= ROOT?>/post/<?=$post->id?>">
            <img class="m-1" src="<?= get_image($post->image)?>" style=" height: 50%; width:100px; object-fit:cover;">
        </a>
        <?php endif?>
    </div>
    <div>
       
        <a href="<?= ROOT?>/post/edit/<?=$post->id?>">
            <?php if(user('id') == $post->user_id): ?>
            <button class="btn-sm btn m-1 btn-warning">Edit</button>
        </a>

        <a href="<?= ROOT?>/post/delete/<?=$post->id?>">
            <button class="btn-sm btn m-1 btn-danger">Delete</button>
        </a>
        <?php endif; ?>
        <a href="<?= ROOT?>/post/<?=$post->id?>">
            <button class="btn-sm btn m-1 btn-primary">Comments</button>
        </a>
    </div>

</div>
<hr>