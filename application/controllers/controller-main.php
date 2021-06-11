<?php
class controllerMain extends  Controller {

    function actionIndex()
    {
        if(!empty($_SESSION)) {
            $auth = new Auth();
            $auth->logOut();
        }
        $this->view->generate('main-view.php', 'template-view.php');
    }
}
