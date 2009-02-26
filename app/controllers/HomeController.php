<?php

class HomeController extends Horde_Controller_Base {

    public function index()
    {
        global $registry, $news_feed_id, $jonah_channel;

        if ($id = $this->params->get('id')) {
            $this->content = RubinskyWeb_News::formatBlogEntry($registry->call('news/story', array($news_feed_id, $id, true)));
        } else {
            $this->content = RubinskyWeb_News::getLatestNews($news_feed_id, $GLOBALS['max_stories']);
        }

       /* Build the tag cloud */
        $cloud = new Horde_UI_TagCloud();
        $tags = $registry->call('news/listTagInfo', array(array(), array($news_feed_id)));
        if (!is_a($tags, 'PEAR_Error')) {
            foreach ($tags as $tag) {
                $cloud->addElement(
                    $tag['tag_name'],
                    $this->urlFor('tag', array('tag' => $tag['tag_name'])),
                    $tag['total'] * 5);
            }
            $this->cloud_html = $cloud->buildHTML();
        } else {
            $this->cloud_html = '';
        }
        /* List of previous entries */
        $this->summary = RubinskyWeb_News::getNewsStories(
            $news_feed_id, $GLOBALS['max_stories'], $GLOBALS['max_stories']);

        $this->summaryTitlesOnly = true;

        // Previously paging. Home page is page 0
        // older articles increase page number
        // This is a hack to avoid calculating the number of articles - which
        // right now would mean downloading all available stories.
        $this->pageCount = ceil($registry->news->storyCount($news_feed_id)/$GLOBALS['max_stories']);
        $this->page = $this->params->get('page', 1);

        /* RSS */
        $this->feedurl = $GLOBALS['feed_base'] . '?channel_id=' . $news_feed_id;

        /* Output */
        $this->render();
    }

    public function tag()
    {
        global $registry, $news_feed_id;

        $this->page_title = sprintf("Stories tagged with %s", $this->params->get('tag'));

        $tag = $this->params->get('tag');
        $recent = RubinskyWeb_News::getNewsStories($news_feed_id, 11, 0);
        $stories = RubinskyWeb_News::getNewsByTag($news_feed_id, $tag);
        if ($stories && count($stories)) {
            $this->content = RubinskyWeb_News::getLatestNews(0, 5, $stories);
        }

        /* List of previous entries */
        $this->summary = RubinskyWeb_News::getNewsStories($news_feed_id, 5, $GLOBALS['max_stories']);
        $this->summaryTitlesOnly = true;

        $cloud = new Horde_UI_TagCloud();
        $tags = $registry->call('news/listTagInfo', array(array(), array($news_feed_id)));
        if (!is_a($tags, 'PEAR_Error')) {
            foreach ($tags as $tag) {
                $cloud->addElement(
                    $tag['tag_name'],
                    $this->urlFor('tag', array('tag' => $tag['tag_name'])),
                    $tag['total'] * 5);
            }
            $this->cloud_html = $cloud->buildHTML();
        } else {
            $this->cloud_html = '';
        }
        $this->renderAction('index');
    }

    /**
     * Enter description here...
     *
     */
    protected function _initializeApplication()
    {
        // Load Helpers
        $this->_view->addHelper('Tag');
        $this->_view->addHelper('Text');

         // This one is used alot...
        $this->homeurl = $this->urlFor('home');

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
