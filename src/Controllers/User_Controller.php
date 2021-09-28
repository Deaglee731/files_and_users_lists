<?php
namespace Controllers;

use Core\View;
use Models\User_Model;
use Validators\User_validation;


class User_Controller extends Controller
{


    public function View()
    {
        $model = new User_Model();
        $result_mass = $model->Decode();
        $template = "List_users_views";
        View::render($template,$result_mass);
        //require_once("views/List_users_views.php");
    }
    public function Create()
    {

        $data['login'] = $_POST['login'];
        $data['firstname'] = $_POST['firstname'];
        $data['lastname'] = $_POST['lastname'];
        $data['birthday'] = $_POST['birthday'];
        if (count($_POST) > 0) {
            $Errors = User_validation::Validation2($data);
            if (empty($Errors)) {
                $obj = new User_Model();
                $obj->Create($data);
                header('Location: /users/');
                return;
            }
        }
        $template = "Users_create_views";
        View::render($template,$data);
        //require("views/Users_create_views.php");
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
            $Errors = User_validation::Validation2($data); 
            if (empty($Errors)) {
                $obj = new User_Model();
                $obj->Update($data,$id);
                header('Location: /users/');
                return;
            }
        }

        $template = "Views_users_update";
        View::render($template,$data);
        //require_once("views/Views_users_update.php");
    }
    public function Delete()
    {
        $id = $_GET['id'];
        $obj = new User_Model();
        $obj->Delete($id);
    }
}
