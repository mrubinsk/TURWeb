<?php
/**
 * Main dispatch page
 */
require_once dirname(__FILE__) . '/app/lib/base.php';

$request = $GLOBALS['injector']->getInstance('Horde_Controller_Request');
$runner = $injector->getInstance('Horde_Controller_Runner');

$_root = ltrim(dirname($_SERVER['PHP_SELF']), '/');
$mapper = $GLOBALS['injector']->getInstance('Horde_Routes_Mapper');
$mapper->connect('home', $_root . '/', array('controller' => 'home'));
$mapper->connect('about', $_root . '/about', array('controller' => 'content', 'content' => 'about'));
$mapper->connect('software', $_root . '/software', array('controller' => 'content', 'content' => 'software'));
$mapper->connect('news', $_root . '/:id', array('controller' => 'home'));
$mapper->connect('tag', $_root . '/tag/:tag', array('controller' => 'home', 'action' => 'tag'));
$mapper->connect('pager', $_root . '/gotopage/:page', array('controller' => 'ajax', 'action' => 'page'));

$path = $request->getPath();
if (($pos = strpos($path, '?')) !== false) {
    $path = substr($path, 0, $pos);
}
if (!$path) $path = '/';

$match = $mapper->match($path);
$config = new Horde_Core_Controller_RequestConfiguration();
$config->setControllerName('TUR_' . ucfirst($match['controller']) . '_Controller');
$response = $runner->execute($injector, $request, $config);
$responseWriter = $injector->getInstance('Horde_Controller_ResponseWriter');
$responseWriter->writeResponse($response);
