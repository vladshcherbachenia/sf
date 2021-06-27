<?php

namespace app\engine;
use app\engine\DataBase;

class Controller {
    
    private $template = 'main';
    private $title = 'Simply framework'; // Сделать в будущем в конфиге данные пока тут !
    
    public function render($template, $params = false) {     
        if ($params) 
            extract($params);
    
        $path = __DIR__ . '/../views/'. $template .'.php';
        ob_start(); 
        require $path;
        $content = ob_get_clean(); 
        $title = $this->getTitle();
        require __DIR__ . '/../views/template/'. $this->template .'.php';
    }
    
    public function setTitle( String $valueTitle ) {
        $this->title = $valueTitle;
    }
    
    public function getTitle() {
        return $this->title;
    }

}
