<div class="row post border p-1">
    <div class="col-3 bg-light text-center">
        <img class="profile-image rounded-circle m-1" src="<?= get_image($post->user->image ?? '')?>"
            style=" height: 80px; width:80px; object-fit:cover;">
        <h4><?= $post->user->username ?? 'unknow' ?></h4>
    </div>
    <div class="col-9 text-start">
        <div class="muted"><?= get_date($post->date)?></div>
        <?php if(!empty($post->image)):?>
        <img class="profile-image rounded-circle m-1" src="<?= get_image($post->image)?>"style=" height: 80px; width:80px; object-fit:cover;">
        <?php endif?>
        <p><?= $post->post?></p>
    </div>

</div>