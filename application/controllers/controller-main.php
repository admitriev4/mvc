<?php
class controllerMain extends  Controller {

    function actionIndex()
    {
            $auth = new Auth();
            if ($auth->check()) {
                $auth->logOut();
            }
            var_dump($_SESSION);
        $this->view->generate('main-view.php');
    }
}
