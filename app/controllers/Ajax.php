<?php
/**
 * Ajax controller
 *
 * Handles AJAX requests.
 *
 * @copyright 2010 Michael J Rubinsky <mrubinsk@horde.org>
 * @license  http://opensource.org/licenses/bsd-license.php BSD
 * @author Michael J Rubinsky <mrubinsk@horde.org>
 */
class TUR_Ajax_Controller extends RubinskyWeb_Controller_Base
{
    /**
     *
     */
    protected function _setup()
    {
        parent::_setup();
        $view = $this->getView();
        $view->addTemplatePath(array($GLOBALS['fs_base'] . '/app/views/Ajax', $GLOBALS['fs_base'] . '/app/views/shared'));
    }

    public function processRequest(Horde_Controller_Request $request, Horde_Controller_Response $response)
    {
        $this->_mapper = $GLOBALS['injector']->getInstance('Horde_Routes_Mapper');
        $this->_matchDict = new Horde_Support_Array($this->_mapper->match($request->getPath()));
        switch ($this->_matchDict->action) {
        case 'page':
            $this->_page($response);
        }
    }

    /**
     * Provides ajax paging of the Previously block
     *
     *
     */
    protected function _page(Horde_Controller_Response $response)
    {
        $this->_setup();

        // Setup
        $perpage = $GLOBALS['max_stories'];

        $view = $this->getView();

        $view->page = $this->_matchDict->get('page', 0);
        $view->pageCount = floor($GLOBALS['injector']->getInstance('Horde_Registry')->news->storyCount($GLOBALS['news_feed'])/$GLOBALS['max_stories']);
        $view->summary = RubinskyWeb_News::getNewsStories(
            $GLOBALS['news_feed'],
            $perpage,
            ($view->page) * $perpage);
        $view->summaryTitlesOnly = true;
        $response->setBody($view->render('page'));
    }

    protected function _initializeApplication()
    {
        $this->_view->addHelper('Tag');
        $this->_view->addHelper('Text');
    }
}
