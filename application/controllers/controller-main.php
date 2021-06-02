<?php
class controllerMain extends  Controller {

    function actionIndex()
    {

        $this->view->generate('main-view.php', 'template-view.php');
    }
}
