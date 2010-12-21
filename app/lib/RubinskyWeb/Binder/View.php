<?php
/**
 * RubinskyWeb_Binder_View:: binder for configured view object for this site.
 *
 * @author mrubinsk
 */
class RubinskyWeb_Binder_View implements Horde_Injector_Binder
{
    public function create(Horde_Injector $injector)
    {
        // Set up a view with the shared template path.
        // Individual controlles will set the specific path for their view.
        $view = $injector->getInstance('Horde_View');
        $view->setTemplatePath($GLOBALS['fs_base'] . '/app/views/shared');
        $view->addTemplatePath($GLOBALS['fs_base'] . '/app/views/layout');

        return $view;
    }

    public function equals(Horde_Injector_Binder $binder)
    {
        return false;
    }

}
