    <?php
/**
 * Main controller class
 *
 * Handles requests to the main home page.
 *
 * @copyright 2010 Michael J Rubinsky <mrubinsk@horde.org>
 * @license  http://opensource.org/licenses/bsd-license.php BSD
 * @author Michael J Rubinsky <mrubinsk@horde.org>
 */
class TUR_Home_Controller extends RubinskyWeb_Controller_Base
{
    public function processRequest(Horde_Controller_Request $request, Horde_Controller_Response $response)
    {
        $this->_mapper = $GLOBALS['injector']->getInstance('Horde_Routes_Mapper');
        $this->_matchDict = new Horde_Support_Array($this->_mapper->match($request->getPath()));
        $this->_setup();
        switch ($this->_matchDict->action) {
        case 'index':
            $this->_index($response);
            break;
	    case 'tag':
            $this->_tag($response);
        }
    }

    /**
     *
     */
    protected function _setup()
    {
        parent::_setup();
        $view = $this->getView();
        $view->addTemplatePath(array($GLOBALS['fs_base'] . '/app/views/Home', $GLOBALS['fs_base'] . '/app/views/shared'));
    }

    /**
     * Main index controller action.
     *
     * Injector is used to obtain:
     *    'Horde_Registry'
     *    'site_config'
     */
    protected function _index(Horde_Controller_Response $response)
    {
        $view = $this->getView();
        $view->page_title = 'theUpstairsRoom';
        if ($id = $this->_matchDict->id) {
            $view->content = RubinskyWeb_News::formatBlogEntry($GLOBALS['injector']->getInstance('Horde_Registry')->news->story($GLOBALS['news_feed'], $id, true));
        } else {
            $view->content = RubinskyWeb_News::getLatestNews($GLOBALS['news_feed'], $GLOBALS['max_stories']);
        }

        /* Build tag cloud */
        $this->_buildCloud($view);

        /* List of previous entries */
        $this->_getPreviousEntries($view);
        $this->_getPreviousPaging($view);

        $view->feedurl = $GLOBALS['feed_base'];
        $layout = $this->getInjector()->getInstance('Horde_Core_Ui_Layout');
        $layout->setView($view);
        $layout->setLayoutName('main');
        $response->setBody($layout->render('index'));
    }

    /**
     * Tag search action
     *
     * Injector used to obtain:
     *  Horde_Registry
     *  site_config
     *
     */
    protected function _tag(Horde_Controller_Response $response)
    {
        $view = $this->getView();
        $tag = $this->_matchDict->tag;
        $view->page_title = sprintf("Stories tagged with %s", $tag);
        $stories = RubinskyWeb_News::getNewsByTag($GLOBALS['news_feed'], $tag);
        if ($stories && count($stories)) {
            $view->content = RubinskyWeb_News::getLatestNews(0, 5, $stories);
        }

        /* List of previous entries */
        $this->_getPreviousEntries($view);
        $this->_getPreviousPaging($view);
        $this->_buildCloud($view);
        /* RSS */
        $view->feedurl = $GLOBALS['feed_base'] . '?channel_id=' . $GLOBALS['news_feed'];
        $layout = $this->getInjector()->getInstance('Horde_Core_Ui_Layout');
        $layout->setView($view);
        $layout->setLayoutName('main');
        $response->setBody($layout->render('index'));
    }

    protected function _getPreviousPaging(&$view)
    {
        // Previously paging. Home page is page 0
        // older articles increase page number
        // This is a hack to avoid calculating the number of articles - which
        // right now would mean downloading all available stories.
        $view->pageCount = ceil($GLOBALS['injector']->getInstance('Horde_Registry')->news->storyCount($GLOBALS['news_feed'])/$GLOBALS['max_stories']);
        $view->page = $this->_matchDict->get('page', 1);
    }

    protected function _getPreviousEntries(&$view)
    {
        $view->summary = RubinskyWeb_News::getNewsStories(
            $GLOBALS['news_feed'],
            $GLOBALS['max_stories'],
            $GLOBALS['max_stories']);

        $view->summaryTitlesOnly = true;
    }

    protected function _buildCloud(&$view)
    {
       /* Build the tag cloud */
        $cloud = new Horde_Core_Ui_TagCloud();
        $tags = $GLOBALS['injector']->getInstance('Horde_Registry')->news->listTagInfo(array(), array($GLOBALS['news_feed']));
        foreach ($tags as $tag) {
            $cloud->addElement(
                $tag['tag_name'],
                $this->urlWriter->urlFor('tag', array('tag' => $tag['tag_name'])),
                $tag['total'] * 5);
        }
        $view->contentForCloud = $cloud->buildHTML();
    }

    /**
     * init the controller
     *
     */
    protected function _initializeApplication()
    {
        // Load Helpers
        $this->_view->addHelper('Tag');
        $this->_view->addHelper('Text');
        $this->_view->addHelper('Capture');
        $this->setLayout('main');

         // This one is used alot...
        $this->homeurl = $this->urlWriter->urlFor('home');

        // Slight hack, but this makes it easier for me to move things from
        // dev to production etc...
        $this->host_base = $GLOBALS['host_base'];

        // ...and for the rest...
        $this->urlWriter = $this->getUrlWriter();
        $this->metatags = ''; // TODO

        /* Basic page info */
        $this->page_title = $this->site_name = $GLOBALS['site_name'];
    }

}
