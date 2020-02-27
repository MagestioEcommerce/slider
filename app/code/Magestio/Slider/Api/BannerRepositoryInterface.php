<?php

namespace Magestio\Slider\Api;

use Magento\Framework\Api\SearchCriteriaInterface;

/**
 * Interface SliderRepositoryInterface
 * @package Magestio\Slider\Api
 */
interface BannerRepositoryInterface
{

    /**
     * Retrieve slides matching the specified criteria.
     *
     * @param SearchCriteriaInterface $searchCriteria
     * @return BannerSearchResultsInterface
     */
    public function getList(SearchCriteriaInterface $searchCriteria);
}
