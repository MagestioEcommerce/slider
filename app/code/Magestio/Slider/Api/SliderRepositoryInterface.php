<?php

namespace Magestio\Slider\Api;

use Magento\Framework\Api\SearchCriteriaInterface;
use Magestio\Slider\Api\Data\SliderSearchResultsInterface;

/**
 * Interface SliderRepositoryInterface
 * @package Magestio\Slider\Api
 */
interface SliderRepositoryInterface
{

    /**
     * Retrieve slides matching the specified criteria.
     *
     * @param SearchCriteriaInterface $searchCriteria
     * @return SliderSearchResultsInterface
     */
    public function getList(SearchCriteriaInterface $searchCriteria);

}