<?php
namespace Controllers;
use Models\UserModel;
require_once("Controller.php");
require_once("User_Model.php");

class User_Controller extends Controller
{


    public function View()
    {
        $model = new UserModel();
        $model->View();
        $result_mass = $model->Decode();
        require_once("views/List_users_views.php");
    }
    public function Create()
    {

        $data['login'] = $_POST['login'];
        $data['firstname'] = $_POST['firstname'];
        $data['lastname'] = $_POST['lastname'];
        $data['birthday'] = $_POST['birthday'];
        if (count($_POST) > 0) {
            $Errors = Validation2($data);
            if (empty($Errors)) {
                $obj = new UserModel();
                $obj->Create($data);
                header('Location: /users/');
                return;
            }
        }

        require("views/Users_create_views.php");
    }
    public function Update()
    {
        $id = $_GET['id'];
        
        $data = file_get_contents("date_users/users/$id");
        $data =  json_decode($data, TRUE);
        if (count($_POST) > 0) {
            $data['login'] = $_POST['login'];
            $data['firstname'] = $_POST['firstname'];
            $data['lastname'] = $_POST['lastname'];
            $data['birthday'] = $_POST['birthday'];
            $Errors = Validation2($data);
            if (empty($Errors)) {
                $obj = new UserModel();
                $obj->Update($data,$id);
                header('Location: /users/');
                return;
            }
        }

        require_once("views/Views_users_update.php");
    }
    public function Delete()
    {
        $id = $_GET['id'];
        $obj = new UserModel();
        $obj->Delete($id);
    }
}
