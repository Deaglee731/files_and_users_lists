<?php
namespace Controllers;
use Models\File_Model;
use Validators\File_validation; // ETO TYT


//require_once("Controller.php");
//require_once("File_Model.php");





class File_Controller extends Controller
{
    public function View()
    {
        $model = new File_Model();
        $result_mass = $model->Decode();
        require_once("views/List_Files_views.php");
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
            $Errors = Validation2($data); // ETO TYT
            if (empty($Errors)) {
                $obj = new File_Model();
                $obj->Create($data);
                header('Location: /files/');
                return;
            }
        }

        require("views/Files_create_views.php");
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
            $Errors = Validation2($data); // ETO TYT
            if (empty($Errors)) {
                $obj = new File_Model();
                $obj->Update($data,$id);
                header('Location: /files/');
                return;
            }
        }

        require_once("views/Views_files_update.php");
    }
    public function Delete()
    {
        $id = $_GET['id'];
        $obj = new File_Model();
        $obj->Delete($id);
    }
}
