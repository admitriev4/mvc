<?php
class controllerUser extends Controller {
    function __construct() {
        $this->model = new modelUser();
        $this->view = new View();
    }

    function actionIndex()
    {
        $req = $_POST;
        $data['users'] = $this->model->getList('users');
        $data['FUser'] = $this->model->getOne('users','phone', $req["phone"]);
        if(!empty($data['FUser'])) {
            $this->view->generate('user-view.php', 'template-view.php', $data);
        }
        else {
            $req = "<p>Ошибка авторизации!!!</p><p>Введите коректные данные</p>";
            $this->view->generate('main-view.php', 'template-view.php', $req);
        }
    }
    function actionAdd_show() {
        /*$data['id'] = $_POST['id'];
        $this->view->generate('user-update-view.php', 'template-view.php', $data);*/
        /* убрать регистрацию на отдельную страницу или не убирать*/
    }
    function actionAdd() {
        $req = $_POST;
        $query = array('name'=> $req["name"],'surname'=> $req["surname"],'email'=> $req["email"],'phone'=> $req["phone"], 'address' => $req["address"], 'password' => $req["password"]);
        $data["add_user"] = $this->model->add('users', $query);
        $data['users'] = $this->model->getList('users');
        $data['FUser'] = $this->model->getOne('users','phone', $req["phone"]);


        $this->view->generate('user-view.php', 'template-view.php', $data);

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

