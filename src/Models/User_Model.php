<?php

namespace Models;

use Models\Model;



class User_Model extends Model
{
    protected $path_next = "date_users/users/numberic";
    protected $path_file = "date_users/users/";
    protected $path_index = "/users/";
    protected $table = "myapp.Users";
    protected $theid = 'user_id';
}
