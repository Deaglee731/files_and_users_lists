<?php

namespace Models;
use Core\DBAdapter;


class Model
{

    protected $path_next;
    protected $path_file;
    protected $path_index;
    protected $table;
    protected $column;


    function List()
    {
        $query = "SELECT * FROM $this->table";
        $db = DBAdapter::getInstance();
        $result = $db->execSQL($query);
        while ($row = mysqli_fetch_assoc($result)) {
            $users[] = $row;
        }

        return $users;
    }

    function Create($data)

    {
        $columns_part = '';
        $values_part = '';

        foreach ($data as $column => $value) {
            if (!empty($columns_part)) {
                $columns_part .= ", ";
            }

            $columns_part .= "`{$column}`";

            if (!empty($values_part)) {
                $values_part .= ", ";
            }
            $values_part .= "'{$value}'";
        }

        $columns_part = "(" . $columns_part  . ")";
        $values_part = "(" . $values_part  . ")";

        $query = "INSERT INTO $this->table $columns_part VALUES $values_part";
        $db = DBAdapter::getInstance();
        $result = $db->execSQL($query);
    }

    function Update($id, $data)
    {
        $query23 = "";
        unset($data['file_id']);
        foreach ($data as $key => $val) {
            $query23 .= "`$key`='$val',";
        }
        $query23[strlen($query23) - 1] = ' ';
        $query2 = "UPDATE $this->table SET {$query23} WHERE $this->theid={$id}";
        $db = DBAdapter::getInstance();
        $result = $db->execSQL($query2);
        header("Location: " . $this->path_index);
    }


    function Delete($id)
    {
        $query = "DELETE FROM $this->table WHERE $this->theid = $id";
        $db = DBAdapter::getInstance();
        $result = $db->execSQL($query);
        header("Location: " . $this->path_index);
    }
}
