<?php

namespace Magestio\Slider\Model;

use Magento\Framework\Logger\Monolog;

use Magento\Framework\Model\AbstractModel;
use Magento\Framework\Model\Context;
use Magento\Framework\Registry;
use Magento\Store\Model\StoreManagerInterface;
use Magestio\Slider\Model\ResourceModel\Banner as BannerResource;
use Magestio\Slider\Model\ResourceModel\Banner\Collection as BannerCollection;
use Magestio\Slider\Model\ResourceModel\Slider\CollectionFactory as SliderCollectionFactory;

/**
 * Class Banner
 * @package Magestio\Slider\Model
 */
class Banner extends AbstractModel
{

    const SLIDER_MEDIA_PATH = 'magestio/slider/images';
    const SLIDER_MOBILE_IMAGE_MEDIA_PATH = 'magestio/slider/mobile_images';

    /**
     * @var SliderCollectionFactory
     */
    protected $sliderCollectionFactory;

    /**
     * @var string
     */
    protected $formFieldHtmlIdPrefix = 'page_';

    /**
     * @var BannerFactory
     */
    protected $bannerFactory;

    /**
     * @var Monolog
     */
    protected $monolog;

    /**
     * Banner constructor.
     * @param Context $context
     * @param Registry $registry
     * @param BannerResource $resource
     * @param BannerCollection $resourceCollection
     * @param BannerFactory $bannerFactory
     * @param SliderCollectionFactory $sliderCollectionFactory
     * @param StoreManagerInterface $storeManager
     * @param Monolog $monolog
     */
    public function __construct(
        Context $context,
        Registry $registry,
        BannerResource $resource,
        BannerCollection $resourceCollection,
        BannerFactory $bannerFactory,
        SliderCollectionFactory $sliderCollectionFactory,
        StoreManagerInterface $storeManager,
        Monolog $monolog
    ) {
        parent::__construct($context, $registry, $resource, $resourceCollection);

        $this->bannerFactory = $bannerFactory;
        $this->sliderCollectionFactory = $sliderCollectionFactory;
        $this->monolog = $monolog;
    }

    /**
     * Return the form field html id prefix.
     *
     * @return string
     */
    public function getFormFieldHtmlIdPrefix()
    {
        return $this->formFieldHtmlIdPrefix;
    }

    /**
     * Return the available sliders.
     *
     * @return array
     */
    public function getAvailableSliders()
    {
        $option[] = [
            'value' => '',
            'label' => __('--- Please select a slider ---'),
        ];

        $sliders = $this->sliderCollectionFactory->create();

        if (count($sliders)) {
            foreach ($sliders as $slider) {
                $option[] = [
                    'value' => $slider->getId(),
                    'label' => $slider->getTitle(),
                ];
            }
        }

        return $option;
    }

    /**
     * Return the available banners type.
     *
     * @return array
     */
    public function getAvailableBannerType()
    {
        $options = [];
        $options[] = [
            'value' => 1,
            'label' => __('Image'),
        ];
        $options[] = [
            'value' => 2,
            'label' => __('Video'),
        ];
        $options[] = [
            'value' => 3,
            'label' => __('Custom'),
        ];

        return $options;
    }
}
