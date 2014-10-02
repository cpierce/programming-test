<?php
/**
 * Registry Class
 *
 * @author Chris Pierce
 */
class registry {

	/**
	 * @var mixed[mixed]
	 */
	private $registry_config = array();
	
	/**
	 * Set Variables
	 * 
	 * @param string index, mixed value
	 * @return void
	 */
	public function __set($index, $value) {
		$this->registry_config[$index] = $value;
	}
	
	/**
	 * Get Variables
	 *
	 * @param mixed index
	 * @return mixed
	 */
	public function __get($index) {
		return $this->registry_config[$index];
	}
}