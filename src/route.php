<?php

require_once "engine.php";
require_once "Singleton.php";
$address = ($_SERVER['REQUEST_URI']);


class Router extends Singleton
{
    function run()
    {
        

        $address2 = $this->getPath();
        $address3 = $this->name123($address2);
        $route = [
            '/users/create' => 'create_users.php',
            '/files/create' => 'create_files.php',
            '/users/' => 'index_users.php',
            '/files/' => 'index_files.php',
            '/users/update' => 'update_users.php',
            '/files/update' => 'update_files.php',
            '/users/delete' => 'delete_users.php'

        ];
        foreach ($route as $key => $val) {
            if ($key == $address3) {
                require $val;
            }
        }
    }
 

    function getVar($name, $default = null)
    {
    }

    function name123($address3)
    {
        $idQ = strpos($address3, "?");
        if ($idQ > 0)
            $address3 = substr($address3, 0, $idQ);

        return $address3;
    }
    function getPath()
    {
        $tmpArr = array();
        parse_str($_SERVER['REQUEST_URI'], $tmpArr);
        $address = array_key_first($tmpArr);
        return $address;
    }
}

