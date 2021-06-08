<?php
class controllerUser extends Controller {
    function __construct() {
        $this->model = new modelUser();
        $this->view = new View();
    }

    function actionIndex()
    {
        $data = $this->model->getData($_POST);
        if(empty($data['request'])) {
            $this->view->generate('user-view.php', 'template-view.php', $data);
        }
        else {
            $this->view->generate('main-view.php', 'template-view.php', $data);
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
        $data['id'] = $_POST['id'];
        $this->view->generate('user-update-view.php', 'template-view.php', $data);
    }
    function actionUpdate() {
        $req = $_POST;
        $id = $_POST['id'];
        $data = $this->model->update('users', $req, $id);
        $this->view->generate('user-update-view.php', 'template-view.php', $data);
    }

    function actionUpdate_show_pass() {
        $data['id'] = $_POST['id'];
        $this->view->generate('user-update-pass-view.php', 'template-view.php', $data);
    }
    function actionUpdate_pass() {
        $id = $_POST['id'];
        /* дописать проверки и хеширование, проверить эту функцию*/
        /*$req = $_POST;
        $data = $this->model->update('users', $req, $id);*/
        $this->view->generate('user-update-pass-view.php', 'template-view.php'/*, $data*/);
    }

    function actionDelete_show() {
        $data['id'] = $_POST['id'];
        $this->view->generate('user-delete-view.php', 'template-view.php', $data);
    }
    function actionDelete() {
        $id = $_POST['id'];
        $data = $this->model->delete('users', $id);
        $this->view->generate('user-delete-view.php', 'template-view.php', $data);
    }
}

