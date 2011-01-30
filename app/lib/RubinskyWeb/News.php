<?php
/**
 * Helper class for working with Horde-based news content via the api.
 */
class RubinskyWeb_News
{
    /**
     * Returns a block of html containing only story/news html for the
     * most recently posted article..no parent <div> tags
     * Currently, this is only used to grab the news content for the front page,
     * recent site news block.
     */
    public static function getLatestNews($feed, $count = 5, $stories = array())
    {
        if (count($stories) === 0) {
            $stories = self::getNewsStories($feed, $count, 0);
        }
//var_dump($stories);
        $html = '';
        if (is_array($stories)) {
            foreach ($stories as $story) {
                $html .= self::formatBlogEntry($story);
            }
            return $html;
        }
    }

    public static function formatBlogEntry($story)
    {
	$html = '<div class="article">';
        $html .= '<span class="storyDate round">' . date('j M Y', $story['published']) . '</span>';
        $html .= '<div class="storyBody">';
        $html .= '<h1>' . $story['title'] . '</h1>'. "\n";
        $html .= $story['body_html'] . '<div class="clearer"></div>' . "\n";
        $html .= '<div class="articleLink">';
        $html .= ' <span style="float:right;" class="newNewsTags">Tags: ' . implode(', ', $story['tags']) . '</span>';
        $html .= '  <a href="' .  htmlspecialchars($story['permalink']) . '">Permalink</a>';
        $html .= '</div>';
        $html .= '</div></div>';
        return $html;
    }


    /**
     * Get a list of news articles by tag.
     *
     */
    public static function getNewsByTag($feed, $tag, $count = 20)
    {
        return $GLOBALS['injector']->getInstance('Horde_Registry')->news->searchTags(
            array($tag),
            array('max' => $count,
                  'from' => 0,
                  'channel_id' => array($feed),
                  'order' => 0),
            true);
    }

    /**
     * Retrieve an array of story data from the horde server
     */
    public static function getNewsStories($feed, $max = 10, $start = 0)
    {
        return $GLOBALS['injector']->getInstance('Horde_Registry')->news->stories($feed, array('max_stories' => $max, 'start_at' => $start));
    }

    /**
     * Grabs all the requested feeds from the horde server and
     * returns them in a single array sorted by date.
     *
     * @param array $feeds  An array of jonah feed ids to retrieve.
     *
     * @return  The single sorted consolidated array.
     */
    public static function getConsolidatedStories($feeds, $max = null)
    {
        $stories = array();
        if (!is_array($feeds)) {
            $feeds = array($feeds);
        }

        foreach ($feeds as $feed) {
            $result = self::getNewsStories($feed, $max);
            if (is_array($result)) {
                $stories = array_merge($result, $stories);
            }
        }
        $stories = self::asortbyindex($stories, 'published');
        return $stories;
    }

    /**
     * Function to numerically sort an associative array by a specific index
     * Designed to ease sorting stories by a timestamp when combining seperate
     * channels into one array.
     *
     * @param array $sortarray  The array to sort.
     * @param string $index  The index that contains the numerical value to sort by.
     */
    public static function asortbyindex($sortarray, $index)
    {
       $lastindex = count ($sortarray) - 1;
       for ($subindex = 0; $subindex < $lastindex; $subindex++) {
               $lastiteration = $lastindex - $subindex;
               for ($iteration = 0; $iteration < $lastiteration; $iteration++) {
                       $nextchar = 0;
                       if ($sortarray[$iteration][$index] < $sortarray[$iteration + 1][$index]) {
                               $temp = $sortarray[$iteration];
                               $sortarray[$iteration] = $sortarray[$iteration + 1];
                               $sortarray[$iteration + 1] = $temp;
                       }
               }
       }
       return ($sortarray);
    }

}
