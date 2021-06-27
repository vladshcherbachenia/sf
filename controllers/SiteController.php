<?php

namespace app\controllers;

use app\engine\Controller;
use app\models\User;
use app\engine\DataBase;

class SiteController extends Controller{
    public function actionIndex() {
        $this->setTitle("Главная");
        $this->render('site/index');
    }
    
    public function actionDocumentation() {
        $this->setTitle("Документация");
        $this->render('site/doc');
    }
    
    public function actionAuthorization() {
        $this->setTitle("Авторизация");
        $this->render('site/authorization');
    }
    
    public function actionRegistration() {
        $this->setTitle("Регистрация");
        $this->render('site/registration');
    }
}
