<?php

namespace Magestio\Slider\Controller\Adminhtml\Slider;

/**
 * Class Delete
 * @package Magestio\Slider\Controller\Adminhtml\Slider
 */
class Delete extends \Magestio\Slider\Controller\Adminhtml\Slider
{
    /**
     * Dispatch request
     */
    public function execute()
    {
        $sliderId = $this->getRequest()->getParam(static::PARAM_ID);
        try {
            $slider = $this->_sliderFactory->create()->setId($sliderId);
            $slider->delete();
            $this->messageManager->addSuccess(
                __('Delete successfully !')
            );
        } catch (\Exception $e) {
            $this->messageManager->addError($e->getMessage());
        }
        $resultRedirect = $this->resultRedirectFactory->create();

        return $resultRedirect->setPath('*/*/');
    }
}
