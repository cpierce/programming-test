<?php
/**
 * index.php
 *
 * @author Chris Pierce
 */
 
// enable error reporting
error_reporting(E_ALL);

// set the path
$site_path = realpath(dirname(__FILE__));
define ('__SITE_PATH', $site_path);
// load init.php
require_once 'App/init.php';

// Load Router, Controller Path, and Template 
$registry->router = new router($registry);
$registry->router->setPath(__SITE_PATH . '/Controller');
$registry->template = new template($registry);

// Load the Controller
$registry->router->loader();
