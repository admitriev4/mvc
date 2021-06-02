<?php
class View {
    function generate($contentView, $templateView, $data = null) {

        include "application/views/".$templateView;

    }
}