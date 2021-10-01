<?php

namespace Form;

use Form\item\Text;
use Form\item\Date;


class Builder
{
    protected $model;

    public function __construct()
    {
        $this->init();
    }


    protected function init()
    {
        // INITIALIZATION
    }

    protected $elements = [];

    public function add($type, $name, $label, $default = null, $validationFunction)
    {

        if ($type == 'text') {
            $this->elements[] = new Text($name, $label, $default, $validationFunction);
        } elseif ($type == 'date') {
            $this->elements[] = new Date($name, $label, $default, $validationFunction);
        }
    }

    public function setModel($modelClass)
    {
        $this->model = new $modelClass();
    }

    public function load($id)
    {
        if ($id) {
            $data = $this->model->getById($id);   
            foreach ($this->elements as $element) {
                $elementName = $element->getName();
                if (isset($data[$elementName])) {
                    $element->setValue($data[$elementName]);
                }
            }
        }
        //die('123');
    }


    public function save($id = null)
    {
        if ($id==null){
            foreach ($this->elements as $item){
                $name = $item->getName();
                $value = $item->getValue();
                $data[$name] = $value;
            }
                $this->model->Create($data);
        }
       else 
       {
        foreach ($this->elements as $item){
            $name = $item->getName();
            $value = $item->getValue();
            $data[$name] = $value;
        }
        $this->model->Update($id,$data);
       }
    }


    public function isSubmitted()
    {
        return !!count($_POST);
    }

    public function isValid() {
        $valid = true;
        foreach ($this->elements as $element) {
            if (!$element->isValid())
            {
                $valid = false;
            }
        }
        return $valid;
    }


    public function render()
    {
        ob_start();

        foreach ($this->elements as $element) {
            $element->render();
        }

        $elements = ob_get_clean();

        require("views/form/form.php");
    }
}
