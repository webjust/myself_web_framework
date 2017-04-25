<?php
namespace core\lib;

class model extends \PDO
{
    public function __construct()
    {
        $dsn = 'mysql:host=localhost;dbname=demo;charset=UTF8;';
        $username = 'root';
        $password = 'root';
        try {
            parent::__construct($dsn, $username, $password);
        } catch (\Exception $e) {
            p($e->getMessage());
            die;
        }

    }
}
