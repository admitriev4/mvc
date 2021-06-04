<div class="user-grid-container">
    <div class="your-date">
        <p>Вы авторизировались как:</p>
        <p>Имя: <?=$data['FUser'][0]['name']?></p>
        <p>Фамилия: <?=$data['FUser'][0]['surname']?></p>
        <p>E-mail: <?=$data['FUser'][0]['email']?></p>
        <p>Телефон: <?=$data['FUser'][0]['phone']?></p>
        <p>Адрес: <?=$data['FUser'][0]['address']?></p>

    </div>

    <div class="actions-your-date">
    <a href="update">Изменить информацию о себе</a>
        <a href="update_pass">Изменить пароль</a>
        <a href="delete">Удалить свой аккаунт</a>
        <a href="/">Выйти</a>
    </div>

    <div class="user-list">
        <p class="user-top-list">
            <span>Имя</span>
            <span>Фамилия</span>
            <span>E-mail</span>
            <span>Телефон</span>
            <span>Адрес</span>
        </p>
        <? foreach ($data['users'] as $user):?>
        <p class="user-bottom-list">
            <span><?=$user['name']?></span>
            <span><?=$user['surname']?></span>
            <span><?=$user['email']?></span>
            <span><?=$user['phone']?></span>
            <span><?=$user['address']?></span>
        </p>
        <?endforeach;?>
    </div>
</div>