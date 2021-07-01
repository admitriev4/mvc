 <!-- добавить динамическое определение заголовка и подключение стилей-->
 <head>
     <link rel="stylesheet" type="text/css" href="/css/styles.css" />
     <link rel="stylesheet" type="text/css" href="/application/views/templates/main/css/template-styles.css" />
     <meta charset="utf-8">
     <title>MVC, ООП, AJAX #Дмитриев</title>
 </head>
 <body>
 <div class="header">
     <div class="wrapper">
         <div class="logo-container">
         </div>
         <div class="menu">
             <?if(!empty($_SESSION['fUser'])):?>
                 <a href="/user/update_show/">Изменить информацию о себе</a>
                 <a href="/user/update_show_pass/">Изменить пароль</a>
                 <a href="/user/delete_show/">Удалить свой аккаунт</a>

             <?endif;?>
         </div>
         <div class="auth">
             <?if(!empty($_SESSION['fUser'])):?>
                 <p><?=$_SESSION['fUser']['name']?> <?=$_SESSION['fUser']['phone']?></p>
                <p><a href="/">Выйти</a></p>
             <?endif;?>
         </div>
     </div>
 </div>
 <div class="wrapper">
