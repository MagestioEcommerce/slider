<?php

namespace Magestio\Slider\Model;

use DateTime;
use Exception;
use Magento\Framework\Logger\Monolog;

use Magento\Framework\Model\AbstractModel;
use Magento\Framework\Model\Context;
use Magento\Framework\Registry;
use Magento\Store\Model\StoreManagerInterface;
use Magestio\Slider\Api\Data\BannerInterface;
use Magestio\Slider\Model\ResourceModel\Banner as BannerResource;
use Magestio\Slider\Model\ResourceModel\Banner\Collection as BannerCollection;
use Magestio\Slider\Model\ResourceModel\Slider\CollectionFactory as SliderCollectionFactory;

/**
 * Class Banner
 * @package Magestio\Slider\Model
 */
class Banner extends AbstractModel implements BannerInterface
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

    /**
     * @return int
     */
    public function getId()
    {
        return $this->getData(self::ENTITY_ID);
    }

    /**
     * @return bool
     */
    public function getStatus()
    {
        return $this->getData(self::STATUS);
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->getData(self::TITLE);
    }

    /**
     * @return bool
     */
    public function getShowTitle()
    {
        return $this->getData(self::SHOW_TITLE);
    }

    /**
     * @return bool
     */
    public function getDescription()
    {
        return $this->getData(self::DESCRIPTION);
    }

    /**
     * @return bool
     */
    public function getShowDescription()
    {
        return $this->getData(self::SHOW_DESCRIPTION);
    }

    /**
     * @return int
     */
    public function getBannerType()
    {
        return $this->getData(self::BANNER_TYPE);
    }

    /**
     * @return int
     */
    public function getSliderId()
    {
        return $this->getData(self::SLIDER_ID);
    }

    /**
     * @return string
     */
    public function getUrl()
    {
        return $this->getData(self::URL);
    }

    /**
     * @return string
     */
    public function getTarget()
    {
        return $this->getData(self::TARGET);
    }

    /**
     * @return string
     */
    public function getVideo()
    {
        return $this->getData(self::VIDEO);
    }

    /**
     * @return string
     */
    public function getImage()
    {
        return $this->getData(self::IMAGE);
    }

    /**
     * @return string
     */
    public function getMobileImage()
    {
        return $this->getData(self::MOBILE_IMAGE);
    }

    /**
     * @return string
     */
    public function getCustom()
    {
        return $this->getData(self::CUSTOM);
    }

    /**
     * @return string
     */
    public function getAltText()
    {
        return $this->getData(self::ALT_TEXT);
    }

    /**
     * @return string
     */
    public function getButtonText()
    {
        return $this->getData(self::BUTTON_TEXT);
    }

    /**
     * @return string
     */
    public function getCustomContent()
    {
        return $this->getData(self::CUSTOM_CONTENT);
    }

    /**
     * @return string
     */
    public function getCustomCss()
    {
        return $this->getData(self::CUSTOM_CSS);
    }

    /**
     * @return string
     * @throws Exception
     */
    public function getValidFrom()
    {
        $time = $this->getData(self::VALID_FROM);
        if (!$time instanceof DateTime) {
            $time = new DateTime($time);
        }
        return $time->format('d-m-Y H:i:s');
    }

    /**
     * @return string
     * @throws Exception
     */
    public function getValidTo()
    {
        $time = $this->getData(self::VALID_TO);
        if (!$time instanceof DateTime) {
            $time = new DateTime($time);
        }
        return $time->format('d-m-Y H:i:s');
    }

    /**
     * @return string
     * @throws Exception
     */
    public function getCreatedAt()
    {
        $time = $this->getData(self::CREATED_AT);
        if (!$time instanceof DateTime) {
            $time = new DateTime($time);
        }
        return $time->format('d-m-y H:i:s');
    }

    /**
     * @return string
     * @throws Exception
     */
    public function getUpdatedAt()
    {
        $time = $this->getData(self::UPDATED_AT);
        if (!$time instanceof DateTime) {
            $time = new DateTime($time);
        }
        return $time->format('d-m-y H:i:s');
    }

    /**
     * @return int
     */
    public function getSortOrder()
    {
        return $this->getData(self::SORT_ORDER);
    }

    /**
     * @param int $id
     * @return BannerInterface
     */
    public function setId($id)
    {
        return $this->setData(self::ENTITY_ID, $id);
    }

    /**
     * @param bool $status
     * @return BannerInterface
     */
    public function setStatus($status)
    {
        return $this->setData(self::STATUS, $status);
    }

    /**
     * @param string $title
     * @return BannerInterface
     */
    public function setTitle($title)
    {
        return $this->setData(self::TITLE, $title);
    }

    /**
     * @param bool $showTitle
     * @return BannerInterface
     */
    public function setShowTitle($showTitle)
    {
        return $this->setData(self::SHOW_TITLE, $showTitle);
    }

    /**
     * @param bool $description
     * @return BannerInterface
     */
    public function setDescription($description)
    {
        return $this->setData(self::DESCRIPTION, $description);
    }

    /**
     * @param bool $showDescription
     * @return BannerInterface
     */
    public function setShowDescription($showDescription)
    {
        return $this->setData(self::SHOW_DESCRIPTION, $showDescription);
    }

    /**
     * @param int $bannerType
     * @return BannerInterface
     */
    public function setBannerType($bannerType)
    {
        return $this->setData(self::BANNER_TYPE, $bannerType);
    }

    /**
     * @param int $sliderId
     * @return BannerInterface
     */
    public function setSliderId($sliderId)
    {
        return $this->setData(self::SLIDER_ID, $sliderId);
    }

    /**
     * @param string $url
     * @return BannerInterface
     */
    public function setUrl($url)
    {
        return $this->setData(self::URL, $url);
    }

    /**
     * @param string $target
     * @return BannerInterface
     */
    public function setTarget($target)
    {
        return $this->setData(self::TARGET, $target);
    }

    /**
     * @param string $video
     * @return BannerInterface
     */
    public function setVideo($video)
    {
        return $this->setData(self::VIDEO, $video);
    }

    /**
     * @param string $image
     * @return BannerInterface
     */
    public function setImage($image)
    {
        return $this->setData(self::IMAGE, $image);
    }

    /**
     * @param string $mobileImage
     * @return BannerInterface
     */
    public function setMobileImage($mobileImage)
    {
        return $this->setData(self::MOBILE_IMAGE, $mobileImage);
    }

    /**
     * @param string $custom
     * @return BannerInterface
     */
    public function setCustom($custom)
    {
        return $this->setData(self::CUSTOM, $custom);
    }

    /**
     * @param string $altText
     * @return BannerInterface
     */
    public function setAltText($altText)
    {
        return $this->setData(self::ALT_TEXT, $altText);
    }

    /**
     * @param string $buttonText
     * @return BannerInterface
     */
    public function setButtonText($buttonText)
    {
        return $this->setData(self::BUTTON_TEXT, $buttonText);
    }

    /**
     * @param string $customContent
     * @return BannerInterface
     */
    public function setCustomContent($customContent)
    {
        return $this->setData(self::CUSTOM_CONTENT, $customContent);
    }

    /**
     * @param string $customCss
     * @return BannerInterface
     */
    public function setCustomCss($customCss)
    {
        return $this->setData(self::CUSTOM_CSS, $customCss);
    }

    /**
     * @param DateTime $validFrom
     * @return BannerInterface
     * @throws Exception
     */
    public function setValidFrom($validFrom)
    {
        if ($validFrom instanceof DateTime) {
            $time = $validFrom;
        } else {
            $time = new DateTime($validFrom);
        }
        return $this->setData(self::VALID_FROM, $time);
    }

    /**
     * @param DateTime $validTo
     * @return BannerInterface
     * @throws Exception
     */
    public function setValidTo($validTo)
    {
        if ($validTo instanceof DateTime) {
            $time = $validTo;
        } else {
            $time = new DateTime($validTo);
        }
        return $this->setData(self::VALID_TO, $time);
    }

    /**
     * @param int $sortOrder
     * @return BannerInterface
     */
    public function setSortOrder($sortOrder)
    {
        return $this->setData(self::SORT_ORDER, $sortOrder);
    }

    /**
     * @param DateTime $createdAt
     * @return BannerInterface
     * @throws Exception
     */
    public function setCreatedAt($createdAt)
    {
        if ($createdAt instanceof DateTime) {
            $time = $createdAt;
        } else {
            $time = new DateTime($createdAt);
        }
        return $this->setData(self::CREATED_AT, $time);
    }

    /**
     * @param DateTime $updatedAt
     * @return BannerInterface
     * @throws Exception
     */
    public function setUpdatedAt($updatedAt)
    {
        if ($updatedAt instanceof DateTime) {
            $time = $updatedAt;
        } else {
            $time = new DateTime($updatedAt);
        }
        return $this->setData(self::UPDATED_AT, $time);
    }

}
