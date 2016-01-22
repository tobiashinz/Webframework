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
 * Create site
 */
$SITE = new Site('/Users/Tobias/git/Webframework');
?>