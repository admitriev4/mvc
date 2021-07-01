<div class="grid-container">
    <div class="message">
        <p class="title-big">Войдите или Зарегистрируйтесь</p>
    </div>
    <div class="autoresation">
        <form method="post" action="/user/auth/" data-type="redirect" id="auth">
        <p class="title-medium">Войти</p>
            <p><span class="form-row">Телефон:</span>
                <input type="text" name="phone" placeholder="+79999999999" class="input">
                <span class="request red" id="phone" ></p>
            <p><span class="form-row">Пароль:</span>
                <input type="password" name="password" class="input">
                <span class="request red" id="password"></p>
            <input type="submit" value="Войти" class="btn">
        </form>
    </div>
    <div class="registration">
        <a href="/user/add_show/" class="btn">Зарегистрироваться</a>
    </div>
</div>