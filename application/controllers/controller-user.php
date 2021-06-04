<?php
class controllerUser extends Controller {
    function __construct() {
        $this->model = new modelUser();
        $this->view = new View();
    }

    function actionIndex()
    {
        $phone = "+79096664422   +79999999999  +79998889898";
        $req = $_POST;
        $data['users'] = $this->model->getData();
        $data['FUser'] = $this->model->getFUser($req["phone"]);
        if(!empty($data['FUser'])) {
            $this->view->generate('user-view.php', 'template-view.php', $data);
        }
        else {
            $req = "<p>Ошибка авторизации!!!</p><p>Введите коректные данные</p>";
            $this->view->generate('main-view.php', 'template-view.php', $req);
        }
    }
    function actionAdd() {
        $req = $_POST;
        $data["add_user"] = $this->model->addUser($req);
        $data['users'] = $this->model->getData();
        $data['FUser'] = $this->model->getFUser($req["phone"]);
        if(!empty($data['FUser'])) {
            $this->view->generate('user-view.php', 'template-view.php', $data);
        }
        else {
            $req = "<p>Ошибка регистрации!!!</p><p>Введите коректные данные</p>";
            $this->view->generate('main-view.php', 'template-view.php', $req);
        }


    }
    function actionUpdate() {
        $this->view->generate('user-update-view.php', 'template-view.php');
    }
    function actionUpdate_pass() {
        $this->view->generate('user-update-pass-view.php', 'template-view.php');
    }
    function actionDelete() {
        $this->view->generate('user-delete-view.php', 'template-view.php');
    }
}

