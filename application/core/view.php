<?php
class View {
    public $viewsDir;
    public $templateViewPath;
    public $contentViewPath;
    public $headerPath;
    public $footerPath;
    public function __construct($controllerViewsDir = "", $template = "main")
    {
        if (is_dir("application/views/templates/".$template."/")) {
            $headerPath = "application/views/templates/".$template."/header.php";
            $footerPath = "application/views/templates/".$template."/footer.php";
            $templateViewPath = "application/views/templates/".$template."/template.php";
            if(file_exists($headerPath) && file_exists($footerPath) && file_exists($templateViewPath)) {
                $this->viewsDir = $controllerViewsDir;
                $this->templateViewPath = $templateViewPath;
                $this->headerPath = $headerPath;
                $this->footerPath = $footerPath;
            }
        }
    }

    function generate($contentView, $data = null) {
        if(is_dir("application/views/".$this->viewsDir)) {
            $this->contentViewPath = 'application/views/'.$this->viewsDir.$contentView;
            if(file_exists($this->contentViewPath)) {
                include $this->templateViewPath;
            }
            elseif (file_exists('application/views/'.$contentView)) {
                $this->contentViewPath = 'application/views/'.$contentView;
                include $this->templateViewPath;
            }
        }
    }
}