<?php

namespace Magestio\Slider\Model\ResourceModel\Slider;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

/**
 * Class Collection
 * @package Magestio\Slider\Model\ResourceModel\Slider
 */
class Collection extends AbstractCollection
{
    /**
     * _contruct
     * @return void
     */
    protected function _construct()
    {
        $this->_init(
            'Magestio\Slider\Model\Slider',
            'Magestio\Slider\Model\ResourceModel\Slider'
        );
    }
}
