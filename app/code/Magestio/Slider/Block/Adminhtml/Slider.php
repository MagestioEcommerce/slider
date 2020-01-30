<?php

namespace Magestio\Slider\Block\Adminhtml;

use Magento\Backend\Block\Widget\Grid\Container;

/**
 * Class Slider
 * @package Magestio\Slider\Block\Adminhtml
 */
class Slider extends Container
{
    /**
     * Internal constructor, that is called from real constructor
     * @return void
     */
    protected function _construct()
    {
        $this->_controller = 'adminhtml_slider';
        $this->_blockGroup = 'Magestio_Slider';
        $this->_headerText = __('Sliders');
        $this->_addButtonLabel = __('Add New Slider');
        parent::_construct();
    }
}
