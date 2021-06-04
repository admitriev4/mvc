<div class="grid-container">
    <div class="message">
        <p class="title-big">Войдите или Зарегистрируйтесь</p>
        <p><?=$data;?></p>
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
            <form method="post" action="/user/add/" >
                <p class="title-medium">Регистрация</p>
                <p class="form-row"><span>Имя:</span> <input type="text" name="name"></p>
                <p class="form-row"><span>Фамилия:</span> <input type="text" name="surname"></p>
                <p class="form-row"><span>E-mail:</span> <input type="text" name="email"></p>
                <p class="form-row"><span>Телефон:</span> <input type="text" name="phone"></p>
                <p class="form-row"><span>Адрес:</span> <input type="text" name="address"></p>
                <p class="form-row"><span>Пароль:</span> <input type="pasword" name="password"></p>
                <p class="form-row"><span class="repeat-pass">Повторите пароль:</span> <input type="pasword" name="repeat_password"></p>
                <input type="submit" value="Регистрация">
            </form>
    </div>

</div>