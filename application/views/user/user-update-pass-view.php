
<div class="update-pass">
<form method="post" action="/user/update_pass/" data-type="noRedirect">
    <p class="title-medium">Обновление пароля пользователя</p>
    <p class="title-small">Длина пароля не менее 8 символов, должны использоваться латинские буквы обоих регистров, знаки препинания и цифры.</p>

    <p class="form-row"><span>Старый пароль:</span><input type="password" name="old_password" class="input">
        <span class="request red" id="old_password"></span></p>
    <p class="form-row"><span>Новый пароль:</span> <input type="password" name="password" class="input">
        <span class="request red" id="password"></span></p>
    <p class="form-row"><span class="repeat-pass">Повторите пароль:</span><input type="password" name="repeat_password" class="input">
        <span class="request red" id="repeat_password"></span></p>
    <input type="submit" value="Изменить" class="btn">
    <a href="/user/" class="btn">Назад</a>
</form>
</div>
<div class="message-request"></div>

