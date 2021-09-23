<?php

require_once("Controller.php");
require_once("File_Model.php");

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

class File_Controller extends Controller
{
    public function View()
    {
        echo "VIEW_FILE_CONTROLLER";
        echo "<br>";
        $model = new FileModel();
        $model->View_file();
        $result_mass = Decode();
        var_dump($result_mass);
        require_once("views/List_Files_views.php");
        
    }
    public function Create()
    {
        echo ("Create FILE_CONTROLLER");
        echo "<br>";
        $model = new FileModel();
        $model->Create();
        $Errors = CheckDate1();
        require_once("views/Views_files_create.php");
    }
    public function Update()
    {
        echo ("Update FILE_CONTROLLER");
        echo "<br>";
        $model = new FileModel();
        $model->update();
    }
    public function Delete()
    {

        echo ("Delete FILE_CONTROLLER");
        echo "<br>";
        $model = new FileModel();
        $model->update();
        echo ("Delete FILE_CONTROLLER");
        echo "<br>";
    }
}
