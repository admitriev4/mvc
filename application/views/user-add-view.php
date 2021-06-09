<div class="registration">
    <form method="post" action="/user/add/" >
        <p class="title-medium">Регистрация</p>
        <p class="form-row"><span>Имя:</span> <input type="text" name="name"></p>
        <p class="form-row"><span>Фамилия:</span> <input type="text" name="surname"></p>
        <p class="form-row"><span>E-mail:</span> <input type="text" name="email" placeholder="example@gmail.com"></p>
        <p class="form-row"><span>Телефон:</span> <input type="text" name="phone" placeholder="+79999999999"></p>
        <p class="form-row"><span>Адрес:</span> <input type="text" name="address"></p>
        <p class="title-small">Длина пароля не менее 8 символов, должны использоваться буквы обоих регистров, знаки препинания и цифры.</p>
        <p class="form-row"><span>Пароль:</span> <input type="password" name="password"></p>
        <p class="form-row"><span class="repeat-pass">Повторите пароль:</span> <input type="password" name="repeat_password"></p>
        <input type="submit" value="Регистрация">
    </form>
</div>
<div class="show-request red">
    <p><?=$data["request"];?></p>
</div>