<?php
spl_autoload_register('webFrameworkAutoloader');

function webFrameworkAutoloader($className){

    $baseDir = str_replace("/include", "", dirname(__FILE__));

    $className = ltrim($className, '\\');
    $fileName  = '';
    $namespace = '';
    if ($lastNsPos = strrpos($className, '\\')) {
        $namespace = substr($className, 0, $lastNsPos);
        $className = substr($className, $lastNsPos + 1);
        $fileName  = str_replace('\\', DIRECTORY_SEPARATOR, $namespace) . DIRECTORY_SEPARATOR;

        $fileName = $fileName . $className . ".class.php";
    } else {
        $fileName = $className . ".class.php";
    }
    // $className = str_replace('_', DIRECTORY_SEPARATOR, $className);
    $fileName = $baseDir. "/include/misc/" . $fileName;

    require_once $fileName;
}
?>