<?php

namespace Magestio\Slider\Model;

use Magento\Framework\Model\AbstractModel;
use Magento\Framework\Model\Context;
use Magento\Framework\Registry;
use Magestio\Slider\Model\ResourceModel\Banner\CollectionFactory as BannerCollectionFactory;
use Magestio\Slider\Model\ResourceModel\Slider as SliderResource;
use Magestio\Slider\Model\ResourceModel\Slider\Collection as SliderCollection;

/**
 * Class Slider
 * @package Magestio\Slider\Model
 */
class Slider extends AbstractModel
{
    const SLIDER_TYPE_CONFIGURABLE  = 1;
    const SLIDER_TYPE_CUSTOM        = 2;

    /**
     * @var BannerCollectionFactory
     */
    protected $bannerCollectionFactory;

    /**
     * Slider constructor.
     * @param Context $context
     * @param Registry $registry
     * @param BannerCollectionFactory $bannerCollectionFactory
     * @param SliderResource $resource
     * @param SliderCollection $resourceCollection
     */
    public function __construct(
        Context $context,
        Registry $registry,
        BannerCollectionFactory $bannerCollectionFactory,
        SliderResource $resource,
        SliderCollection $resourceCollection
    ) {
        parent::__construct($context, $registry, $resource, $resourceCollection);
        $this->bannerCollectionFactory = $bannerCollectionFactory;
    }

    /**
     * Retrieve available slider type.
     *
     * @return array
     */
    public static function getAvailableTransition()
    {
        return [
            'slide'   => __('Slide'),
            'fadeOut' => __('Fade'),
        ];
    }

    /**
     * Retrieve banner collection of slider.
     *
     * @return \Magestio\Slider\Model\ResourceModel\Banner\Collection
     */
    public function getSliderBanerCollection()
    {
        return $this->bannerCollectionFactory->create()->addFieldToFilter('slider_id', $this->getId());
    }
}
