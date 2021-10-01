<?php

namespace Form;

use Models\User_Model;


class UserForm extends Builder {


    protected function  init(){

        $this->add("text","login","LOGIN",null,function($value)
        {

            if (empty($value)){
                return false;
            }
            return true;
        });

        $this->add("text","firstname","FIRSTNAME",null,function($value)
        {
            if (empty($value)){
                return false;
            }
            return true;
        });


        $this->add("text","lastname","LASTNAME",null,function($value)
        {
            if (empty($value)){
                return false;
            }
            return true;
        });



        $this->add("date","birthday","BIRTHDAY",null,function($value)
        {
            if (empty($value)){
                return false;
            }
            return true;
        });


        $this->setModel(User_Model::class);
    }
}