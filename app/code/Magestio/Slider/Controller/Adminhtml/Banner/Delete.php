<?php

namespace Magestio\Slider\Controller\Adminhtml\Banner;

/**
 * Class Delete
 * @package Magestio\Slider\Controller\Adminhtml\Banner
 */
class Delete extends \Magestio\Slider\Controller\Adminhtml\Banner
{
    /**
     * Dispatch request
     * @var \Magento\Framework\View\Result\PageFactory
     */
    public function execute()
    {
        $bannerId = $this->getRequest()->getParam(static::PARAM_ID);

        try {
            $banner = $this->_bannerFactory->create()->setId($bannerId);
            $banner->delete();
            $this->messageManager->addSuccess(__('Delete successfully!'));
        } catch (\Exception $e) {
            $this->messageManager->addError($e->getMessage());
        }
        $resultRedirect = $this->resultRedirectFactory->create();

        return $resultRedirect->setPath('*/*/');
    }
}
