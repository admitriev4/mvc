<?php
class controllerUser extends Controller {
    function __construct() {
        $this->model = new modelUser();
        $this->view = new View();
    }

    function actionIndex()
    {
        $user = $this->model->getData($_POST);

        if(empty($data->request)) {
            $data = $this->model->getList();
            $this->view->generate('user-view.php', 'template-view.php', $data);
        }
        else {
            $this->view->generate('main-view.php', 'template-view.php', $user->request);
        }
    }

    function actionAdd_show() {
        $this->view->generate('user-add-view.php', 'template-view.php');
    }
    function actionAdd() {
        $data = $this->model->addUser($_POST);
        if(empty($data['request'])) {
            $this->view->generate('user-view.php', 'template-view.php', $data);
        }
        else {
            $this->view->generate('user-add-view.php', 'template-view.php', $data);
        }

    }

    function actionUpdate_show() {
        $this->view->generate('user-update-view.php', 'template-view.php');
    }
    function actionUpdate() {
        $data = $this->model->updateUser($_POST);
        $this->view->generate('user-update-view.php', 'template-view.php', $data);
    }

    function actionUpdate_show_pass() {
        $data['id'] = $_POST['id'];
        $this->view->generate('user-update-pass-view.php', 'template-view.php', $data);
    }
    function actionUpdate_pass() {
        $data = $this->model->updatePassUser($_POST);
        $this->view->generate('user-update-pass-view.php', 'template-view.php', $data);
    }

    function actionDelete_show() {
        $data['id'] = $_POST['id'];
        $this->view->generate('user-delete-view.php', 'template-view.php', $data);
    }
    function actionDelete() {
        $data = $this->model->delete($_POST['id']);
        $this->view->generate('user-delete-view.php', 'template-view.php', $data);
    }
}

