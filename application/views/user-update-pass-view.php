<? if($data == null || isset($data->request)):?>
<div class="update-pass">
<form method="post" action="/user/update_pass/" >
    <p class="title-medium">Обновление пароля пользователя</p>
    <p class="title-small">Длина пароля не менее 8 символов, должны использоваться латинские буквы обоих регистров, знаки препинания и цифры.</p>
    <p class="form-row"><span>Старый пароль:</span> <input type="password" name="old_password"></p>
    <p class="form-row"><span>Новый пароль:</span> <input type="password" name="password"></p>
    <p class="form-row"><span class="repeat-pass">Повторите пароль:</span> <input type="password" name="repeat_password"></p>
    <input type="submit" value="Изменить" class="btn">
    <a href="/user/">Назад</a>
</form>
</div>
    <?if (isset($data->request)):?>
        <div class="show-request red">
            <? if(is_array($data->request)):?>
                <?foreach ($data->request as $value):?>
                    <p><?=$value;?></p>
                <?endforeach;?>
            <?endif;?>
        </div>
    <?endif;?>
<?else:?>
    <div class="update-request">
        <div>
            <p class="title-medium">Обновление данных пользователя</p>
            <p>Успешно выполнено!</p>
            <p><a href="/user/">Назад</a> </p>
        </div>
    </div>
<?endif;?>
