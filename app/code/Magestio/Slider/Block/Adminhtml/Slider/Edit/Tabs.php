<?php

namespace Magestio\Slider\Block\Adminhtml\Slider\Edit;

/**
 * Class Tabs
 * @package Magestio\Slider\Block\Adminhtml\Slider\Edit
 */
class Tabs extends \Magento\Backend\Block\Widget\Tabs
{
    protected function _construct()
    {
        parent::_construct();
        
        $this->setId('slider_tabs');
        $this->setDestElementId('edit_form');
        $this->setTitle(__('Slider Information'));
    }
}
