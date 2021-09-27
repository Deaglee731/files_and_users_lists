<?php

require_once("File_Controller.php");


class FileModel
{


    function View_file()
    {
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
    }



    function Create($data)
    {
        $result = json_encode($data);
        $current = file_get_contents("date_files/documents/numberic");
        $next = $current + 1;
        file_put_contents("date_files/documents/{$next}", $result);
        file_put_contents("date_files/documents/numberic", $next);
    }

    function Update($data, $id)
    {


        header('Location: /files/');
        $data = json_encode($data);
        file_put_contents("date_files/documents/$id", $data);
    }


    function Delete($id)
    {

        $current_file  = $id;
        $current = file_get_contents("date_files/documents/$current_file");
        if (!isset($current)) {
            echo "File deleted";
        } else {
            unlink("date_files/documents/$current_file");
            header('Location: /files/');
        }
    }
}




function Validation($data)
{

    $Errors = [];
    if ($data['Organization'] == '') {
        $Errors['Organization'] = "<h5> Поле Организация обязательно для заполнения </h5>";
    }

    if ($data['Counterparty'] == '') {
        $Errors['Counterparty'] = "<h5> Поле Контрагент обязательно для заполнения </h5>";
    }


    if ($data['Signatory'] == '') {
        $Errors['Signatory'] = "<h5> Поле Подписант обязательно для заполнения </h5>";
    }

    if ($data['Term-in'] == '') {
        $Errors['Term-in'] = "<h5>Поле Срок договора обязательно для заполнения </h5>";
    }
    if ($data['Term-out'] == '') {
        $Errors['Term-out'] = "<h5>Поле Срок договора обязательно для заполнения </h5>";
    }

    if ($data['Product'] == '') {
        $Errors['Product'] = "<h5>Поле Предмет договора обязательно для заполнения </h5>";
    }
    if ($data['Amount'] == '') {
        $Errors['Amount'] = "<h5>Поле Сумма договора обязательно для заполнения </h5>";
    }
    if ($data['Requisites'] == '') {
        $Errors['Requisites'] = "<h5>Поле Реквизиты обязательно для заполнения </h5>";
    }

    return $Errors;
}
