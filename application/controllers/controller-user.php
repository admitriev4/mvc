<?php
class controllerUser extends Controller {
    function __construct() {
        $this->model = new modelUser();
        $this->view = new View();
    }

    function actionIndex()
    {
        $data['users'] = $this->model->getData();
        $data['FUser'] = $this->model->getFUser();
        $this->view->generate('user-view.php', 'template-view.php', $data);
    }
}

