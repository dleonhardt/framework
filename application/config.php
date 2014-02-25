<?php

// Path to the root of the framework
define('BASE_PATH', realpath(dirname(__FILE__).'/../'));
	
set_include_path(BASE_PATH);

// Application Environment
define('ENVIRONMENT', 'development');

if(defined('ENVIRONMENT')):
	switch(ENVIRONMENT):
		case 'development':
			error_reporting(E_ALL);
			ini_set('display_errors', '1');
			break;
		case 'testing':
		case 'production':
			error_reporting(0);
			ini_set('display_errors', '0');
			break;
		default:
			exit('The application environment is not set correctly.');
	endswitch;
endif;