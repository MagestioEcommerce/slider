<?php

namespace Magestio\Slider\Block\Adminhtml;

use Magento\Backend\Block\Widget\Grid\Container;

/**
 * Class Banner
 * @package Magestio\Slider\Block\Adminhtml
 */
class Banner extends Container
{
    /**
     * Internal constructor, that is called from real constructor
     * @return void
     */
    protected function _construct()
    {
        $this->_controller = 'adminhtml_banner';
        $this->_blockGroup = 'Magestio_Slider';
        $this->_headerText = __('Banners');
        $this->_addButtonLabel = __('Add New Banner');

        parent::_construct();
    }
}
