<div class="user-grid-container">
    <div class="your-date">
        <p>Вы авторизировались как:</p>
        <?var_dump($data['FUser'])?>
        <p>Имя: текст</p>
        <p>Фамилия: текст</p>
        <p>E-mail: text@mail.ru</p>
        <p>Телефон: +7 999 999 99 99</p>
        <p>Адрес: улица номер дома квартира</p>
    </div>

    <div class="actions-your-date">
    <a href="#">Изменить информацию о себе</a>
        <a href="#">Изменить пароль</a>
        <a href="#">Удалить свой аккаунт</a>
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