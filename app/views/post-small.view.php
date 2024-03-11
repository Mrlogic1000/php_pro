<div class="row post border p-1">
    <div class="col-3 bg-light text-center">
        <img class="profile-image rounded-circle m-1" src="<?= get_image($post->user->image ?? '')?>"
            style=" height: 80px; width:80px; object-fit:cover;">
        <h4><?= $post->user->username ?? 'unknow' ?></h4>
    </div>
    <div class="col-9 text-start">
        <div class="muted"><?= get_date($post->date)?></div>

        <p><?= $post->post?></p>
        <?php if(!empty($post->image)):?>
        <img class="m-1" src="<?= get_image($post->image)?>"style=" height: 50%; width:100px; object-fit:cover;">
        <?php endif?>
    </div>
    <?php if(user('id')== $post->user_id): ?>
    <div>
        <button class="btn-sm btn m-1 btn-warning">Edit</button>
        <button class="btn-sm btn m-1 btn-danger">Delete</button>
    </div>
    <?php endif; ?>

</div>
<hr>