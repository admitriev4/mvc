<? if($data == null):?>
    <div class="delete">
        <form method="post" action="/user/delete/" >
            <p class="title-medium">Удаление данных пользователя</p>
            <p>Вы действительно хотите удалить данного пользователя?</p>
            <input type="submit" value="Удалить" class="btn">
            <a href="/user/">Отмена</a>
        </form>
    </div>
<?else:?>
    <div class="delete-request">
        <div>
        <p class="title-medium">Удаление данных пользователя</p>
        <p>Успешно выполнено!</p>
        <p><a href="/">Выйти</a> </p>
        </div>
    </div>
<?endif;?>
