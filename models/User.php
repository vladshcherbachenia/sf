<?php

namespace app\models; 

use app\engine\DataBase;

class User {
    public function getData() {
        $dbh = DataBase::getInstance()->connnection;
        print_r($dbh);
    }
}
