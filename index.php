<?php
/**
 * Main dispatch page
 */
require_once dirname(__FILE__) . '/app/lib/base.php';

$request = new Horde_Controller_Request_Http;
$mapper = new Horde_Routes_Mapper;
require dirname(__FILE__) . '/config/routes.php';
$context = array(
    'mapper' => $mapper,
    'controllerDir' => dirname(__FILE__) . '/app/controllers',
    'viewsDir' => dirname(__FILE__) . '/app/views',
);

$dispatcher = Horde_Controller_Dispatcher::singleton($context);
$dispatcher->dispatch($request);
