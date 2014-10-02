<?php
/**
 * Router Class
 *
 * @author Chris Pierce
 */
class router {
	
	/**
	 * @var registry
	 */
	private $registry;
	 
	/**
	 * @var path
	 */
	private $path;

	/**
	 * @var mixed[mixed] args
	 */
	private $args = array();
	
	/**
	 * @var string file
	 */
	public $file;
	
	/**
	 * @var string controller
	 */
	public $controller;
	
	/**
	 * @var string action
	 */
	public $action;
	
	/**
	 * @var mixed[mixed] param
	 */
	public $param;
	
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
	 * Set Path Method
	 * 
	 * @params string path
	 * @return void
	 */
	public function setPath($path = null) {
		if (!empty($path)) {
			if (!is_dir($path)) {
				throw new Exception('Invalid controller path: \'' . $path . '\'');
			}
			$this->path = $path;
		}
	}
	
	/**
	 * Loader Method for Controller
	 * 
	 * @params void
	 * @return void
	 */
	public function loader() {
		// check the route
		$this->getController();

		// does the file exist
		if (!file_exists($this->file)) {
			$this->error_404();
		}

		// include the controller
		include $this->file;

		// call a new controlelr class
		$class = $this->controller . 'Controller';
		$controller = new $class($this->registry);

		if (is_callable(array($controller, $this->action))) {
			$action = $this->action;
		} else {
			$this->error_404();
		}

		// call the action
		if (!empty($this->param)) {
			$controller->$action($this->param);
		} else {
			$controller->$action();
		}
	}

	/**
	 * Get Controller Method
	 * 
	 * @params void
	 * @return void
	 */
	private function getController() {
		// get the route from the url
		$route = (empty($_GET['route'])) ? '' : $_GET['route'];
		if (empty($route)) {
			$route = 'Colors';
		} else {
			// return route parts to array
			$route_parts = explode('/', $route);
			$this->controller = ucwords($route_parts[1]);
			if(isset($route_parts[2])) {
				$this->action = $route_parts[2];
			}
			if(isset($route_parts[3])) {
				$this->param = $route_parts[3];
			}
		}
		if (empty($this->controller)) {
			$this->controller = 'Colors';
		}

		if (empty($this->action)) {
			$this->action = 'index';
		}

		// set file path
		$this->file = $this->path .'/'. $this->controller . 'Controller.php';
	}	

	/**
	 * Error 404 Method
	 *
	 * @params void
	 * @return void
	 */
	public function error_404() {	
		header('HTTP/1.0 404 Not Found');
		include __SITE_PATH . '/View/Layouts/header.php';		
		echo '<div class="col-md-12 text-center">';
		echo '<h1>Oops, something went wrong</h1>';
		echo '<p>The page that you requested could not be loaded.</p>';
		echo '</div>';
		include __SITE_PATH . '/View/Layouts/footer.php';
		exit(); 
	}
}