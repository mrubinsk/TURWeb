<?php
/**
 * Controller for handling any Ajax requests
 */
class AjaxController extends Horde_Controller_Base
{
    /**
     * Provides ajax paging of the Previously block
     *
     * $this->params->page should have the page number to display
     */
    function page()
    {
        // Setup
        $perpage = $GLOBALS['injector']->getInstance('site_config')->max_stories;
        $this->page = $this->params->get('page', 0);
        $this->pageCount = floor($GLOBALS['registry']->news->storyCount($GLOBALS['injector']->getInstance('site_config')->news_feed)/$GLOBALS['injector']->getInstance('site_config')->max_stories);
        $this->summary = RubinskyWeb_News::getNewsStories(
            $GLOBALS['injector']->getInstance('site_config')->news_feed,
            $perpage,
            ($this->page) * $perpage);
        $this->summaryTitlesOnly = true;
        $this->render();
    }

    protected function _initializeApplication()
    {
        $this->_view->addHelper('Tag');
        $this->_view->addHelper('Text');
    }
}
