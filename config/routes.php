<?php
$_root = ltrim(dirname($_SERVER['PHP_SELF']), '/');

/* 'Home' route */
$mapper->connect('home', $_root . '/', array('controller' => 'home'));

/* General content Pages */
//$mapper->connect('content', $_root . '/content/:content', array('controller' => 'content'));
$mapper->connect('about', $_root . '/about', array('controller' => 'content', 'content' => 'about'));
$mapper->connect('software', $_root . '/software', array('controller' => 'content', 'content' => 'software'));
$mapper->connect('news', $_root . '/:id', array('controller' => 'home'));
$mapper->connect('tag', $_root . '/tag/:tag', array('controller' => 'home', 'action' => 'tag'));

// These are not actually run through the controller since it's more efficient
// to just let the browser handle the downloads, but the route is here to make
// building the URLs easier.
$mapper->connect('downloads', $_root . '/downloads/:file', array('controller' => 'downloads'));


