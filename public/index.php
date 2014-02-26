<?php

require_once __DIR__.'/../application/start.php';

use Application\Classes\Example;

$example = new Example;

print_r($example->testDatabase());