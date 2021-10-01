<?php

namespace Controllers;

use Core\View;
use Models\User_Model;
use Validators\User_validation;
use Core\DBAdapter;
use Form\UserForm;

class User_Controller extends Controller
{


    public function View()
    {

        $model = new User_Model();
        $result_mass = $model->List();
        $template = "List_users_views";
        View::render($template, $result_mass, null);
    }
    public function Create()
    {
        $form = new UserForm();
        //$form->load($id);
        if ($form->isValid()) {
            $form->save();
        }
        $form->render();
        /* $data['login'] = $_POST['login'];
        $data['firstname'] = $_POST['firstname'];
        $data['lastname'] = $_POST['lastname'];
        $data['birthday'] = $_POST['birthday'];
        $obj = new User_Model();
        $obj->Create($data);*/
        /*if (count($_POST) > 0) {
            $Errors = User_validation::Validation2($data);
            if (empty($Errors)) {
                $obj = new User_Model();
                $obj->Create($data);
                header('Location: /users/');
                return;
            }
        }*/
        //$template = "Users_create_views";
        // View::render($template, $data, null);
    }
    public function Update()
    {
        $id = $_GET['id'];

        $form = new UserForm();
        $form->load($id);
        if ($form->isValid()) {
            $form->save($id);
        }
        $form->render();
        /*if (count($_POST) > 0) {
            $data['login'] = $_POST['login'];
            $data['firstname'] = $_POST['firstname'];
            $data['lastname'] = $_POST['lastname'];
            $data['birthday'] = $_POST['birthday'];
           
            $Errors = User_validation::Validation2($data);
            if (empty($Errors)) {
                $obj = new User_Model();
                $obj->Update($id, $data);
                header('Location: /users/');
                return;
            
        }
        $template = "Views_users_update";
        View::render($template, $data, null);}*/
    }
    public function Delete()
    {
        $id = $_GET['id'];
        $obj = new User_Model();
        $obj->Delete($id);
        header("Location: /users/");
    }
}
