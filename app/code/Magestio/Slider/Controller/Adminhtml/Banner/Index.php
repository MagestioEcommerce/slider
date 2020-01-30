<?php

namespace Magestio\Slider\Controller\Adminhtml\Banner;

/**
 * Class Index
 * @package Magestio\Slider\Controller\Adminhtml\Banner
 */
class Index extends \Magestio\Slider\Controller\Adminhtml\Banner
{
    /**
     * Dispatch request
     */
    public function execute()
    {
        if ($this->getRequest()->getQuery('ajax')) {
            $resultForward = $this->_resultForwardFactory->create();
            $resultForward->forward('grid');

            return $resultForward;
        }

        $resultPage = $this->_resultPageFactory->create();

        return $resultPage;
    }
}
