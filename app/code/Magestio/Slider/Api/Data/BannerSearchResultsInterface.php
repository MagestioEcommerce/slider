<?php

namespace Magestio\Slider\Api\Data;

use Magento\Framework\Api\SearchResultsInterface;

/**
 * Interface BannerSearchResultsInterface
 * @package Magestio\Slider\Api\Data
 */
interface BannerSearchResultsInterface extends SearchResultsInterface
{

    /**
     * Get banner list.
     *
     * @return BannerInterface[]
     */
    public function getItems();

    /**
     * Set banner list.
     *
     * @param BannerInterface[] $items
     * @return $this
     */
    public function setItems(array $items);

}