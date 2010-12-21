<?php
/**
 * Static class containing site-wide utility functions.
 */
class RubinskyWeb_Utils
{
    /**
     * Get the bread crumb html.
     *
     * @param array $trail  An array describing the trail.
     *
     * @return string  An HTML representation of the bread crumb trail
     */
    function getCrumbs($base_url, $trail)
    {
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
        return $$GLOBALS['injector']->getInstance('Horde_Registry')->horde->blockContent($app, $block_name, $params);
    }

}