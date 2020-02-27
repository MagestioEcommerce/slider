<?php

namespace Magestio\Slider\Api\Data;

use DateTime;

/**
 * Interface BannerInterface
 * @package Magestio\Slider\Api\Data
 */
interface BannerInterface
{
    const ENTITY_ID = 'id';
    const STATUS = 'status';
    const TITLE = 'title';
    const SHOW_TITLE = 'show_title';
    const DESCRIPTION = 'description';
    const SHOW_DESCRIPTION = 'show_description';
    const BANNER_TYPE = 'banner_type';
    const SLIDER_ID = 'slider_id';
    const URL = 'url';
    const TARGET = 'target';
    const VIDEO = 'video';
    const IMAGE = 'image';
    const MOBILE_IMAGE = 'mobile_image';
    const CUSTOM = 'custom';
    const ALT_TEXT = 'alt_text';
    const BUTTON_TEXT = 'button_text';
    const CUSTOM_CONTENT = 'custom_content';
    const CUSTOM_CSS = 'custom_css';
    const VALID_FROM = 'valid_from';
    const VALID_TO = 'valid_to';
    const SORT_ORDER = 'sort_order';
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
     * @return bool
     */
    public function getDescription();

    /**
     * @return bool
     */
    public function getShowDescription();

    /**
     * @return int
     */
    public function getBannerType();

    /**
     * @return int
     */
    public function getSliderId();

    /**
     * @return string
     */
    public function getUrl();

    /**
     * @return string
     */
    public function getTarget();

    /**
     * @return string
     */
    public function getVideo();

    /**
     * @return string
     */
    public function getImage();

    /**
     * @return string
     */
    public function getMobileImage();

    /**
     * @return string
     */
    public function getCustom();

    /**
     * @return string
     */
    public function getAltText();

    /**
     * @return string
     */
    public function getButtonText();

    /**
     * @return string
     */
    public function getCustomContent();

    /**
     * @return string
     */
    public function getCustomCss();

    /**
     * @return string
     */
    public function getValidFrom();

    /**
     * @return string
     */
    public function getValidTo();

    /**
     * @return int
     */
    public function getSortOrder();

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
     * @return BannerInterface
     */
    public function setId($id);

    /**
     * @param bool $status
     * @return BannerInterface
     */
    public function setStatus($status);

    /**
     * @param string $title
     * @return BannerInterface
     */
    public function setTitle($title);

    /**
     * @param bool $showTitle
     * @return BannerInterface
     */
    public function setShowTitle($showTitle);

    /**
     * @param bool $description
     * @return BannerInterface
     */
    public function setDescription($description);

    /**
     * @param bool $showDescription
     * @return BannerInterface
     */
    public function setShowDescription($showDescription);

    /**
     * @param int $bannerType
     * @return BannerInterface
     */
    public function setBannerType($bannerType);

    /**
     * @param int $sliderId
     * @return BannerInterface
     */
    public function setSliderId($sliderId);

    /**
     * @param string $url
     * @return BannerInterface
     */
    public function setUrl($url);

    /**
     * @param string $target
     * @return BannerInterface
     */
    public function setTarget($target);

    /**
     * @param string $video
     * @return BannerInterface
     */
    public function setVideo($video);

    /**
     * @param string $image
     * @return BannerInterface
     */
    public function setImage($image);

    /**
     * @param string $mobileImage
     * @return BannerInterface
     */
    public function setMobileImage($mobileImage);

    /**
     * @param string $custom
     * @return BannerInterface
     */
    public function setCustom($custom);

    /**
     * @param string $altText
     * @return BannerInterface
     */
    public function setAltText($altText);

    /**
     * @param string $buttonText
     * @return BannerInterface
     */
    public function setButtonText($buttonText);

    /**
     * @param string $customContent
     * @return BannerInterface
     */
    public function setCustomContent($customContent);

    /**
     * @param string $customCss
     * @return BannerInterface
     */
    public function setCustomCss($customCss);

    /**
     * @param DateTime $validFrom
     * @return BannerInterface
     */
    public function setValidFrom($validFrom);

    /**
     * @param DateTime $validTo
     * @return BannerInterface
     */
    public function setValidTo($validTo);

    /**
     * @param int $sortOrder
     * @return BannerInterface
     */
    public function setSortOrder($sortOrder);

    /**
     * @return string
     */
    public function setCreatedAt($time);

    /**
     * @return string
     */
    public function setUpdatedAt($time);

}
