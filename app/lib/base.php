<?php
session_start();
require_once dirname(__FILE__) . '/../../config/conf.php';
require_once HORDE_BASE . '/lib/base.php';
require_once 'Horde/Autoloader.php';

Horde_Autoloader::addClassPath($fs_base . '/app/lib/');


/* Global registry object for api calls */
$registry = &Registry::singleton();
