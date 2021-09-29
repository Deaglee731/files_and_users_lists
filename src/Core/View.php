<?php
namespace Core;
use Core\Singleton;

class View extends Singleton
{
    public static function render($template, $vars = [],$Errors)
    {
        extract($vars);
        $result_mass = $vars;
        $data = $vars;
        $Errors = $Errors;
        require_once "views/".$template.'.php';
    }
}

?>