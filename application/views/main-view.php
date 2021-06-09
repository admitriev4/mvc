<div class="grid-container">
    <div class="message">
        <p class="title-big">Войдите или Зарегистрируйтесь</p>
    </div>
    <div class="autoresation">
        <form method="post" action="/user/">
        <p class="title-medium">Войти</p>
       <p><span class="form-row">Телефон:</span></span> <input type="text" name="phone"></p>
        <p><span class="form-row">Пароль:</span> <input type="pasword" name="password"></p>
            <input type="submit" value="Войти">
        </form>
    </div>
    <div class="registration">
        <a href="/user/add_show/">Зарегистрироваться</a>
    </div>
    <div class="show-request red">
        <?=$data['request'];?>
    </div>
</div>