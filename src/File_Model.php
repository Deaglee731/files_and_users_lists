<?php

require_once("File_Controller.php");


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
            $directory = scandir("date_files/documents/");
            $result_out = array_diff($directory, [".", "..", "numberic"]);
            foreach ($result_out as $files) {
                $decodestr = file_get_contents("date_files/documents/{$files}");
                $doc = json_decode($decodestr, TRUE);
                $doc['id'] = $files;
                $result_mass[] = $doc;
            }

            return $result_mass;
        }
        Decode();

        // require_once("index_files.php");
    }



    function Create($data)
    {
       
        // header('Location: /files/');
        $result = json_encode($data);
    
        var_dump($result);
        $current = file_get_contents("date_files/documents/numberic");
       
        var_dump($current);
        
        $next = $current + 1;
        file_put_contents("date_files/documents/{$next}", $result);
        file_put_contents("date_files/documents/numberic", $next);
    }

    function Update($data,$id)
    {
        echo "UPDATE_FILE_MODEL";

        $data = json_encode($data);
        var_dump($data);
        file_put_contents("date_files/documents/$id", $data);


        //require_once("update_files.php");
    }


    function Delete($id)
    {
        echo "DELETE_FILE_MODEL";
        echo "<br>";
        $current_file  = $id;
        var_dump($current_file);
        $current = file_get_contents("date_files/documents/$current_file");
        if (!isset($current)) {
            echo "File deleted";
        } else {
            unlink("date_files/documents/$current_file");
            //header('Location: /files/');
        }       
    }
}




function CheckDate1($data)
{
    $i = 0;
    if ($data['Organization'] == '') {
        $Errors['Organization'] = "<h5> Поле Организация обязательно для заполнения </h5>";
        $i += 1;
    }

    if ($data['Counterparty'] == '') {
        $Errors['Counterparty'] = "<h5> Поле Контрагент обязательно для заполнения </h5>";
        $i += 1;
    }


    if ($data['Signatory'] == '') {
        $Errors['Signatory'] = "<h5> Поле Подписант обязательно для заполнения </h5>";
        $i += 1;
    }

    if ($data['Term-in'] == '') {
        $Errors['Term-in'] = "<h5>Поле Срок договора обязательно для заполнения </h5>";
        $i += 1;
    }
    if ($data['Term-in'] == '') {
        $Errors['Term-in'] = "<h5>Поле Срок договора обязательно для заполнения </h5>";
        $i += 1;
    }

    if ($data['Product'] == '') {
        $Errors['Product'] = "<h5>Поле Предмет договора обязательно для заполнения </h5>";
        $i += 1;
    }
    if ($data['Amount'] == '') {
        $Errors['Amount'] = "<h5>Поле Сумма договора обязательно для заполнения </h5>";
        $i += 1;
    }
    if ($data['Requisites'] == '') {
        $Errors['Requisites'] = "<h5>Поле Реквизиты обязательно для заполнения </h5>";
        $i += 1;
    }
    if ($i == 0) {
        return TRUE;
    } else {
        return $Errors;
    }
    print_r($_POST);
}
