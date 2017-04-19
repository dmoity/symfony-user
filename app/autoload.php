<?php

use Doctrine\Common\Annotations\AnnotationRegistry;
use Composer\Autoload\ClassLoader;

/** @var ClassLoader $loader */
$loader = require __DIR__.'/../vendor/autoload.php';

AnnotationRegistry::registerLoader([$loader, 'loadClass']);

ini_set('xdebug.var_display_max_depth', 10);
ini_set('xdebug.var_display_max_children', 2560);
ini_set('xdebug.var_display_max_data', 10240);

return $loader;
