<?php 

require_once ("Controller.php");
require_once ("User_Model.php");


class User_Controller extends Controller{
    



    public function View(){
        echo "VIEW777";
        $model = new UserModel();
        $model->View();
    }
    public function Create(){

        $model = new UserModel();
        $model->update();
        echo ("Create");

    }
    public function Update(){
        $model = new UserModel();
        $model->update();
        echo ("Update");

    }
    public function Delete(){
        $model = new UserModel();
        $model->update();
        echo ("Delete");

    }


}

?>