<?php

$loader = require dirname(__DIR__) . '/vendor/autoload.php';
/** @var $loader \Composer\Autoload\ClassLoader */
$loader->addPsr4('NagoyaPHP\Doukaku140509\\', dirname(__DIR__) . '/src');
