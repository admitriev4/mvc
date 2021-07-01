 <!-- добавить динамическое определение заголовка и подключение стилей-->
 <head>
     <link rel="stylesheet" type="text/css" href="/css/styles.css" />
     <link rel="stylesheet" type="text/css" href="/application/views/templates/main/css/template-styles.css" />
     <meta charset="utf-8">
     <title><?=$titleView?></title>
 </head>
 <body>
 <div class="header">
     <div class="wrapper">
         <div class="logo-container">
         </div>
         <div class="menu">
             <?if(!empty($_SESSION['fUser'])):?>
                 <a href="/user/update_show/" class="btn">Изменить свои данные</a>
                 <a href="/user/update_show_pass/" class="btn">Изменить пароль</a>
                 <a href="/user/delete_show/" class="btn">Удалить аккаунт</a>

             <?endif;?>
         </div>
         <div class="auth">
             <?if(!empty($_SESSION['fUser'])):?>
             <div>
                 <p>Имя: <?=$_SESSION['fUser']['name']?></p>
                 <p>Фамилия: <?=$_SESSION['fUser']['surname']?></p>
                 <p>Телефон: <?=$_SESSION['fUser']['phone']?></p>
                 </div>
                <p><a href="/" class="btn">Выйти</a></p>
             <?endif;?>
         </div>
     </div>
 </div>
 <div class="wrapper">
