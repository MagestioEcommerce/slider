<?php

namespace Magestio\Slider\Controller\Adminhtml\Slider;

/**
 * Class MassStatus
 * @package Magestio\Slider\Controller\Adminhtml\Slider
 */
class MassStatus extends \Magestio\Slider\Controller\Adminhtml\Slider
{
    /**
     * Dispatch request
     *
     * @var \Magento\Framework\View\Result\PageFactory
     */
    public function execute()
    {
        $sliderIds = $this->getRequest()->getParam('slider');
        $status = $this->getRequest()->getParam('status');
        
        if (!is_array($sliderIds) || empty($sliderIds)) {
            $this->messageManager->addError(__('Please select slider(s).'));
        } else {
            try {
                $sliderCollection = $this->_sliderCollectionFactory->create()
                    ->addFieldToFilter('id', ['in' => $sliderIds]);

                foreach ($sliderCollection as $slider) {
                    $slider->setStatus($status)
                        ->setIsMassupdate(true)
                        ->save();
                }
                $this->messageManager->addSuccess(
                    __('A total of %1 slider(s) status have been changed.', count($sliderIds))
                );
            } catch (\Exception $e) {
                $this->messageManager->addError($e->getMessage());
            }
        }
        $resultRedirect = $this->resultRedirectFactory->create();

        return $resultRedirect->setPath('*/*/');
    }
}
