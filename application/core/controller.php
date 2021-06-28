<?php
class Controller {
    public $model;
    public $view;
    public $viewPath;

    function __construct() {
        $this->view = new View();
    }

    function actionIndex() {

    }
    function actionPaginate($page) {

    }
}