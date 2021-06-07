<?php
?>
<p>Обновление пароля пользователя</p>
<form method="post" action="/user/update_pass/" >
    <p class=""><input type="text" name="id" value="<?=$data['id']?>" readonly></p>
    <p class="form-row"><span>Старый пароль:</span> <input type="text" name="address"></p>
    <p class="form-row"><span>Новый пароль:</span> <input type="pasword" name="password"></p>
    <p class="form-row"><span class="repeat-pass">Повторите пароль:</span> <input type="pasword" name="repeat_password"></p>
    <input type="submit" value="Изменить">
</form>