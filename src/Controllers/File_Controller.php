<?php
namespace Controllers;
use Models\File_Model;
use Validators\File_validation;
use Core\View;
use Core\DBAdapter;
class File_Controller extends Controller
{
    public function View()
    {
        $model = new File_Model();
        $result_mass = $model->List();
        //require_once("views/List_Files_views.php");
        $template = "List_Files_views";
        View::render($template,$result_mass,null);
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
        //require("views/Files_create_views.php");
    }
    public function Update()
    {
        $id = $_GET['id'];
        $query =  "SELECT * FROM Files WHERE file_id = $id";
        $db = DBAdapter::getInstance();
        $result = $db->execSQL($query); 
        while ($row = mysqli_fetch_assoc($result)) {
            $data = $row;
        }
      
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
                $obj->Update($id,$data);
                header('Location: /files/');
                return;
            }
        }
        $template = "Views_files_update";
        View::render($template,$data,$Errors);
        //require_once("views/Views_files_update.php");
    }
    public function Delete()
    {
        $id = $_GET['id'];
        $obj = new File_Model();
        $obj->Delete($id);
    }
    
}
