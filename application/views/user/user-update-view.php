<div class="user-update-grid-container">
<div class="update">
<form method="post" action="/user/update/" data-type="noRedirect" >
    <p class="title-medium center">Обновление данных пользователя</p>
    <p class="form-row"><span>Имя:</span><input type="text" name="name" class="input" value="<?=$_SESSION['fUser']['name']?>">
        <span class="request red" id="name"></span></p>
    <p class="form-row"><span>Фамилия:</span><input type="text" name="surname" class="input" value="<?=$_SESSION['fUser']['surname']?>">
        <span class="request red" id="surname"></span></p>
    <p class="form-row"><span>E-mail:</span><input type="text" name="email" value="<?=$_SESSION['fUser']['email']?>" class="input">
        <span class="request red" id="email"></span></p>
    <p class="form-row"><span>Телефон:</span><input type="text" name="phone" value="<?=$_SESSION['fUser']['phone']?>" class="input">
        <span class="request red" id="phone"></span></p>
    <p class="form-row"><span>Адрес:</span><input type="text" name="address" class="input" value="<?=$_SESSION['fUser']['address']?>">
        <span class="request red" id="address"></span></p>
    <input type="submit" value="Изменить" class="btn">
</form>
</div>
    <div class="center">
        <a href="/user/" class="btn">Назад</a>
    </div>
</div>
<div class="message-request"></div>

