<?php

namespace Magestio\Slider\Block\Adminhtml\System\Config;

/**
 * Class Separatorbreakpoint
 * @package Magestio\Slider\Block\Adminhtml\System\Config
 */
class Separatorbreakpoint extends \Magento\Config\Block\System\Config\Form\Field
{
    protected function _getElementHtml(\Magento\Framework\Data\Form\Element\AbstractElement $element)
    {
        $number = (int)substr($element->getId(), -1);

        if($number > 0) {
            $html = '
                <p style="text-align: center;"><strong >' . __('Breakpoint ') . $number . '</strong></p>
            ';
        } else {
            $html = '
            <div class="message" style="text-align: center; margin-top: 20px;">
                <p><strong>' . __('Breakpoint Carousel Options') . '</strong></p>
                <p><strong>' . __('This configuration will overwrite the General Carousel Options.') . '</strong></p>
            </div>
        ';
        }

        return $html;
    }
}
