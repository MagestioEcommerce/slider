<?php

namespace Magestio\Slider\Controller\Adminhtml;

/**
 * Class Slider
 * @package Magestio\Slider\Controller\Adminhtml
 */
abstract class Slider extends \Magestio\Slider\Controller\Adminhtml\AbstractAction
{
    const PARAM_ID = 'id';

    /**
     * Check if admin has permissions to visit slider pages.
     *
     * @return bool
     */
    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('Magestio_Slider::menu_slider_manage');
    }
}
