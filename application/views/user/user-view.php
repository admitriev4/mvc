<div class="user-grid-container">
    <div class="user-list">
        <p class="user-top-list">
            <span>ID</span>
            <span>Имя</span>
            <span>Фамилия</span>
            <span>E-mail</span>
            <span>Телефон</span>
            <span>Адрес</span>
        </p>
        <? foreach ($data['users'] as $user):?>
        <p class="user-bottom-list">
            <span><?=$user->id?></span>
            <span><?=$user->name?></span>
            <span><?=$user->surname?></span>
            <span><?=$user->email?></span>
            <span><?=$user->phone?></span>
            <span><?=$user->address?></span>
        </p>
        <?endforeach;?>
    </div>
    <?if($data['count_page'] > 1):?>
        <div class="paginate">
            <?for ($i = 1; $i <= $data['count_page']; $i++):?>
                <a href="/user/<?=$i?>/" class="btn"><?=$i?> </a>
            <?endfor;?>
        </div>
    <?endif;?>
</div>