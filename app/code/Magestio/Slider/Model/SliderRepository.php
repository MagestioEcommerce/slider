<?php

namespace Magestio\Slider\Model;

use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Api\SortOrder;
use Magestio\Slider\Api\Data\SliderSearchResultsInterface;
use Magestio\Slider\Api\Data\SliderSearchResultsInterfaceFactory;
use Magestio\Slider\Api\SliderRepositoryInterface;
use Magestio\Slider\Model\ResourceModel\Slider\CollectionFactory as SliderCollectionFactory;

/**
 * Class SliderRepository
 * @package Magestio\Slider\Model
 */
class SliderRepository implements SliderRepositoryInterface
{

    /**
     * @var SliderCollectionFactory
     */
    protected $sliderCollectionFactory;

    /**
     * @var SliderSearchResultsInterfaceFactory
     */
    protected $searchResultsFactory;

    /**
     * SliderRepository constructor.
     * @param SliderCollectionFactory $sliderCollectionFactory
     * @param SliderSearchResultsInterfaceFactory $searchResultsFactory
     */
    public function __construct(
        SliderCollectionFactory $sliderCollectionFactory,
        SliderSearchResultsInterfaceFactory $searchResultsFactory
    ) {
        $this->sliderCollectionFactory = $sliderCollectionFactory;
        $this->searchResultsFactory = $searchResultsFactory;
    }

    /**
     * @param SearchCriteriaInterface $searchCriteria
     * @return SliderSearchResultsInterface
     */
    public function getList(SearchCriteriaInterface $searchCriteria)
    {
        $searchResults = $this->searchResultsFactory->create();
        $searchResults->setSearchCriteria($searchCriteria);

        $collection = $this->sliderCollectionFactory->create();
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
