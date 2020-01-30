<?php

namespace Magestio\Slider\Helper;

use Magento\Backend\Model\UrlInterface;
use Magento\Framework\App\Helper\AbstractHelper;
use Magento\Framework\App\Helper\Context;

/**
 * Class Data
 * @package Magestio\Slider\Helper
 */
class Data extends AbstractHelper
{
    /**
     * @var UrlInterface
     */
    protected $backendUrl;

    /**
     * Data constructor.
     * @param Context $context
     * @param UrlInterface $backendUrl
     */
    public function __construct(
        Context $context,
        UrlInterface $backendUrl
    ) {
        parent::__construct($context);

        $this->backendUrl = $backendUrl;
    }

    /**
     * get Slider Banner Url
     * @return string
     */
    public function getSliderBannerUrl()
    {
        return $this->backendUrl->getUrl('*/*/banners', ['_current' => true]);
    }
}
