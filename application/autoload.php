<?php

// Set the include path to the root directory
set_include_path(realpath(dirname(__FILE__).'/../'));

// Nullify any existing autoloads
spl_autoload_register(null, false);

// Specify extensions that may be loaded
spl_autoload_extensions('.php, .class.php');

// Class loader function
function autoload($className) {
	$className = ltrim($className, '\\');
	$fileName  = '';
	$namespace = '';
	if($lastNsPos = strrpos($className, '\\')) {
		$namespace = substr($className, 0, $lastNsPos);
		$className = substr($className, $lastNsPos + 1);
		$fileName  = strtolower(str_replace('\\', DIRECTORY_SEPARATOR, $namespace) . DIRECTORY_SEPARATOR);
	}
	$fileName .= str_replace('_', DIRECTORY_SEPARATOR, $className) . '.php'; 
	
	require $fileName;
}

// Register the loader function
spl_autoload_register('autoload');