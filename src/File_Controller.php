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
        if ($_POST == NULL) {
        }
        else
        {
            echo ("123");
            FileModel::Save($_POST);
        }
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
