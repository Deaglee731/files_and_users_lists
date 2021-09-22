<?php 

require_once ("Controller.php");
require_once ("User_Model.php");
require_once ("User_view.php");

class User_Controller extends Controller{
    



    public function View(){
        echo "VIEW777";
        $model = new UserModel();
        $model->Views();
    }
    public function Create(){

        $model = new UserModel();
        $model->Create();
        echo ("Create");

    }
    public function Update(){
        $model = new UserModel();
        $model->Update();
        echo ("Update");

    }
    public function Delete(){
        $model = new UserModel();
        $model->Dpdate();
        echo ("Delete");

    }


}

?>