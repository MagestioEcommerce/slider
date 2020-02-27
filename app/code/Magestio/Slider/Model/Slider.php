<?php

namespace Magestio\Slider\Model;

use Magento\Framework\Model\AbstractModel;
use Magento\Framework\Model\Context;
use Magento\Framework\Registry;
use Magestio\Slider\Api\Data\SliderInterface;
use Magestio\Slider\Model\ResourceModel\Banner\CollectionFactory as BannerCollectionFactory;
use Magestio\Slider\Model\ResourceModel\Slider as SliderResource;
use Magestio\Slider\Model\ResourceModel\Slider\Collection as SliderCollection;

/**
 * Class Slider
 * @package Magestio\Slider\Model
 */
class Slider extends AbstractModel implements SliderInterface
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
     * @return string
     */
    public function getSliderContent()
    {
        return $this->getData(self::SLIDER_CONTENT);
    }

    /**
     * @return bool
     */
    public function getScheduledAjax()
    {
        return $this->getData(self::SCHEDULED_AJAX);
    }

    /**
     * @return bool
     */
    public function getNav()
    {
        return $this->getData(self::NAV);
    }

    /**
     * @return bool
     */
    public function getDots()
    {
        return $this->getData(self::DOTS);
    }

    /**
     * @return bool
     */
    public function getCenter()
    {
        return $this->getData(self::CENTER);
    }

    /**
     * @return int
     */
    public function getItems()
    {
        return $this->getData(self::ITEMS);
    }

    /**
     * @return bool
     */
    public function getLoop()
    {
        return $this->getData(self::LOOP);
    }

    /**
     * @return int
     */
    public function getMargin()
    {
        return $this->getData(self::MARGIN);
    }

    /**
     * @return int
     */
    public function getStagePadding()
    {
        return $this->getData(self::STAGE_PADDING);
    }

    /**
     * @return bool
     */
    public function getLazyLoading()
    {
        return $this->getData(self::LAZY_LOADING);
    }

    /**
     * @return string
     */
    public function getTransition()
    {
        return $this->getData(self::TRANSITION);
    }

    /**
     * @return bool
     */
    public function getAutoplay()
    {
        return $this->getData(self::AUTOPLAY);
    }

    /**
     * @return int
     */
    public function getAutoplayTimeout()
    {
        return $this->getData(self::AUTOPLAY_TIMEOUT);
    }

    /**
     * @return bool
     */
    public function getAutoplayHoverPause()
    {
        return $this->getData(self::AUTOPLAY_HOVER_PAUSE);
    }

    /**
     * @return bool
     */
    public function getAutoHeight()
    {
        return $this->getData(self::AUTO_HEIGHT);
    }

    /**
     * @return bool
     */
    public function getNavBrk1()
    {
        return $this->getData(self::NAV_BRK1);
    }

    /**
     * @return int
     */
    public function getItemsBrk1()
    {
        return $this->getData(self::ITEMS_BRK1);
    }

    /**
     * @return bool
     */
    public function getNavBrk2()
    {
        return $this->getData(self::NAV_BRK2);
    }

    /**
     * @return int
     */
    public function getItemsBrk2()
    {
        return $this->getData(self::ITEMS_BRK2);
    }

    /**
     * @return bool
     */
    public function getNavBrk3()
    {
        return $this->getData(self::NAV_BRK3);
    }

    /**
     * @return int
     */
    public function getItemsBrk3()
    {
        return $this->getData(self::ITEMS_BRK3);
    }

    /**
     * @return bool
     */
    public function getNavBrk4()
    {
        return $this->getData(self::NAV_BRK4);
    }

    /**
     * @return int
     */
    public function getItemsBrk4()
    {
        return $this->getData(self::ITEMS_BRK4);
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
     * @param int $id
     * @return SliderInterface
     */
    public function setId($id)
    {
        return $this->setData(self::ENTITY_ID, $id);
    }

    /**
     * @param bool $status
     * @return SliderInterface
     */
    public function setStatus($status)
    {
        return $this->setData(self::STATUS, $status);
    }

    /**
     * @param string $title
     * @return SliderInterface
     */
    public function setTitle($title)
    {
        return $this->setData(self::TITLE, $title);
    }

    /**
     * @param bool $showTitle
     * @return SliderInterface
     */
    public function setShowTitle($showTitle)
    {
        return $this->setData(self::SHOW_TITLE, $showTitle);
    }

    /**
     * @param string $sliderContent
     * @return SliderInterface
     */
    public function setSliderContent($sliderContent)
    {
        return $this->setData(self::SLIDER_CONTENT, $sliderContent);
    }

    /**
     * @param bool $scheduledAjax
     * @return SliderInterface
     */
    public function setScheduledAjax($scheduledAjax)
    {
        return $this->setData(self::SCHEDULED_AJAX, $scheduledAjax);
    }

    /**
     * @param bool $nav
     * @return SliderInterface
     */
    public function setNav($nav)
    {
        return $this->setData(self::NAV, $nav);
    }

    /**
     * @param bool $dots
     * @return SliderInterface
     */
    public function setDots($dots)
    {
        return $this->setData(self::DOTS, $dots);
    }

    /**
     * @param bool $center
     * @return SliderInterface
     */
    public function setCenter($center)
    {
        return $this->setData(self::CENTER, $center);
    }

    /**
     * @param int $items
     * @return SliderInterface
     */
    public function setItems($items)
    {
        return $this->setData(self::ITEMS, $items);
    }

    /**
     * @param bool $loop
     * @return SliderInterface
     */
    public function setLoop($loop)
    {
        return $this->setData(self::LOOP, $loop);
    }

    /**
     * @param int $margin
     * @return SliderInterface
     */
    public function setMargin($margin)
    {
        return $this->setData(self::MARGIN, $margin);
    }

    /**
     * @param int $stagePadding
     * @return SliderInterface
     */
    public function setStagePadding($stagePadding)
    {
        return $this->setData(self::STAGE_PADDING, $stagePadding);
    }

    /**
     * @param bool $lazyLoading
     * @return SliderInterface
     */
    public function setLazyLoading($lazyLoading)
    {
        return $this->setData(self::LAZY_LOADING, $lazyLoading);
    }

    /**
     * @param string $transition
     * @return SliderInterface
     */
    public function setTransition($transition)
    {
        return $this->setData(self::TRANSITION, $transition);
    }

    /**
     * @param bool $autoplay
     * @return SliderInterface
     */
    public function setAutoplay($autoplay)
    {
        return $this->setData(self::AUTOPLAY, $autoplay);
    }

    /**
     * @param int $autoplayTimeout
     * @return SliderInterface
     */
    public function setAutoplayTimeout($autoplayTimeout)
    {
        return $this->setData(self::AUTOPLAY_TIMEOUT, $autoplayTimeout);
    }

    /**
     * @param bool $autoplayHoverPause
     * @return SliderInterface
     */
    public function setAutoplayHoverPause($autoplayHoverPause)
    {
        return $this->setData(self::AUTOPLAY_HOVER_PAUSE, $autoplayHoverPause);
    }

    /**
     * @param bool $autoHeight
     * @return SliderInterface
     */
    public function setAutoHeight($autoHeight)
    {
        return $this->setData(self::AUTO_HEIGHT, $autoHeight);
    }

    /**
     * @param bool $navBrk1
     * @return SliderInterface
     */
    public function setNavBrk1($navBrk1)
    {
        return $this->setData(self::NAV_BRK1, $navBrk1);
    }

    /**
     * @param int $itemsBrk1
     * @return SliderInterface
     */
    public function setItemsBrk1($itemsBrk1)
    {
        return $this->setData(self::ITEMS_BRK1, $itemsBrk1);
    }

    /**
     * @param bool $navBrk2
     * @return SliderInterface
     */
    public function setNavBrk2($navBrk2)
    {
        return $this->setData(self::NAV_BRK2, $navBrk2);
    }

    /**
     * @param int $itemsBrk2
     * @return SliderInterface
     */
    public function setItemsBrk2($itemsBrk2)
    {
        return $this->setData(self::ITEMS_BRK2, $itemsBrk2);
    }

    /**
     * @param bool $navBrk3
     * @return SliderInterface
     */
    public function setNavBrk3($navBrk3)
    {
        return $this->setData(self::NAV_BRK3, $navBrk3);
    }

    /**
     * @param int $itemsBrk3
     * @return SliderInterface
     */
    public function setItemsBrk3($itemsBrk3)
    {
        return $this->setData(self::ITEMS_BRK3, $itemsBrk3);
    }

    /**
     * @param bool $navBrk4
     * @return SliderInterface
     */
    public function setNavBrk4($navBrk4)
    {
        return $this->setData(self::NAV_BRK4, $navBrk4);
    }

    /**
     * @param int $itemsBrk4
     * @return SliderInterface
     */
    public function setItemsBrk4($itemsBrk4)
    {
        return $this->setData(self::ITEMS_BRK4, $itemsBrk4);
    }

    /**
     * @param DateTime $createdAt
     * @return SliderInterface
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
     * @return SliderInterface
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
