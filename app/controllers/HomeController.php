<?php

class HomeController extends Horde_Controller_Base {

    public function index()
    {
        global $registry, $news_feed_id, $site_name, $jonah_channel;
        $this->_setup();

        /* Basic page info */
        $this->page_title = $site_name;
        $this->site_name = $site_name;

        if ($id = $this->params->get('id')) {
            $this->news_content = RubinskyWeb_News::formatBlogEntry($registry->call('news/story', array($news_feed_id, $id, true)));
        } else {
            $this->news_content = RubinskyWeb_News::getLatestNews($news_feed_id, $GLOBALS['max_stories']);
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
        $previously = RubinskyWeb_News::getNewsStories($news_feed_id, 5, $GLOBALS['max_stories']);
        $this->previously = RubinskyWeb_News::renderSummaryTemplate($previously, false);

        /* RSS */
        $this->feedurl = $GLOBALS['feed_base'] . '?channel_id=' . $news_feed_id;

        /* Output */
        $this->render();
    }

    public function tag()
    {
        global $registry, $news_feed_id;

        $this->_setup();
        $this->page_title = sprintf("Stories tagged with %s", $this->params->get('tag'));

        $tag = $this->params->get('tag');
        $recent = RubinskyWeb_News::getNewsStories($news_feed_id, 11, 0);
        $id = $this->params->get('id');
        $stories = RubinskyWeb_News::getNewsByTag($news_feed_id, $tag);
        if ($stories && count($stories)) {
            $this->news_content = RubinskyWeb_News::getLatestNews(0, 5, $stories);
        }

        /* List of previous entries */
        $previously = RubinskyWeb_News::getNewsStories($news_feed_id, 5, $GLOBALS['max_stories']);
        $this->previously = RubinskyWeb_News::renderSummaryTemplate($previously, false);

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
    private function _setup()
    {
         // This one is used alot...
        $this->homeurl = $this->urlFor('home');

        // Slight hack, but this makes it easier for me to move things from
        // dev to production etc...
        $this->host_base = $GLOBALS['host_base'];

        // ...and for the rest...
        $this->urlWriter = $this->getUrlWriter();
        $this->metatags = ''; // TODO
    }

}
