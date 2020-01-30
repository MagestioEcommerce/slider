<?php

namespace Magestio\Slider\Controller\Adminhtml\Slider;

/**
 * Class MassDelete
 * @package Magestio\Slider\Controller\Adminhtml\Slider
 */
class MassDelete extends \Magestio\Slider\Controller\Adminhtml\Slider
{
    /**
     * Dispatch request
     *
     * @var \Magento\Framework\View\Result\PageFactory
     */
    public function execute()
    {
        $sliderIds = $this->getRequest()->getParam('slider');
        
        if (!is_array($sliderIds) || empty($sliderIds)) {
            $this->messageManager->addError(__('Please select slider(s).'));
        } else {
            $sliderCollection = $this->_sliderCollectionFactory->create()
                ->addFieldToFilter('id', ['in' => $sliderIds]);
            try {
                foreach ($sliderCollection as $slider) {
                    $slider->delete();
                }
                $this->messageManager->addSuccess(
                    __('A total of %1 slider(s) have been deleted.', count($sliderIds))
                );
            } catch (\Exception $e) {
                $this->messageManager->addError($e->getMessage());
            }
        }
        $resultRedirect = $this->resultRedirectFactory->create();

        return $resultRedirect->setPath('*/*/');
    }
}
