<div class="registration">
    <form method="post" action="/user/add/" data-type="redirect">
        <p class="title-medium">Регистрация</p>
        <p class="form-row"><span>Имя:</span> <input type="text" name="name"><span class="request red" id="name"></p>
        <p class="form-row"><span>Фамилия:</span> <input type="text" name="surname"><span class="request red" id="surname"></p>
        <p class="form-row"><span>E-mail:</span> <input type="text" name="email" placeholder="example@gmail.com"><span class="request red" id="email"></p>
        <p class="form-row"><span>Телефон:</span> <input type="text" name="phone" placeholder="+79999999999"><span class="request red" id="phone"></p>
        <p class="form-row"><span>Адрес:</span> <input type="text" name="address"><span class="request red" id="address"></p>
        <p class="title-small">Длина пароля не менее 8 символов, должны использоваться латинские буквы обоих регистров, знаки препинания и цифры.</p>
        <p class="form-row"><span>Пароль:</span> <input type="password" name="password"><span class="request red" id="password"></p>
        <p class="form-row"><span class="repeat-pass">Повторите пароль:</span> <input type="password" name="repeat_password"><span class="request red" id="repeat_password"></p>
        <input type="submit" value="Регистрация" class="btn">
        <a href="/">Назад</a>
    </form>
</div>

