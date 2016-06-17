<?php
/**
 * find the base dir
 */
$baseDir = str_replace("/include", "", dirname(__FILE__));

/**
 * include the functions, autoload function
 */
require_once($baseDir . "/include/autoload.php");

/**
 * include the composer dependencies
 */
if (file_exists($baseDir . "/vendor/autoload.php")) {
    require_once($baseDir . "/vendor/autoload.php");
}

/**
 * Create site
 */
$SITE = new Site('/Users/Tobias/git/Webframework');
?>