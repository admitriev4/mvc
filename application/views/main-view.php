<div class="grid-container">
    <div class="message">
        <p class="title-big">Войдите или Зарегистрируйтесь</p>
    </div>
    <div class="autoresation">
        <form method="post" action="/user/" data-type="redirect" id="auth">
        <p class="title-medium">Войти</p>
            <p><span class="form-row">Телефон:</span> <input type="text" name="phone" placeholder="+79999999999"></p>
            <p><span class="form-row">Пароль:</span> <input type="pasword" name="password"></p>
            <input type="submit" value="Войти">
        </form>
    </div>
    <div class="registration">
        <a href="/user/add_show/">Зарегистрироваться</a>
    </div>
    <?if (isset($data)):?>
        <div class="show-request red">
            <? if(is_array($data)):?>
                <?foreach ($data as $value):?>
                    <p><?=$value;?></p>
                <?endforeach;?>
            <?endif;?>
        </div>
    <?endif;?>
</div>