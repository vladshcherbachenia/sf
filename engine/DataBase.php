<?php

namespace app\engine;

use PDO;
/**
 * Класс для работы базы данных 
 *
 * @author vlad
 */
class DataBase {
    /**
     * Объект одиночки храниться в статичном поле класса. Это поле — массив, так
     * как мы позволим нашему Одиночке иметь подклассы. Все элементы этого
     * массива будут экземплярами кокретных подклассов Одиночки. Не волнуйтесь,
     * мы вот-вот познакомимся с тем, как это работает.
     */
    private static $instance = null;
    private $connection = null;

    /**
     * Конструктор Одиночки всегда должен быть скрытым, чтобы предотвратить
     * создание объекта через оператор new.
     */
    protected function __construct() { 
        try {
            $config = require __DIR__ . '/../config/db.php';
            $this->connnection = new PDO('mysql:host='.$config['host'].';dbname='.$config['name'].'', $config['user'], $config['password'], array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
    }
    
    public static function getInstance()
    {
        if(!self::$instance)
        {
          self::$instance = new self;
        }

        return self::$instance;
    }
    
    /**
     * Одиночки не должны быть клонируемыми.
     */
    protected function __clone() { }

    /**
     * Одиночки не должны быть восстанавливаемыми из строк.
     */
    public function __wakeup()
    {
        throw new \Exception("Cannot unserialize a singleton.");
    }
}
