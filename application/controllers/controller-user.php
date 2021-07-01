<?php

class controllerUser extends Controller
{
    function __construct()
    {
        $this->viewPath = "user/";
        $this->auth = new Auth;
        $this->model = new modelUser();
        $this->view = new View($this->viewPath);


    }

    function actionIndex()
    {
        if ($this->auth->check()) {
            $data['users'] = $this->model->getPaginateList("1");
            $data['count_page'] = $this->model->getCountPage();
                $this->view->generate('user-view.php', $data);
        } else {
            $this->view->generate('main-view.php');
        }
    }
    function actionAuth()
    {
            $user = $this->model->getData($_POST);
            if (empty($user->request) || $this->auth->check()) {
                echo json_encode(null,  JSON_UNESCAPED_UNICODE);
            } else {
                echo json_encode($user->request,  JSON_UNESCAPED_UNICODE);
            }

    }
    function actionPaginate($page) {
        if($this->auth->check()) {
            $users = $this->model->getPaginateList($page);
            echo json_encode($users,  JSON_UNESCAPED_UNICODE);

        } else {
            $this->view->generate('main-view.php');
        }
    }

    function actionAdd_show()
    {
        $this->view->generate('user-add-view.php');
    }

    function actionAdd()
    {
        if (!empty($_POST)) {
            $user = $this->model->addUser($_POST);
                 echo json_encode($user->request,  JSON_UNESCAPED_UNICODE);
        } else {
            $this->view->generate('main-view.php');
        }
    }

    function actionUpdate_show()
    {
        if ($this->auth->check()) {
            $this->view->generate('user-update-view.php');
        } else {
            $this->view->generate('main-view.php');
        }

    }

    function actionUpdate()
    {
        if (!empty($_POST)) {
        $data = $this->model->updateUser($_POST);
            echo json_encode($data->request,  JSON_UNESCAPED_UNICODE);
        } else {

            $this->view->generate('main-view.php');
        }
    }

    function actionUpdate_show_pass()
    {
        if ($this->auth->check()) {
        $this->view->generate('user-update-pass-view.php');
        } else {
            $this->view->generate('main-view.php');
        }
    }

    function actionUpdate_pass()
    {
        if (!empty($_POST)) {
        $data = $this->model->updatePassUser($_POST);
        echo json_encode($data->request,  JSON_UNESCAPED_UNICODE);
        } else {
            $this->view->generate('main-view.php');
        }
    }

    function actionDelete_show()
    {
        if ($this->auth->check()) {
        $this->view->generate('user-delete-view.php');
        } else {
            $this->view->generate('main-view.php');
        }
    }

    function actionDelete()
    {
        $this->model->delete($_SESSION['fUser']['id']);
        $auth = new Auth();
        $auth->logOut();
        echo json_encode(null,  JSON_UNESCAPED_UNICODE);
    }
}

