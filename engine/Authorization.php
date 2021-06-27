<?php

namespace app\engine;

/**
 * Description of Authorization
 *
 * @author vlad
 */
class Authorization {
    static public function run( $password, $hash ) {
        if (password_verify($password, $hash)) return true;
    }
}
