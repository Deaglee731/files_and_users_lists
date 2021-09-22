<?php
class FileModel
{


    function View()
    {
        echo "123VIEWSFILE";
    }

    function Create()
    {

        $Errors = CheckDate1();


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

            print_r($_POST);
        }
    }







    function Update()
    {
        echo "123UPDATEFile";

        function UpdateDate()
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
                file_put_contents("date_files/documents/{$_GET['id']}", $result);
            }
            return $Errors;

            print_r($_POST);
        }

        if (isset($_GET['id'])) {
            $current_file  = $_GET['id'];
            $currents = "date_files/documents/$current_file.json";
            if (!isset($currents)) {
                echo "User already delete";
            } else {
                $date = file_get_contents("date_files/documents/$current_file");
                $json_array = json_decode($date, true);
            }
            if (isset($_POST['btn_editor'])) {

                $Errors = UpdateDate();

                header("Location:/files/");
            }
        }
    }


    function Delete()
    {
        if (isset($_GET['id'])){
            $current_file  = $_GET['id'];
             $current = file_get_contents("date_files/documents/$current_file");
             if (!isset($current)){
               echo "File deleted";
             }
             else{
                 unlink("date_files/documents/$current_file");
                 header('Location: /users/');
             }
          
          }
    }
}
