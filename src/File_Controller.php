<?php

require_once("Controller.php");
require_once("File_Model.php");

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
        var_dump($_POST);
        $data = $_POST;
        $Errors = CheckDate1($_POST);
        var_dump($Errors);
        if (!empty($data)) {
            FileModel::Create($data);
            require_once("views/Files_create_views.php");
        } else {
            require_once("views/Files_create_views.php");
        }
    }
    public function Update()
    {
        echo ("Update FILE_CONTROLLER");
        echo "<br>";

        $id = $_GET['id'];
        $data = $_REQUEST;
        var_dump($id);
        var_dump($data);

        $Errors = CheckDate1($data);
        if ($Errors == TRUE) {
            FileModel::Update($data, $id);
            var_dump($data);
            require_once("views/Views_files_update.php");
        } else {
            $Errors = CheckDate1();
            require_once("views/Views_files_update.php");
        }
    }
    public function Delete()
    {


        if ($_POST == NULL) {
        } else {
            echo ("123");
            FileModel::Delete($_POST);
        }
        require_once("views/List_Files_views.php");
        echo ("Delete FILE_CONTROLLER");
        echo "<br>";
    }
}
