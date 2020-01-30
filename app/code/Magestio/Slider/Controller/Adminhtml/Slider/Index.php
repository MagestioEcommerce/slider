<?php

namespace Magestio\Slider\Controller\Adminhtml\Slider;

/**
 * Class Index
 * @package Magestio\Slider\Controller\Adminhtml\Slider
 */
class Index extends \Magestio\Slider\Controller\Adminhtml\Slider
{
    /**
     * Dispatch request
     *
     * @return \Magento\Backend\Model\View\Result\Forward|\Magento\Framework\View\Result\Page
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
