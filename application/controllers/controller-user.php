<?php

class controllerUser extends Controller
{
    function __construct()
    {
        $this->model = new modelUser();
        $this->view = new View();
    }

    function actionIndex()
    {
        if (!empty($_POST) || !empty($_SESSION)) {
            $user = $this->model->getData($_POST);
            if (empty($user->request) || !empty($_SESSION['fUser'])) {
                $data = $this->model->getList();
                $this->view->generate('user-view.php', 'template-view.php', $data);
            } else {
                $this->view->generate('main-view.php', 'template-view.php', $user->request);
            }
        } else {
            $this->view->generate('main-view.php', 'template-view.php');
        }
    }

    function actionAdd_show()
    {
        $this->view->generate('user-add-view.php', 'template-view.php');
    }

    function actionAdd()
    {
        if (!empty($_POST)) {
            $user = $this->model->addUser($_POST);
            if (empty($user->request)) {
                $data = $this->model->getList();
                $this->view->generate('user-view.php', 'template-view.php', $data);
            } else {
                $this->view->generate('user-add-view.php', 'template-view.php', $user);
            }
        } else {
            $this->view->generate('main-view.php', 'template-view.php');
        }
    }

    function actionUpdate_show()
    {
        if (!empty($_SESSION)) {
            $this->view->generate('user-update-view.php', 'template-view.php');
        } else {
            $this->view->generate('main-view.php', 'template-view.php');
        }

    }

    function actionUpdate()
    {
        if (!empty($_POST)) {
        $data = $this->model->updateUser($_POST);
        $this->view->generate('user-update-view.php', 'template-view.php', $data);
        } else {
            $this->view->generate('main-view.php', 'template-view.php');
        }
    }

    function actionUpdate_show_pass()
    {
        if (!empty($_SESSION)) {
        $this->view->generate('user-update-pass-view.php', 'template-view.php');
        } else {
            $this->view->generate('main-view.php', 'template-view.php');
        }
    }

    function actionUpdate_pass()
    {
        if (!empty($_POST)) {
        $data = $this->model->updatePassUser($_POST);
        $this->view->generate('user-update-pass-view.php', 'template-view.php', $data);
        } else {
            $this->view->generate('main-view.php', 'template-view.php');
        }
    }

    function actionDelete_show()
    {
        if (!empty($_SESSION)) {
        $this->view->generate('user-delete-view.php', 'template-view.php');
        } else {
            $this->view->generate('main-view.php', 'template-view.php');
        }
    }

    function actionDelete()
    {
        $data = $this->model->delete($_SESSION['fUser']['id']);
        $auth = new Auth();
        $auth->logOut();
        $this->view->generate('user-delete-view.php', 'template-view.php', $data);
    }
}

