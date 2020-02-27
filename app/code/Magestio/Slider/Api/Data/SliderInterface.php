<?php

namespace Magestio\Slider\Api\Data;

/**
 * Interface SliderInterface
 * @package Magestio\Slider\Api\Data
 */
interface SliderInterface
{

    const ENTITY_ID = 'id';
    const STATUS = 'status';
    const TITLE = 'title';
    const SHOW_TITLE = 'show_title';
    const SLIDER_CONTENT = 'slider_content';
    const SCHEDULED_AJAX = 'scheduled_ajax';
    const NAV = 'nav';
    const DOTS = 'dots';
    const CENTER = 'center';
    const ITEMS = 'items';
    const LOOP = 'loop';
    const MARGIN = 'margin';
    const STAGE_PADDING = 'stagePadding';
    const LAZY_LOADING = 'lazyLoad';
    const TRANSITION = 'transition';
    const AUTOPLAY = 'autoplay';
    const AUTOPLAY_TIMEOUT = 'autoplayTimeout';
    const AUTOPLAY_HOVER_PAUSE = 'autoplayHoverPause';
    const AUTO_HEIGHT = 'autoHeight';
    const NAV_BRK1 = 'nav_brk1';
    const ITEMS_BRK1 = 'items_brk1';
    const NAV_BRK2 = 'nav_brk2';
    const ITEMS_BRK2 = 'items_brk2';
    const NAV_BRK3 = 'nav_brk3';
    const ITEMS_BRK3 = 'items_brk3';
    const NAV_BRK4 = 'nav_brk4';
    const ITEMS_BRK4 = 'items_brk4';
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    /**
     * @return int
     */
    public function getId();

    /**
     * @return bool
     */
    public function getStatus();

    /**
     * @return string
     */
    public function getTitle();

    /**
     * @return bool
     */
    public function getShowTitle();

    /**
     * @return string
     */
    public function getSliderContent();

    /**
     * @return bool
     */
    public function getScheduledAjax();

    /**
     * @return bool
     */
    public function getNav();

    /**
     * @return bool
     */
    public function getDots();

    /**
     * @return bool
     */
    public function getCenter();

    /**
     * @return int
     */
    public function getItems();

    /**
     * @return bool
     */
    public function getLoop();

    /**
     * @return int
     */
    public function getMargin();

    /**
     * @return int
     */
    public function getStagePadding();

    /**
     * @return bool
     */
    public function getLazyLoading();

    /**
     * @return string
     */
    public function getTransition();

    /**
     * @return bool
     */
    public function getAutoplay();

    /**
     * @return int
     */
    public function getAutoplayTimeout();

    /**
     * @return bool
     */
    public function getAutoplayHoverPause();

    /**
     * @return bool
     */
    public function getAutoHeight();

    /**
     * @return bool
     */
    public function getNavBrk1();

    /**
     * @return int
     */
    public function getItemsBrk1();

    /**
     * @return bool
     */
    public function getNavBrk2();

    /**
     * @return int
     */
    public function getItemsBrk2();

    /**
     * @return bool
     */
    public function getNavBrk3();

    /**
     * @return int
     */
    public function getItemsBrk3();

    /**
     * @return bool
     */
    public function getNavBrk4();

    /**
     * @return int
     */
    public function getItemsBrk4();

    /**
     * @return string
     */
    public function getCreatedAt();

    /**
     * @return string
     */
    public function getUpdatedAt();

    /**
     * @param int $id
     * @return SliderInterface
     */
    public function setId($id);

    /**
     * @param bool $status
     * @return SliderInterface
     */
    public function setStatus($status);

    /**
     * @param string $title
     * @return SliderInterface
     */
    public function setTitle($title);

    /**
     * @param bool $showTitle
     * @return SliderInterface
     */
    public function setShowTitle($showTitle);

    /**
     * @param string $sliderContent
     * @return SliderInterface
     */
    public function setSliderContent($sliderContent);

    /**
     * @param bool $scheduledAjax
     * @return SliderInterface
     */
    public function setScheduledAjax($scheduledAjax);

    /**
     * @param bool $nav
     * @return SliderInterface
     */
    public function setNav($nav);

    /**
     * @param bool $dots
     * @return SliderInterface
     */
    public function setDots($dots);

    /**
     * @param bool $center
     * @return SliderInterface
     */
    public function setCenter($center);

    /**
     * @param int $items
     * @return SliderInterface
     */
    public function setItems($items);

    /**
     * @param bool $loop
     * @return SliderInterface
     */
    public function setLoop($loop);

    /**
     * @param int $margin
     * @return SliderInterface
     */
    public function setMargin($margin);

    /**
     * @param int $stagePadding
     * @return SliderInterface
     */
    public function setStagePadding($stagePadding);

    /**
     * @param bool $lazyLoading
     * @return SliderInterface
     */
    public function setLazyLoading($lazyLoading);

    /**
     * @param string $transition
     * @return SliderInterface
     */
    public function setTransition($transition);

    /**
     * @param bool $autoplay
     * @return SliderInterface
     */
    public function setAutoplay($autoplay);

    /**
     * @param int $autoplayTimeout
     * @return SliderInterface
     */
    public function setAutoplayTimeout($autoplayTimeout);

    /**
     * @param bool $autoplayHoverPause
     * @return SliderInterface
     */
    public function setAutoplayHoverPause($autoplayHoverPause);

    /**
     * @param bool $autoHeight
     * @return SliderInterface
     */
    public function setAutoHeight($autoHeight);

    /**
     * @param bool $navBrk1
     * @return SliderInterface
     */
    public function setNavBrk1($navBrk1);

    /**
     * @param int $itemsBrk1
     * @return SliderInterface
     */
    public function setItemsBrk1($itemsBrk1);

    /**
     * @param bool $navBrk2
     * @return SliderInterface
     */
    public function setNavBrk2($navBrk2);

    /**
     * @param int $itemsBrk2
     * @return SliderInterface
     */
    public function setItemsBrk2($itemsBrk2);

    /**
     * @param bool $navBrk3
     * @return SliderInterface
     */
    public function setNavBrk3($navBrk3);

    /**
     * @param int $itemsBrk3
     * @return SliderInterface
     */
    public function setItemsBrk3($itemsBrk3);

    /**
     * @param bool $navBrk4
     * @return SliderInterface
     */
    public function setNavBrk4($navBrk4);

    /**
     * @param int $itemsBrk4
     * @return SliderInterface
     */
    public function setItemsBrk4($itemsBrk4);

    /**
     * @return string
     */
    public function setCreatedAt($time);

    /**
     * @return string
     */
    public function setUpdatedAt($time);

}
