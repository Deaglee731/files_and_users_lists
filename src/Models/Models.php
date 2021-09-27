<?php

namespace Models;

 class Models {

    protected $path_next;
    protected $path_file;
    protected $path_index; 

    function Decode()
    {
        $directory = scandir($this->path_file);
        $result_out = array_diff($directory, [".", "..", "numberic"]);
        foreach ($result_out as $files) {
            $decodestr = file_get_contents($this->path_file.$files);
            $doc = json_decode($decodestr, TRUE);
            $doc['id'] = $files;
            $result_mass[] = $doc;
        }

        return $result_mass;
    }
    
    function View()
    {
        $this->Decode();
    }



    function Create($data)
    {
        $result = json_encode($data);
        $current = file_get_contents($this->path_next);
        $next = $current + 1;
        file_put_contents($this->path_file . $next, $result);
        file_put_contents("$this->path_next", $next);
    }

    function Update($data, $id)
    {


        header("Location: " . $this->path_index);
        $data = json_encode($data);
        file_put_contents($this->path_file.$id, $data);
    }


    function Delete($id)
    {

        $current_file  = $id;
        $current = file_get_contents($this->path_file.$current_file);

        if (!isset($current)) {
            echo "File deleted";
        } else {
            unlink("$this->path_file"."$current_file");
            header("Location: ". $this->path_index);
        }
    }
}










?>