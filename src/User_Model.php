<?php
class UserModel
{


    function Views()
    {
        //require("views/List_users_view.php");
    }

    function Create()
    {
        $i = 0;
        if ($_POST['Organization'] == '') {
            $Errors['Organization'] = "<h5> Поле Организация обязательно для заполнения </h5>";
            $i += 1;
        }

        if ($_POST['Сounterparty'] == '') {
            $Errors['Сounterparty'] = "<h5> Поле Контрагент обязательно для заполнения </h5>";
            $i += 1;
        }


        if ($_POST['Signatory'] == '') {
            $Errors['Signatory'] = "<h5> Поле Подписант обязательно для заполнения </h5>";
            $i += 1;
        }

        if ($_POST['Term-in'] == '') {
            $Errors['Term-in'] = "<h5>Поле Срок договора обязательно для заполнения </h5>";
            $i += 1;
        }
        if ($_POST['Term-in'] == '') {
            $Errors['Term-in'] = "<h5>Поле Срок договора обязательно для заполнения </h5>";
            $i += 1;
        }

        if ($_POST['Product'] == '') {
            $Errors['Product'] = "<h5>Поле Предмет договора обязательно для заполнения </h5>";
            $i += 1;
        }
        if ($_POST['Amount'] == '') {
            $Errors['Amount'] = "<h5>Поле Сумма договора обязательно для заполнения </h5>";
            $i += 1;
        }
        if ($_POST['Requisites'] == '') {
            $Errors['Requisites'] = "<h5>Поле Реквизиты обязательно для заполнения </h5>";
            $i += 1;
        }
       
        echo "CREATE_USER_MODEL";
        echo "<br>";
        
    }




    function Update()
    {
        echo "UPDATE_USER_MODEL";
        echo "<br>";
    }



    function Delete()
    {
        echo "DELETE_USER_MODEL";
        echo "<br>";

    
    }
}
