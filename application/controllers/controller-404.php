<?php
class controller404 extends Controller {
    function actionIndex()
    {
        $this->view->generate('404-view.php', 'template-view.php');
    }
}
