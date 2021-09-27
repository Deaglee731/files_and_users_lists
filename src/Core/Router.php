<?php
namespace Core;
//require_once "Singleton.php";
//require_once "User_Controller.php";
// require_once "File_Controller.php";

use Core\Singleton;
use Controllers\Controller;
use Controllers\User_Controller;
use Controllers\File_Controller;

$address = ($_SERVER['REQUEST_URI']);


class Router extends Singleton
{
    function run()
    {

        $address2 = $this->getPath();
        $address3 = $this->name123($address2);
        $route = array(
            "/index"             => [
                "className" => Controller::class,
                "method" => ""
            ],
            "/users/"           => [
                "className" => "Controllers\User_Controller",
                "method" => "View"
            ],
            "/users/create" => [
                "className" => 'Controllers\User_Controller',
                "method" => "Create"
            ],
            "/users/update"       => [
                "className" => "Controllers\User_Controller",
                "method" => "Update"
            ],
            "/users/delete"     => [
                "className" => "Controllers\User_Controller",
                "method" => "Delete"
            ],
            "/files/"       => [
                "className" => "Controllers\File_Controller",
                "method" => "View"
            ],
            "/files/create" => [
                "className" => 'Controllers\File_Controller',
                "method" => "Create"
            ],
            "/files/update"   => [
                "className" => "Controllers\File_Controller",
                "method" => "Update"
            ],
            "/files/delete" => [
                "className" => "Controllers\File_Controller",
                "method" => "Delete"
            ]
        );
        foreach ($route as $key => $val) {

            if ($key == $address3) {
                
                $controllerClass = $val['className'];
                $method = (string)$val['method'];
                $Controller = new $controllerClass();
                $Controller->$method();
                //require $val;
            } else {
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
