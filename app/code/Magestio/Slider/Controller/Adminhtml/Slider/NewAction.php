<?php

namespace Magestio\Slider\Controller\Adminhtml\Slider;

/**
 * Class NewAction
 * @package Magestio\Slider\Controller\Adminhtml\Slider
 */
class NewAction extends \Magestio\Slider\Controller\Adminhtml\Slider
{
    /**
     * Dispatch request
     */
    public function execute()
    {
        $resultForward = $this->_resultForwardFactory->create();

        return $resultForward->forward('edit');
    }
}
