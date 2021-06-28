<div class="user-update-grid-container">
    <div class="your-date">
        <p>Ваши текущие данные:</p>
        <p>ID: <?=$_SESSION['fUser']['id']?></p>
        <p>Имя: <?=$_SESSION['fUser']['name']?></p>
        <p>Фамилия: <?=$_SESSION['fUser']['surname']?></p>
        <p>E-mail: <?=$_SESSION['fUser']['email']?></p>
        <p>Телефон: <?=$_SESSION['fUser']['phone']?></p>
        <p>Адрес: <?=$_SESSION['fUser']['address']?></p>
    </div>
    <div class="actions-your-date">
        <a href="/user/">Назад</a>
    </div>
<div class="update">
<form method="post" action="/user/update/" data-type="noRedirect" >
    <p class="title-medium center">Обновление данных пользователя</p>
    <p class="form-row"><span>Имя:</span><input type="text" name="name"><span class="request red" id="name"></span></p>
    <p class="form-row"><span>Фамилия:</span><input type="text" name="surname"> <span class="request red" id="surname"></span></p>
    <p class="form-row"><span>E-mail:</span><input type="text" name="email"><span class="request red" id="email"></span></p>
    <p class="form-row"><span>Телефон:</span><input type="text" name="phone"><span class="request red" id="phone"></span></p>
    <p class="form-row"><span>Адрес:</span><input type="text" name="address"><span class="request red" id="address"></span></p>
    <input type="submit" value="Изменить" class="btn">
</form>
</div>
</div>
<div class="message-request"></div>

