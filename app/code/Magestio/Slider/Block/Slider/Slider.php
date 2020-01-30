<?php

namespace Magestio\Slider\Block\Slider;

use Magento\Cms\Model\Template\FilterProvider;
use Magento\Framework\Registry;
use Magento\Framework\View\Element\Template;
use Magento\Framework\View\Element\Template\Context;
use Magento\Widget\Block\BlockInterface;
use Magestio\Slider\Helper\Custom as HelperCustom;

/**
 * Class Slider
 * @package Magestio\Slider\Block\Slider
 */
class Slider extends Template implements BlockInterface
{
    protected $_sliderId;
    protected $_sliderConfiguration;
    protected $_helperCustom;
    protected $_filterProvider;

    /**
     * Custom constructor.
     * @param Context $context
     * @param Registry $registry
     * @param HelperCustom $helperCustom
     * @param FilterProvider $filterProvider
     * @param array $data
     */
    public function __construct(
        Context $context,
        Registry $registry,
        HelperCustom $helperCustom,
        FilterProvider $filterProvider,
        array $data = []
    ) {
        $this->_coreRegistry = $registry;
        $this->_helperCustom = $helperCustom;
        $this->_filterProvider = $filterProvider;

        $this->setTemplate('sliders/slider.phtml');

        parent::__construct($context, $data);
    }

    /**
     * @param $video
     * @return mixed
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function getVideoHtml($video)
    {
        $storeId = $this->_storeManager->getStore()->getId();
        return $this->_filterProvider->getBlockFilter()->setStoreId($storeId)->filter($video);
    }

    public function getSliderConfiguration()
    {
        $sliderId = $this->getData('slider_id');

        if ($this->_sliderId != $sliderId) {
            $this->_sliderId = $sliderId;
        }

        if (is_null($this->_sliderConfiguration)) {
            $this->_sliderConfiguration = $this->_helperCustom->getSliderConfigOptions($this->_sliderId);
        }

        return $this->_sliderConfiguration;
    }

    public function getBreakpointConfiguration()
    {
        return $this->_helperCustom->getBreakpointConfiguration();
    }

    public function getMediaUrl()
    {
        return $this->_storeManager->getStore()->getBaseUrl(\Magento\Framework\UrlInterface::URL_TYPE_MEDIA);
    }

}
