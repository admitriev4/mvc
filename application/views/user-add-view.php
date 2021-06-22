<div class="registration">
    <form method="post" action="" id="add">
        <p class="title-medium">Регистрация</p>
        <p class="form-row"><span>Имя:</span> <input type="text" name="name"></p>
        <p class="form-row"><span>Фамилия:</span> <input type="text" name="surname"></p>
        <p class="form-row"><span>E-mail:</span> <input type="text" name="email" placeholder="example@gmail.com"></p>
        <p class="form-row"><span>Телефон:</span> <input type="text" name="phone" placeholder="+79999999999"></p>
        <p class="form-row"><span>Адрес:</span> <input type="text" name="address"></p>
        <p class="title-small">Длина пароля не менее 8 символов, должны использоваться латинские буквы обоих регистров, знаки препинания и цифры.</p>
        <p class="form-row"><span>Пароль:</span> <input type="password" name="password"></p>
        <p class="form-row"><span class="repeat-pass">Повторите пароль:</span> <input type="password" name="repeat_password"></p>
        <input type="submit" value="Регистрация" class="btn">
        <a href="/">Назад</a>
    </form>
</div>
<?if (isset($data->request)):?>
<div class="show-request red">
    <? if(is_array($data->request)):?>
    <?foreach ($data->request as $value):?>
    <p><?=$value;?></p>
        <?endforeach;?>
    <?endif;?>
</div>
<?endif;?>