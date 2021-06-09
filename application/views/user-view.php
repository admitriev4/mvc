<?/*var_dump($data);*/?>
<div class="user-grid-container">
    <div class="your-date">
        <p>Вы авторизировались как:</p>
        <p>ID: <?=$data['FUser']['id']?></p>
        <p>Имя: <?=$data['FUser']['name']?></p>
        <p>Фамилия: <?=$data['FUser']['surname']?></p>
        <p>E-mail: <?=$data['FUser']['email']?></p>
        <p>Телефон: <?=$data['FUser']['phone']?></p>
        <p>Адрес: <?=$data['FUser']['address']?></p>

    </div>

    <div class="actions-your-date">
        <form method="post" action="/user/update_show/" >
            <p class="invisible"><input type="text" name="id" value="<?=$data['FUser']['id']?>" readonly></p>
            <input type="submit" value="Изменить информацию о себе">
        </form>
        <form method="post" action="/user/update_show_pass/" >
            <p class="invisible"><input type="text" name="id" value="<?=$data['FUser']['id']?>" readonly></p>
            <input type="submit" value="Изменить пароль">
        </form>
        <form method="post" action="/user/delete_show/" >
            <p class="invisible"><input type="text" name="id" value="<?=$data['FUser']['id']?>" readonly></p>
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