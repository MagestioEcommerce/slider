<?php

namespace Magestio\Slider\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

/**
 * Class Slider
 * @package Magestio\Slider\Model\ResourceModel
 */
class Slider extends AbstractDb
{
    /**
     * construct
     * @return void
     */
    protected function _construct()
    {
        $this->_init('magestio_slider_sliders', 'id');
    }
}
