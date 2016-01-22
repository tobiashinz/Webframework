<?php
spl_autoload_register('webFrameworkAutoloader');

function webFrameworkAutoloader($class){

    $baseDir = str_replace("/include", "", dirname(__FILE__));

    if (file_exists($baseDir. "/include/misc/" . $class . ".class.php")){
        require_once $baseDir. "/include/misc/" . $class . ".class.php";
    }
}
?>