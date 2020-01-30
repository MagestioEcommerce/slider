<?php

namespace Magestio\Slider\Controller\Adminhtml\Slider;

/**
 * Class Grid
 * @package Magestio\Slider\Controller\Adminhtml\Slider
 */
class Grid extends \Magestio\Slider\Controller\Adminhtml\Slider
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
