<?php
	Router::connect('/', array('controller' => 'colors', 'action' => 'index'));
	Router::connect('/admin', array('admin' => true, 'controller' => 'colors', 'action' => 'index'));
	CakePlugin::routes();
	require CAKE . 'Config' . DS . 'routes.php';
