<?php

namespace Magestio\Slider\Controller\Adminhtml\Slider;

use Magestio\Slider\Controller\Adminhtml\Slider;

/**
 * Class Banners
 * @package Magestio\Slider\Controller\Adminhtml\Slider
 */
class Banners extends Slider
{
    /**
     * Dispatch request
     */
    public function execute()
    {
        $resultLayout = $this->_resultLayoutFactory->create();
        $resultLayout
            ->getLayout()
            ->getBlock('mslider.slider.edit.tab.banners')
            ->setInBanner($this->getRequest()->getPost('banner', null));

        return $resultLayout;
    }
}
