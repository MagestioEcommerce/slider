<?php

namespace Magestio\Slider\Helper;

use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Framework\App\Helper\AbstractHelper;
use Magento\Framework\App\Helper\Context;
use Magento\Framework\DataObject;
use Magento\Framework\Stdlib\DateTime\DateTime;
use Magento\Store\Model\ScopeInterface;
use Magestio\Slider\Model\Banner;
use Magestio\Slider\Model\Slider;

/**
 * Class Custom
 * @package Magestio\Slider\Helper
 */
class Custom extends AbstractHelper
{

    const XML_PATH_MOBILE_BREAKPOINT = 'mslider/general/mobile_breakpoint';

    /**
     * @var Slider
     */
    protected $sliderModel;

    /**
     * @var DateTime
     */
    protected $date;

    /**
     * @var ScopeConfigInterface
     */
    protected $scopeConfig;

    protected $_configFieldsSlider;

    protected $_configFieldsBanner;

    /**
     * @var int
     */
    protected $_sliderId;

    /**
     * Custom constructor.
     * @param Context $context
     * @param Slider $sliderModel
     * @param DateTime $date
     */
    public function __construct(
        Context $context,
        Slider $sliderModel,
        DateTime $date
    ) {
        parent::__construct($context);
        $this->sliderModel = $sliderModel;
        $this->date        = $date;
        $this->scopeConfig = $context->getScopeConfig();
    }

    /**
     * Retrieve the slider config options.
     *
     * @param int $sliderId
     * @return DataObject
     */
    public function getSliderConfigOptions($sliderId)
    {
        if ($this->_sliderId != $sliderId && is_null($this->_configFieldsSlider)) {
            $this->_sliderId = $sliderId;

            $this->_configFieldsSlider = [
                'title',
                'show_title',
                'status',
                'scheduled_ajax',
                'nav',
                'dots',
                'center',
                'items',
                'loop',
                'margin',
                'merge',
                'URLhashListener',
                'stagePadding',
                'lazyLoad',
                'transition',
                'autoplay',
                'autoplayTimeout',
                'autoplayHoverPause',
                'autoHeight',
                'nav_brk1',
                'items_brk1',
                'nav_brk2',
                'items_brk2',
                'nav_brk3',
                'items_brk3',
                'nav_brk4',
                'items_brk4',
            ];
        }
        if (is_null($this->_configFieldsBanner)) {
            $this->_configFieldsBanner = [
                'id',
                'title',
                'show_title',
                'description',
                'show_description',
                'status',
                'scheduled_ajax',
                'url',
                'banner_type',
                'image',
                'mobile_image',
                'video',
                'custom',
                'alt_text',
                'target',
                'button_text',
                'custom_content',
                'custom_css',
                'valid_from',
                'valid_to'
            ];
        }

        /* @var Slider $slider */
        $slider = $this->sliderModel->load($sliderId);

        if (!isset($this->_configFieldsSlider)) {
            return new DataObject();
        }

        $sliderConfig = [];
        foreach ($this->_configFieldsSlider as $field) {
            $sliderConfig[$field] = $slider->getData($field);
        }

        $sliderBannersCollection = $slider->getSliderBanerCollection();
        $sliderBannersCollection->setOrder('sort_order', 'ASC');

        $enableAjaxSchedule = $sliderConfig['scheduled_ajax'];

        $bannerConfig = [];
        foreach ($sliderBannersCollection as $banner) {
            if (!$banner->getStatus()) {
                continue;
            }

            if (!$enableAjaxSchedule && !$this->validateBannerDisplayDate($banner)) {
                continue;
            }

            $bannerDetails = [];
            foreach ($this->_configFieldsBanner as $field) {
                $bannerDetails[$field] = $banner->getData($field);
            }
            $bannerConfig[$banner->getId()] = $bannerDetails;
        }

        $configData = new DataObject();

        $configData->setSliderConfig($sliderConfig);
        $configData->setBannerConfig($bannerConfig);

        return $configData;
    }

    /**
     * Retrieve the breakpoint configuration.
     *
     * @return array
     */
    public function getBreakpointConfiguration()
    {
        $configPaths = [
            'breakpoint_1',
            'breakpoint_2',
            'breakpoint_3',
            'breakpoint_4',
        ];

        $breakpointConfiguration = [];

        foreach ($configPaths as $configPath) {
            $value = $this->_getConfigValue($configPath);
            $breakpointConfiguration[$configPath] = $value ? $value : 0;
        }

        return $breakpointConfiguration;
    }

    /**
     * Retrieve the config value.
     *
     * @param string $configPath
     * @return string
     */
    private function _getConfigValue($configPath)
    {
        $sysPath = 'mslider/general/' . $configPath;

        return $this->scopeConfig->getValue($sysPath, ScopeInterface::SCOPE_STORE);
    }

    /**
     * Validate the banner display date.
     *
     * @param Banner $banner
     * @return bool
     */
    public function validateBannerDisplayDate($banner)
    {
        $validFrom = strtotime($banner->getValidFrom());
        $validTo = strtotime($banner->getValidTo());

        $now = time();

        if ($validFrom <= $now && $validTo >= $now) {
            return true;
        }

        return false;
    }

    /**
     * @return string
     */
    public function getMobileBreakpoint()
    {
        $breakpoint = $this->scopeConfig->getValue(self::XML_PATH_MOBILE_BREAKPOINT, ScopeInterface::SCOPE_STORE);
        return (!$breakpoint) ? 0 : $breakpoint;
    }

}
