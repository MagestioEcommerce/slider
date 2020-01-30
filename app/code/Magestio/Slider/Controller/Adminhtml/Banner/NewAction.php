<?php

namespace Magestio\Slider\Controller\Adminhtml\Banner;

/**
 * Class NewAction
 * @package Magestio\Slider\Controller\Adminhtml\Banner
 */
class NewAction extends \Magestio\Slider\Controller\Adminhtml\Banner
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
