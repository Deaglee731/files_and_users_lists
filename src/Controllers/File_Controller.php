<?php
namespace Controllers;
use Models\File_Model;
use Validators\File_validation;
use Core\View;

class File_Controller extends Controller
{
    public function View()
    {
        $model = new File_Model();
        $result_mass = $model->Decode();
        $template = "List_Files_views";
        $Errors=[];
        View::render($template,$result_mass,$Errors);
    }
    public function Create()
    {

        $data['Organization'] = $_POST['Organization'];
        $data['Counterparty'] = $_POST['Counterparty'];
        $data['Signatory'] = $_POST['Signatory'];
        $data['Term-in'] = $_POST['Term-in'];
        $data['Term-out'] = $_POST['Term-out'];
        $data['Product'] = $_POST['Product'];
        $data['Amount'] = $_POST['Amount'];
        $data['Requisites'] = $_POST['Requisites'];
        if (count($_POST) > 0) {
            $Errors = File_validation::Validation($data); 
            if (empty($Errors)) {
                $obj = new File_Model();
                $obj->Create($data);
                header('Location: /files/');
                return;
            }
        }
        $template = "Files_create_views";
        View::render($template,$data,$Errors);
    }
    public function Update()
    {
        $id = $_GET['id'];
        $data = file_get_contents("date_files/documents/$id");
        $data =  json_decode($data, TRUE);
        if (count($_POST) > 0) {
            $data['Organization'] = $_POST['Organization'];
            $data['Counterparty'] = $_POST['Counterparty'];
            $data['Signatory'] = $_POST['Signatory'];
            $data['Term-in'] = $_POST['Term-in'];
            $data['Term-out'] = $_POST['Term-out'];
            $data['Product'] = $_POST['Product'];
            $data['Amount'] = $_POST['Amount'];
            $data['Requisites'] = $_POST['Requisites'];
            $Errors = File_validation::Validation($data); 
            if (empty($Errors)) {
                $obj = new File_Model();
                $obj->Update($data,$id);
                header('Location: /files/');
                return;
            }
        }
        $template = "Views_files_update";
        View::render($template,$data,$Errors);
    }
    public function Delete()
    {
        $id = $_GET['id'];
        $obj = new File_Model();
        $obj->Delete($id);
    }
}
