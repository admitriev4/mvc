<div class="user-grid-container">
    <div class="your-date">
        <p>Вы авторизировались как:</p>
        <p>ID: <?=$data['FUser'][0]['id']?></p>
        <p>Имя: <?=$data['FUser'][0]['name']?></p>
        <p>Фамилия: <?=$data['FUser'][0]['surname']?></p>
        <p>E-mail: <?=$data['FUser'][0]['email']?></p>
        <p>Телефон: <?=$data['FUser'][0]['phone']?></p>
        <p>Адрес: <?=$data['FUser'][0]['address']?></p>

    </div>

    <div class="actions-your-date">
        <form method="post" action="/user/update_show/" >
            <p class="invisible"><input type="text" name="id" value="<?=$data['FUser'][0]['id']?>" readonly></p>
            <input type="submit" value="Изменить информацию о себе">
        </form>
        <form method="post" action="/user/update_show_pass/" >
            <p class="invisible"><input type="text" name="id" value="<?=$data['FUser'][0]['id']?>" readonly></p>
            <input type="submit" value="Изменить пароль">
        </form>
        <form method="post" action="/user/delete_show/" >
            <p class="invisible"><input type="text" name="id" value="<?=$data['FUser'][0]['id']?>" readonly></p>
            <input type="submit" value="Удалить свой аккаунт">
        </form>
        <a href="/">Выйти</a>
    </div>

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
            <span><?=$user['id']?></span>
            <span><?=$user['name']?></span>
            <span><?=$user['surname']?></span>
            <span><?=$user['email']?></span>
            <span><?=$user['phone']?></span>
            <span><?=$user['address']?></span>
        </p>
        <?endforeach;?>
    </div>
</div>