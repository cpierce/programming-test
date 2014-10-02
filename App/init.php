<?php
/**
 * init Autoloader
 *
 * @author Chris Pierce
 */
$application_path = __SITE_PATH . '/App/'; 

require_once $application_path . 'controller.php';
require_once $application_path . 'registry.php';
require_once $application_path . 'router.php';
require_once $application_path . 'template.php';

function __autoload($class_name = null) {
	if (!empty($class_name)) {
		if (!file_exists(__SITE_PATH.'/Model/'.$class_name.'.php')) {
			return false;
		}
		require_once __SITE_PATH.'/Model/'.$class_name.'.php';
	}
}

// init registry object
$registry = new registry;
$registry->Database = Database::getInstance();
