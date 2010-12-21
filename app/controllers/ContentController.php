<?php
/**
 * Controller for general purpose pages - so we don't have to have a separate
 * controller for each simple page, like 'about' pages etc...
 *
 * $params['content'] should be the name of the content template to use that is
 * located in app/views/Content/content/*.php
 *
 */
class ContentController extends Horde_Controller_Base
{
    public function index()
    {
        $this->page_title = $this->site_name = $GLOBALS['injector']->getInstance('site_config')->site_name;

        Horde::startBuffer();
        include(dirname(__FILE__) . '/../views/Content/content/' . basename($this->params->content) . '.php');
        $this->content = Horde::endBuffer();

        /* I guess for this site, all pages should have the same right hand bar */
        /* Build the tag cloud */
        $cloud = new Horde_UI_TagCloud();
        try {
            $tags = $GLOBALS['injector']->getInstance('Horde_Registry')->news->listTagInfo(array(), array($GLOBALS['injector']->getInstance('site_config')->news_feed));
            foreach ($tags as $tag) {
                $cloud->addElement(
                    $tag['tag_name'],
                    $this->urlFor('tag', array('tag' => $tag['tag_name'])),
                    $tag['total'] * 5);
            }
            $this->cloud_html = $cloud->buildHTML();
        } catch (Exception $e) {
            $this->cloud_html = '';
        }

        /* List of previous entries */
        $this->summary = RubinskyWeb_News::getNewsStories(
                $GLOBALS['injector']->getInstance('site_config')->news_feed,
                5,
                $GLOBALS['injector']->getInstance('site_config')->max_stories);
        
        $this->summaryTitlesOnly = true;

        // Previously paging. Home page is page 0
        // older articles increase page number
        // This is a hack to avoid calculating the number of articles - which
        // right now would mean downloading all available stories.
        $this->pageCount = ceil($GLOBALS['injector']->getInstance('Horde_Registry')->news->storyCount($GLOBALS['injector']->getInstance('site_config')->news_feed)/$GLOBALS['injector']->getInstance('site_config')->max_stories);
        $this->page = $this->params->get('page', 1);

        /* RSS */
        $this->feedurl = $GLOBALS['injector']->getInstance('site_config')->feed_base . '?channel_id=' . $GLOBALS['injector']->getInstance('site_config')->news_feed;

        /* Takes care of all header and footers as well */
        echo $this->render();
    }

    protected function _initializeApplication()
    {
        $this->_view->addHelper('Tag');
        $this->_view->addHelper('Text');
        $this->_view->addHelper('Capture');
        $this->setLayout('main');

         // This one is used alot...
        $this->homeurl = $this->urlFor('home');

        // Slight hack, but this makes it easier for me to move things from
        // dev to production etc...
        $this->host_base = $GLOBALS['injector']->getInstance('site_config')->host_base;

        // ...and for the rest...
        $this->urlWriter = $this->getUrlWriter();
    }

}
