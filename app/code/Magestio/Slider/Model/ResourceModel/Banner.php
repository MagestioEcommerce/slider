<?php

namespace Magestio\Slider\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

/**
 * Class Banner
 * @package Magestio\Slider\Model\ResourceModel
 */
class Banner extends AbstractDb
{
    /**
     * construct
     * @return void
     */
    protected function _construct()
    {
        $this->_init('magestio_slider_banners', 'id');
    }
}
