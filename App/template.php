<?php
/**
 * Template Class
 *
 * @author Chris Pierce
 */
class template {
	
	/**
	 * @var registry
	 */
	private $registry;
	 
	/**
	 * @var config
	 */
	private $config = array();

	/** 
	 * Constructor Method
	 *
	 * @params mixed[mixed] registry
	 * @return void
	 */
	public function __construct($registry = null) {
		$this->registry = $registry;
	}
	
	/**
	 * Set Variables
	 * 
	 * @param string index, mixed value
	 * @return void
	 */
	public function __set($index, $value) {
		$this->config[$index] = $value;
	}
	
	/**
	 * Show Method for Template
	 * 
	 * @params string controller, string action
	 * @return void
	 */
	public function show($controller = null, $action = null) {
		$path = __SITE_PATH . '/View/' . $controller . '/' . $action . '.php';
		
		if (!file_exists($path)) {
			throw new Exception('Template not found for ' . $path);
			return false;
		}
		if (count($this->config) > 0) {
			foreach ($this->config as $key => $value) {
				$$key = $value;
			}
		}
		
		include __SITE_PATH . '/View/Layouts/header.php';
		include $path;
		include __SITE_PATH . '/View/Layouts/footer.php';
	}

}