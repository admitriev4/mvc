<?php
class View {
    public $tamplate;
    public function __construct()
    {
/* доработать под шаблоны*/
    }

    function generate($contentView, $templateView, $data = null) {
        /*добавить header*/
        include "application/views/".$templateView;
        /*добавить footer*/
    }
}