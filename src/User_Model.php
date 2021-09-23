<?php
class UserModel
{


    function Views()
    {
        require("views/List_users_view.php");
    }

    function Create()
    {
        
        echo "CREATE_USER_MODEL";
        
    }

    function Update()
    {
        echo "UPDATE_USER_MODEL";
    }



    function Delete()
    {
        echo "DELETE_USER_MODEL";

    
    }
}
