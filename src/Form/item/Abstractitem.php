<?php namespace Form\item;

use Core\Router;

class Abstractitem {

    protected $name;
    protected $value;
    protected $validationFunction;
    protected $template = '';
    protected $errors;
    public function __construct($name, $default = null, $label = null, $validationFunction = null)
    {
        $this->name = $name;
        $this->validationFunction = $validationFunction;
    }

    public function isValid() {
        
        if (isset($_POST[$this->name])) {
            if ($_POST[$this->name] == ''){
                $this->errors[$this->name] = "Field $this->name is null";
            }
            else{
            $this->value = $_POST[$this->name];
            }
        }
        
        $f = $this->validationFunction;
        if ($f) {
            return $f($this->getValue());
        }
        return true;

    }

    public function getValue() {
        return $this->value;

    }




    public function setValue($value) {
        $this->value = $value;
    }

    public function getName() {
        return $this->name;
    }

    public function render() {

        require("views/form/" . $this->template . ".php");
    }
}