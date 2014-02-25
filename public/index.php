<?php

// Config
require_once __DIR__.'/../application/config.php';

// Autoloader
require_once __DIR__.'/../application/autoload.php';

use Application\Classes\Test;

$app = new Test;

/*try {
	Router::route(new Request);
} catch(Exception $e) {
	$controller = new errorController;
	$controller->error($e->getMessage());
}*/