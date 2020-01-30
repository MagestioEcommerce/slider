<?php

namespace Magestio\Slider\Controller\Adminhtml;

use Magestio\Slider\Controller\Adminhtml\AbstractAction;

/**
 * Class Banner
 * @package Magestio\Slider\Controller\Adminhtml
 */
abstract class Banner extends AbstractAction
{
    const PARAM_ID = 'id';

    /**
     * Check if admin has permissions to visit banner pages.
     *
     * @return bool
     */
    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('Magestio_Slider::menu_slider_manage');
    }

    /**
     * Get result redirect after add/edit action
     *
     * @param \Magento\Framework\Controller\Result\Redirect $resultRedirect
     * @param null                                          $paramCrudId
     * @return \Magento\Framework\Controller\Result\Redirect
     */
    protected function _getResultRedirect(\Magento\Framework\Controller\Result\Redirect $resultRedirect, $paramId = null)
    {
        switch ($this->getRequest()->getParam('back')) {
            case 'new':
                $resultRedirect->setPath('*/*/new', ['_current' => true]);
                break;
            case 'edit':
                $resultRedirect->setPath(
                    '*/*/edit',
                    [
                        static::PARAM_ID   => $paramId,
                        '_current'         => true,
                        'loaded_slider_id' => $this->getRequest()->getParam('loaded_slider_id'),
                        'saveandclose'     => $this->getRequest()->getParam('saveandclose'),
                    ]
                );
                break;
            default:
                $resultRedirect->setPath('*/*/');
        }

        return $resultRedirect;
    }
}
