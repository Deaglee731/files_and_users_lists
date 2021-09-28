<?php
namespace Core;
use Core\Singleton;

class View extends Singleton
{
    public static function render($template, $vars = [])
    {
        extract($vars);
        $result_mass = $vars;
        $data = $vars;
        require_once "views/".$template.'.php';
    }
}

?>