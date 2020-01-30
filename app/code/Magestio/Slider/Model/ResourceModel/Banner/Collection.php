<?php

namespace Magestio\Slider\Model\ResourceModel\Banner;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

/**
 * Class Collection
 * @package Magestio\Slider\Model\ResourceModel\Banner
 */
class Collection extends AbstractCollection
{
    /**
     * _construct
     * @return void
     */
    protected function _construct()
    {
        $this->_init(
            'Magestio\Slider\Model\Banner',
            'Magestio\Slider\Model\ResourceModel\Banner'
        );
    }
}
