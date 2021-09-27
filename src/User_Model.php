<?php

require_once("User_Controller.php");


class UserModel
{


    function View_Users()
    {
        function Decode()
        {
            $directory = scandir("date_users/users/");
            $result_out = array_diff($directory, [".", "..", "numberic"]);
            foreach ($result_out as $files) {
                $decodestr = file_get_contents("date_users/users/{$files}");
                $doc = json_decode($decodestr, TRUE);
                $doc['id'] = $files;
                $result_mass[] = $doc;
            }

            return $result_mass;
        }
        
        Decode();
    }



    function Create($data)
    {
        $result = json_encode($data);
        $current = file_get_contents("date_users/users/numberic");
        $next = $current + 1;
        file_put_contents("date_users/users/{$next}", $result);
        file_put_contents("date_users/users/numberic", $next);
    }

    function Update($data, $id)
    {


        header('Location: /users/');
        $data = json_encode($data);
        file_put_contents("date_users/users/$id", $data);
    }


    function Delete($id)
    {

        $current_file  = $id;
        $current = file_get_contents("date_users/users/$current_file");
        if (!isset($current)) {
            echo "File deleted";
        } else {
            unlink("date_users/users/$current_file");
            header('Location: /users/');
        }
    }
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
