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
        $id = $_GET['id'];
        $data = file_get_contents("date_files/documents/$id");
        $data =  json_decode($data, TRUE);
        var_dump($data);
        require_once("views/Views_files_update.php");
        $data2 = $_POST;
        $Errors = CheckDate1($data2);
        if (empty($data2)){
            require_once("views/Views_files_update.php");
        } else {
            FileModel::Update($data2, $id);
            require_once("views/Views_files_update.php");
        }
        var_dump($Errors);


        require_once("views/Views_files_update.php");
    }
    public function Delete()
    {
        $id = $_GET['id'];
        FileModel::Delete($id);
        //  require_once("views/List_Files_views.php");
        echo ("Delete FILE_CONTROLLER");
        echo "<br>";
    }
}
