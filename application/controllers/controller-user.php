<?php

class controllerUser extends Controller
{
    function __construct()
    {
        $this->viewPath = "user/";
        $this->model = new modelUser();
        $this->view = new View($this->viewPath);


    }

    function actionIndex()
    {
        var_dump($_SESSION);
        if (!empty($_POST) || !empty($_SESSION)) {
            $user = $this->model->getData($_POST);
            if (empty($user->request) || !empty($_SESSION['fUser'])) {
                $data['users'] = $this->model->getPaginateList();
                $data['count_page'] = $this->model->getCountPage();

                $this->view->generate('user-view.php', $data);
            } else {
                /*echo json_encode($user->request,  JSON_UNESCAPED_UNICODE);*/
                $this->view->generate('main-view.php', $user->request);
            }
        } else {
            $this->view->generate('main-view.php');
        }
    }
    function actionPaginate($page) {
        if(!empty($_SESSION)) {
            $data['users'] = $this->model->getPaginateList($page);
            $data['count_page'] = $this->model->getCountPage();
            $this->view->generate('user-view.php', $data);
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
        if (!empty($_SESSION)) {
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
        /*$this->view->generate('user-update-view.php', $data);*/
        } else {

            $this->view->generate('main-view.php');
        }
    }

    function actionUpdate_show_pass()
    {
        if (!empty($_SESSION)) {
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
        /*$this->view->generate('user-update-pass-view.php', $data);*/
        } else {
            $this->view->generate('main-view.php');
        }
    }

    function actionDelete_show()
    {
        if (!empty($_SESSION)) {
        $this->view->generate('user-delete-view.php', 'template.php');
        } else {
            $this->view->generate('main-view.php', 'template.php');
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

