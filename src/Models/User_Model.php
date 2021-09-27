<?php

namespace Models;

use Models;
use Controllers\User_Controller;








class User_Model extends Model
{
    protected $path_next = "date_users/users/numberic";
    protected $path_file = "date_users/users/";
    protected $path_index = "/users/";
}




function Validation2($data)
{

    $Errors = [];
    if ($data['login'] == '') {
        $Errors['login'] = "<h5> Поле Login обязательно для заполнения </h5>";
    }

    if ($data['firstname'] == '') {
        $Errors['firstname'] = "<h5> Поле Firstname обязательно для заполнения </h5>";
    }


    if ($data['lastname'] == '') {
        $Errors['lastname'] = "<h5> Поле Lastname обязательно для заполнения </h5>";
    }

    if ($data['birthday'] == '') {
        $Errors['birthday'] = "<h5>Поле Birthday обязательно для заполнения </h5>";
    }
    return $Errors;
}
