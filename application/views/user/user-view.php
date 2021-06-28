<div class="user-grid-container">
    <div class="your-date">
        <p>Вы авторизировались как:</p>
        <p>ID: <?=$_SESSION['fUser']['id']?></p>
        <p>Имя: <?=$_SESSION['fUser']['name']?></p>
        <p>Фамилия: <?=$_SESSION['fUser']['surname']?></p>
        <p>E-mail: <?=$_SESSION['fUser']['email']?></p>
        <p>Телефон: <?=$_SESSION['fUser']['phone']?></p>
        <p>Адрес: <?=$_SESSION['fUser']['address']?></p>
    </div>

    <div class="actions-your-date">
        <a href="/user/update_show/">Изменить информацию о себе</a>
        <a href="/user/update_show_pass/">Изменить пароль</a>
        <a href="/user/delete_show/">Удалить свой аккаунт</a>
        <a href="/">Выйти</a>
    </div>
    <div class="paginate">
        <?for ($i = 1; $i <= $data['count_page']; $i++):?>
            <a href="/user/<?=$i?>/"><?=$i?> </a>
        <?endfor;?>
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
            <span><?=$user->id?></span>
            <span><?=$user->name?></span>
            <span><?=$user->surname?></span>
            <span><?=$user->email?></span>
            <span><?=$user->phone?></span>
            <span><?=$user->address?></span>
        </p>
        <?endforeach;?>
    </div>

</div>