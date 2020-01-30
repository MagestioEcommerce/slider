<?php

namespace Magestio\Slider\Controller\Adminhtml\Banner;

/**
 * Class Grid
 * @package Magestio\Slider\Controller\Adminhtml\Banner
 */
class Grid extends \Magestio\Slider\Controller\Adminhtml\Banner
{
    /**
     * Dispatch request
     *
     * @var \Magento\Framework\View\Result\PageFactory
     */
    public function execute()
    {
        return $this->_resultLayoutFactory->create();
    }
}
