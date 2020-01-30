<?php

namespace Magestio\Slider\Controller\Adminhtml\Slider;

/**
 * Class BannersGrid
 * @package Magestio\Slider\Controller\Adminhtml\Slider
 */
class BannersGrid extends \Magestio\Slider\Controller\Adminhtml\Slider
{
    /**
     * Dispatch request
     */
    public function execute()
    {
        $resultLayout = $this->_resultLayoutFactory->create();
        
        $resultLayout
            ->getLayout()->getBlock('mslider.slider.edit.tab.banners')
            ->setInBanner($this->getRequest()->getPost('banner', null));

        return $resultLayout;
    }
}
