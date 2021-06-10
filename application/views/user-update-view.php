<? var_dump($data);?>
<? if($data == null || isset($data['request'])):?>
<div class="update">
<form method="post" action="/user/update/" >
    <p class="title-medium">Обновление данных пользователя</p>
    <p class=""><input type="text" name="id" value="<?=$_SESSION['fUser']['id']?>" readonly></p>
    <p class="form-row"><span>Имя:</span> <input type="text" name="name"></p>
    <p class="form-row"><span>Фамилия:</span> <input type="text" name="surname"></p>
    <p class="form-row"><span>E-mail:</span> <input type="text" name="email"></p>
    <p class="form-row"><span>Телефон:</span> <input type="text" name="phone"></p>
    <p class="form-row"><span>Адрес:</span> <input type="text" name="address"></p>
    <input type="submit" value="Изменить" class="btn">
</form>
</div>
    <?if (isset($data['request'])):?>
        <div class="show-request red">
            <div>
                <?=$data['request']?>
            </div>
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
