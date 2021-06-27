<?php

namespace app\engine;

use app\engine\DataBase;
use PDO;

/**
 * Description of Authentication
 *
 * @author vlad
 */
class Authentication {
    static public function run($email) {
       $dbh = DataBase::getInstance()->connnection;
       $stmt = $dbh->prepare('SELECT email, password FROM semply_user WHERE email=?');
       $stmt->execute(array($email));
       $getData = $stmt->fetch(PDO::FETCH_LAZY);
       $result = [
           'email' => $getData['email'],
           'password' => $getData['password']
       ];

       return $result;
    }
}
