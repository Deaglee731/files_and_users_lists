<?php

namespace Models;

use Models\Model;



class File_Model extends Model
{
    protected $path_next = "date_files/documents/numberic";
    protected $path_file = "date_files/documents/";
    protected $path_index = "/files/";
    protected $table = "myapp.Files";
    protected $theid = 'file_id';
}
