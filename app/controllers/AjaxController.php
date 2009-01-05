<?php
/**
 * Controller for handling any Ajax requests
 */
class AjaxController extends Horde_Controller_Base {


    /**
     * Provides ajax paging of the Previously block
     * $this->params->page should have the page number to display
     */
    function page()
    {
        // Setup
        $perpage = $GLOBALS['max_stories'];
        $this->page = $this->params->get('page', 0);
        $this->pageCount = ceil($GLOBALS['registry']->news->storyCount($GLOBALS['news_feed_id'])/$GLOBALS['max_stories']);
        $this->summary = RubinskyWeb_News::getNewsStories(
            $GLOBALS['news_feed_id'], $perpage, ($this->page + 1) * $perpage);
        $this->summaryTitlesOnly = true;
        $this->render();
    }
}
?>