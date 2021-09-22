<?php 

require_once ("Controller.php");
require_once ("File_Model.php");


class File_Controller extends Controller{
    



    public function View(){
        echo "123";
        $model = new FileModel();
        $model->View();
    }
    public function Create(){

        $model = new FileModel();
        $model->update();
        echo ("Create");

    }
    public function Update(){
        $model = new FileModel();
        $model->update();
        echo ("Update");

    }
    public function Delete(){
        $model = new FileModel();
        $model->update();
        echo ("Delete");

    }


}
?>