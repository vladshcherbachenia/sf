<?php

namespace app\engine;

/**
 * Description of Router
 *
 * @author vlad
 */
class Router {

    private $request;
    private $url;


    public function __construct($request) {
        $this->request = $request;

        if ( array_key_exists('url', $this->request) ) {
            $this->url = explode("/", $request['url']);
        } else {
            $this->url = array();
        }

    }

    public function run() {

        $routerConf = require __DIR__ . '/../config/router.php';
        $statePageSave = true;

        if( $pos = strripos($_SERVER['REQUEST_URI'], "?") )  {
            $getUrl = substr($_SERVER['REQUEST_URI'], 0, $pos);
        } else {
            $getUrl = $_SERVER['REQUEST_URI'];
        }

        foreach ( $routerConf as $routerConfKey => $routerConfItem ) {
            if ($routerConfKey == $getUrl) {
                $nameActionClass = ucfirst( $routerConfItem['controller'] . 'Controller');
                $controller = 'app\controllers\\' . $nameActionClass;
                $action = 'action' . ucfirst($routerConfItem['action']);
                $runController = new $controller();
                $runController->$action();

                $statePageSave = !$statePageSave;
                break;
            }
        }

        if ( $statePageSave ) {
            echo '404';
        }

    }

}
