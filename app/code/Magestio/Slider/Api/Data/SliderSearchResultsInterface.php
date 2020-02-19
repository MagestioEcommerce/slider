<?php

namespace Magestio\Slider\Api\Data;

use Magento\Framework\Api\SearchResultsInterface;

/**
 * Interface SliderSearchResultsInterface
 * @package Magestio\Slider\Api\Data
 */
interface SliderSearchResultsInterface extends SearchResultsInterface
{

    /**
     * Get slides list.
     *
     * @return SliderInterface[]
     */
    public function getItems();

    /**
     * Set slides list.
     *
     * @param SliderInterface[] $items
     * @return $this
     */
    public function setItems(array $items);

}