

    <div class="col-3 bg-light text-center p-4">
    <a href="<?= ROOT?>/profile/<?=$row->id?>">
        <img class="profile-image rounded-circle m-1" src="<?= get_image($row->image ?? '')?>"
            style=" height: 80px; width:80px; object-fit:cover;">
        <h4><?= $row->username ?? 'unknow' ?></h4>
        </a>
    </div>

    