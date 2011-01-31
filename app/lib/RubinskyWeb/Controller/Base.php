<?php
/**
 * Home Controller. Handles display of all content on home page.
 *
 * @author mrubinsk
 */
abstract class RubinskyWeb_Controller_Base extends Horde_Controller_Base
{
    /**
     *
     * @var array  The match dictionary returned from the mapper.
     */
    protected $_matchDict;

    /**
     *
     * @var Horde_Controller_Mapper
     */
    protected $_mapper;

    /**
     *
     * @var Horde_Controller_UrlWriter
     */
    public $urlWriter;

    /**
     * Setup needed properties
     *
     */
    protected function _setup()
    {
        global $site_name;

        // Set the view, with correct template path set by the binder
        $view = $GLOBALS['injector']->getInstance('RubinskyWeb_View');

        $this->urlWriter = $view->urlWriter = $this->getUrlWriter();
        $view->homeurl = $this->urlWriter->urlFor('home');
        $view->metatags = ''; // TODO
        $view->feed = '';
        $view->host_base = $GLOBALS['host_base'];
        $this->setView($view);
    }

}

