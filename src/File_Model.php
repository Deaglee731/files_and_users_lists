<?php

require_once("File_Controller.php");
require_once("views/List_Files_views.php");


class FileModel
{


    function View_file()
    {
        echo "VIEW_FILE_MODEL";
        echo "<br>";
        //$result_mass = Decode();
        //$massive_id = array();

        function Decode()
        {
            $directory = scandir("date_users/users/");
            $result_out = array_diff($directory, [".", "..", "numberic", "result"]);
            $id = 0;
            foreach ($result_out as $files) {
                $decodestr = file_get_contents("date_users/users/{$files}");
                $user = json_decode($decodestr, TRUE);
                $user['id'] = $files;
                $result_mass[] = $user;
                $massive_id[$id] = $files;
            }
            return $result_mass;
        }
        Decode();

        // require_once("index_files.php");
    }

    function Create()
    {
        
        echo "CREATE_FILE_MODEL";
        echo "<br>";
        // require_once("create_files.php");
    }
    function Update()
    {
        echo "UPDATE_FILE_MODEL";
        echo "<br>";
        require_once("update_files.php");
    }


    function Delete()
    {
        echo "DELETE_FILE_MODEL";
        echo "<br>";
        require_once("delete_files.php");
    }


    function CheckDate1()
    {
        $i = 0;
        if ($_POST['Organization'] == '') {
            $Errors['Organization'] = "<h5> Поле Организация обязательно для заполнения </h5>";
            $i += 1;
        }

        if ($_POST['Сounterparty'] == '') {
            $Errors['Сounterparty'] = "<h5> Поле Контрагент обязательно для заполнения </h5>";
            $i += 1;
        }


        if ($_POST['Signatory'] == '') {
            $Errors['Signatory'] = "<h5> Поле Подписант обязательно для заполнения </h5>";
            $i += 1;
        }

        if ($_POST['Term-in'] == '') {
            $Errors['Term-in'] = "<h5>Поле Срок договора обязательно для заполнения </h5>";
            $i += 1;
        }
        if ($_POST['Term-in'] == '') {
            $Errors['Term-in'] = "<h5>Поле Срок договора обязательно для заполнения </h5>";
            $i += 1;
        }

        if ($_POST['Product'] == '') {
            $Errors['Product'] = "<h5>Поле Предмет договора обязательно для заполнения </h5>";
            $i += 1;
        }
        if ($_POST['Amount'] == '') {
            $Errors['Amount'] = "<h5>Поле Сумма договора обязательно для заполнения </h5>";
            $i += 1;
        }
        if ($_POST['Requisites'] == '') {
            $Errors['Requisites'] = "<h5>Поле Реквизиты обязательно для заполнения </h5>";
            $i += 1;
        }
        if ($i == 0) {
            header('Location: /files/');
            $result = json_encode($_POST);
            $current = file_get_contents("date_files/documents/numberic");
            $next = $current + 1;
            file_put_contents("date_files/documents/{$next}", $result);
            file_put_contents("date_files/documents/numberic", $next);
        }
        return $Errors;
    }
}
