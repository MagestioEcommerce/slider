<?php

namespace Magestio\Slider\Block\Adminhtml\Form\Renderer\Fieldset;

/**
 * Class Element
 * @package Magestio\Slider\Block\Adminhtml\Form\Renderer\Fieldset
 */
class Element extends \Magento\Backend\Block\Widget\Form\Renderer\Fieldset\Element
{
    /**
     * Initialize block template.
     */
    protected $_template = 'Magestio_Slider::form/renderer/fieldset/element.phtml';

    /**
     * Retrieve the element name.
     *
     * @return string
     */
    public function getElementName()
    {
        return $this->getElement()->getName();
    }

    /**
     * Retrieve element label html.
     *
     * @return string
     */
    public function getElementLabelHtml()
    {
        $element = $this->getElement();
        $label   = $element->getLabel();

        if (!empty($label)) {
            $element->setLabel(__($label));
        }

        return $element->getLabelHtml();
    }

    /**
     * Retrieve the element html.
     *
     * @return string
     */
    public function getElementHtml()
    {
        return $this->getElement()->getElementHtml();
    }
}
