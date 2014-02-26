<?php

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