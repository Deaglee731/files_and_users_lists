<?php

require_once "engine.php";
require_once "Singleton.php";
require_once "User_Controller.php";
require_once "File_Controller.php";
$address = ($_SERVER['REQUEST_URI']);


class Router extends Singleton
{
    function run()
    {

        $address2 = $this->getPath();
        $address3 = $this->name123($address2);
        $routes = array(
            "/index"             => [
                "className" => "Controller",
                "method" => ""
            ],
            "/users/"           => [
                "className" => "UserController",
                "method" => "View"
            ],
            "/users/create/" => [
                "className" => 'UserController',
                "method" => "Create"
            ],
            "/users/update/"       => [
                "className" => "UserController",
                "method" => "Update"
            ],
            "/users/delete/"     => [
                "className" => "UserController",
                "method" => "Delete"
            ],
            "/files/"       => [
                "className" => "FileController",
                "method" => "View"
            ],
            "/files/create/" => [
                "className" => 'FileController',
                "method" => "Create"
            ],
            "/files/update/"   => [
                "className" => "FileController",
                "method" => "Update"
            ],
            "/files/delete/" => [
                "className" => "FileController",
                "method" => "Delete"
            ]
        );
        foreach ($routes as $key => $val) {
            if ($key == '/users/') {
                $model = new User_Controller;
                $model->IndexUsers();
               // require $val;
            }
            else {
               // $model = new File_Controller;
                //$model->IndexFiles();
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
