<?php
/**
 * Static class containing site-wide utility functions.
 */
class RubinskyWeb_Utils {

    /**
     * Get the bread crumb html.
     *
     * @param array $trail  An array describing the trail.
     *
     * @return string  An HTML representation of the bread crumb trail
     */
    function getCrumbs($trail)
    {
        global $base_url;
        $html = '';
        $haveFirst = false;
        foreach ($trail as $title => $path) {
            if ($haveFirst) {
                $html .= '::';
            } else {
                $haveFirst = true;
            }
            if (!empty($path)) {
                $html .= '<a href="' . $base_url . '/' . $path . '">' . $title . '</a>';
            } else {
                $html .= $title;
            }
        }
        return $html;
    }

    function getHordeBlock($app, $block_name, $params)
    {
        global $registry;

        return $registry->call('horde/blockContent',
                               array($app, $block_name, $params));
    }


}