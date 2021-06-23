<?php
class View {
    public $tamplate;
    public function __construct()
    {

    }

    function generate($contentView, $templateView, $data = null) {

        include "application/views/".$templateView;

    }
}