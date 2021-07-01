<?php
class controllerMain extends  Controller {

    function actionIndex()
    {
            $auth = new Auth();
            if ($auth->check()) {
                $auth->logOut();
            }
        $this->view->generate('main-view.php','Войдите или зарегистрируйтесь');
    }
}
