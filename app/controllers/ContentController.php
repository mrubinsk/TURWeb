<?php
/**
 * Controller for a general purpose content page
 *
 * $params['content'] should be the content template
 *
 */
class ContentController extends Horde_Controller_Base {
    protected $vimeo;

    function index()
    {
        global $registry, $news_feed_id;
        $this->_setup();

        $this->page_title = $this->site_name = $GLOBALS['site_name'];

        ob_start();
        include dirname(__FILE__) . '/../../templates/content/' . basename($this->params->content) . '.php';
        $this->content = ob_get_clean();

        /* I guess for this site, all pages should have the same right hand bar */
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



        /* Takes care of all header and footers as well */
        echo $this->render();
    }

    private function _setup()
    {
         // This one is used alot...
        $this->homeurl = $this->urlFor('home');

        // Slight hack, but this makes it easier for me to move things from
        // dev to production etc...
        $this->host_base = $GLOBALS['host_base'];

        // ...and for the rest...
        $this->urlWriter = $this->getUrlWriter();
    }

}
