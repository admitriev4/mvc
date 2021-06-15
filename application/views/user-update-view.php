<? if($data == null || isset($data->request)):?>
<div class="user-grid-container">
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
</div>

<div class="update">
<form method="post" action="/user/update/" >
    <p class="title-medium">Обновление данных пользователя</p>
    <p class="form-row"><span>Имя:</span> <input type="text" name="name"></p>
    <p class="form-row"><span>Фамилия:</span> <input type="text" name="surname"></p>
    <p class="form-row"><span>E-mail:</span> <input type="text" name="email"></p>
    <p class="form-row"><span>Телефон:</span> <input type="text" name="phone"></p>
    <p class="form-row"><span>Адрес:</span> <input type="text" name="address"></p>
    <input type="submit" value="Изменить" class="btn">
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
