<?php

namespace Magestio\Slider\Controller\Adminhtml\Banner;

/**
 * Class MassStatus
 * @package Magestio\Slider\Controller\Adminhtml\Banner
 */
class MassStatus extends \Magestio\Slider\Controller\Adminhtml\Banner
{
    /**
     * Dispatch request
     *
     * @var \Magento\Framework\View\Result\PageFactory
     */
    public function execute()
    {
        $bannerIds = $this->getRequest()->getParam('banner');
        $status = $this->getRequest()->getParam('status');

        if (!is_array($bannerIds) || empty($bannerIds)) {
            $this->messageManager->addError(__('Please select banner(s).'));
        } else {
            $bannerCollection = $this->_bannerCollectionFactory->create()
                ->addFieldToFilter('id', ['in' => $bannerIds]);
            try {
                foreach ($bannerCollection as $banner) {
                    $banner->setStatus($status)
                        ->setIsMassupdate(true)
                        ->save();
                }
                $this->messageManager->addSuccess(
                    __('A total of %1 banner(s) status have been changed.', count($bannerIds))
                );
            } catch (\Exception $e) {
                $this->messageManager->addError($e->getMessage());
            }
        }
        $resultRedirect = $this->resultRedirectFactory->create();

        return $resultRedirect->setPath('*/*/', ['store' => $this->getRequest()->getParam('store')]);
    }
}
