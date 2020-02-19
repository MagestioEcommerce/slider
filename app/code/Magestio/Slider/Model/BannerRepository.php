<?php

namespace Magestio\Slider\Model;

use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Api\SortOrder;
use Magestio\Slider\Api\Data\BannerSearchResultsInterface;
use Magestio\Slider\Api\Data\BannerSearchResultsInterfaceFactory;
use Magestio\Slider\Api\BannerRepositoryInterface;
use Magestio\Slider\Model\ResourceModel\Banner\CollectionFactory as BannerCollectionFactory;

/**
 * Class BannerRepository
 * @package Magestio\Slider\Model
 */
class BannerRepository implements BannerRepositoryInterface
{

    /**
     * @var BannerCollectionFactory
     */
    protected $bannerCollectionFactory;

    /**
     * @var BannerSearchResultsInterfaceFactory
     */
    protected $searchResultsFactory;

    /**
     * BannerRepository constructor.
     * @param BannerCollectionFactory $bannerCollectionFactory
     * @param BannerSearchResultsInterfaceFactory $searchResultsFactory
     */
    public function __construct(
        BannerCollectionFactory $bannerCollectionFactory,
        BannerSearchResultsInterfaceFactory $searchResultsFactory
    ) {
        $this->bannerCollectionFactory = $bannerCollectionFactory;
        $this->searchResultsFactory = $searchResultsFactory;
    }

    /**
     * @param SearchCriteriaInterface $searchCriteria
     * @return BannerSearchResultsInterface
     */
    public function getList(SearchCriteriaInterface $searchCriteria)
    {
        $searchResults = $this->searchResultsFactory->create();
        $searchResults->setSearchCriteria($searchCriteria);

        $collection = $this->bannerCollectionFactory->create();
        foreach ($searchCriteria->getFilterGroups() as $filterGroup) {
            foreach ($filterGroup->getFilters() as $filter) {
                $condition = $filter->getConditionType() ?: 'eq';
                $collection->addFieldToFilter($filter->getField(), [$condition => $filter->getValue()]);
            }
        }
        $searchResults->setTotalCount($collection->getSize());
        $sortOrders = $searchCriteria->getSortOrders();
        if ($sortOrders) {
            foreach ($sortOrders as $sortOrder) {
                $collection->addOrder(
                    $sortOrder->getField(),
                    ($sortOrder->getDirection() == SortOrder::SORT_ASC) ? 'ASC' : 'DESC'
                );
            }
        }
        $collection->setCurPage($searchCriteria->getCurrentPage());
        $collection->setPageSize($searchCriteria->getPageSize());
        $collection->load();
        $searchResults->setItems($collection->getItems());
        $searchResults->setTotalCount($collection->getSize());
        return $searchResults;
    }
}
