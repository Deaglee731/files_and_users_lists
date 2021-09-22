<?php
class UserModel
{


    function View()
    {
        echo "123VIEWS/USERS";
    }

    function Create()
    {
        echo "123CREATEUSERS";

        $Errors1 = CheckDate1();


        function CheckDate1()
        {
            $i = 0;
            if ($_POST['login'] == '') {
                $Errors['login'] = "<h5> Поле login обязательно для заполнения </h5>";
                $i += 1;
            }

            if ($_POST['firstname'] == '') {
                $Errors['firstname'] = "<h5> Поле firstname обязательно для заполнения </h5>";
                $i += 1;
            }


            if ($_POST['lastname'] == '') {
                $Errors['lastname'] = "<h5> Поле lastname обязательно для заполнения </h5>";
                $i += 1;
            }

            if ($_POST['birthday'] == '') {
                $Errors['birthday'] = "<h5>Поле birthday обязательно для заполнения </h5>";
                $i += 1;
            }
            if ($i == 0) {
                header("Location:/users/");
                $result = json_encode($_POST);
                $current = file_get_contents("date_users/users/numberic");
                $next = $current + 1;
                file_put_contents("date_users/users/{$next}", $result);
                file_put_contents("date_users/users/numberic", $next);
            }
            return $Errors;
        }
    }

    function Update()
    {
        echo "123UPDATEUSERS";


        function UpdateDate1()
        {
            $i = 0;
            if ($_POST['login'] == '') {
                $Errors['login'] = "<h6> Поле login обязательно для заполнения </h6>";
                $i += 1;
            }

            if ($_POST['firstname'] == '') {
                $Errors['firstname'] = "<h6> Поле firstname обязательно для заполнения </h6>";
                $i += 1;
            }


            if ($_POST['lastname'] == '') {
                $Errors['lastname'] = "<h6> Поле lastname обязательно для заполнения </h6>";
                $i += 1;
            }

            if ($_POST['birthday'] == '') {
                $Errors['birthday'] = "<h6>Поле birthday обязательно для заполнения </h6>";
                $i += 1;
            }
            if ($i == 0) {
                header("Location:/users/");
                $result = json_encode($_POST);
                file_put_contents("date_users/users/{$_GET['id']}", $result);
            }
            return $Errors;
        }



        if (isset($_GET['id'])) {
            $current_file  = $_GET['id'];
            $currents = "date_users/users/$current_file.json";
            if (!isset($currents)) {
                echo "User already delete";
            } else {
                $date = file_get_contents("date_users/users/$current_file");
                $json_array = json_decode($date, true);
            }



            if (isset($_POST['btn_editor'])) {
                $Errors = UpdateDate1();
                header("Location:/users/");
            }
        }
    }



    function Delete()
    {
        echo "123DELETEUSERS";

        if (isset($_GET['id'])) {
            $current_file  = $_GET['id'];
            $current = file_get_contents("date_users/users/$current_file");
            if (!isset($current)) {
                echo "File deleted";
            } else {
                unlink("date_users/users/$current_file");
                header('Location: /users/');
            }
        }
    }
}
