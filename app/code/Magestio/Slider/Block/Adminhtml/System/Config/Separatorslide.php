<?php

namespace Magestio\Slider\Block\Adminhtml\System\Config;

/**
 * Class Separatorslide
 * @package Magestio\Slider\Block\Adminhtml\System\Config
 */
class Separatorslide extends \Magento\Config\Block\System\Config\Form\Field
{
    protected function _getElementHtml(\Magento\Framework\Data\Form\Element\AbstractElement $element)
    {
        $html = '
            <div class="message" style="text-align: center; margin-top: 20px;">
                <strong>' . __('General Carousel Options') . '</strong><br />
            </div>
        ';

        return $html;
    }
}
