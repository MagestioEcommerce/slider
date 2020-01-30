<?php

namespace Magestio\Slider\Controller\Adminhtml;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Backend\Helper\Js;
use Magento\Backend\Model\View\Result\ForwardFactory;
use Magento\Framework\App\Response\Http\FileFactory;
use Magento\Framework\Registry;
use Magento\Framework\View\Result\LayoutFactory;
use Magento\Framework\View\Result\PageFactory;
use Magestio\Slider\Model\BannerFactory;
use Magestio\Slider\Model\ResourceModel\Banner\CollectionFactory as BannerCollectionFactory;
use Magestio\Slider\Model\ResourceModel\Slider\CollectionFactory as SliderCollectionFactory;
use Magestio\Slider\Model\SliderFactory;

/**
 * Class AbstractAction
 * @package Magestio\Slider\Controller\Adminhtml
 */
abstract class AbstractAction extends Action
{
    const PARAM_ID = 'id';

    /**
     * @var Js
     */
    protected $_jsHelper;

    /**
     * @var ForwardFactory
     */
    protected $_resultForwardFactory;

    /**
     * @var LayoutFactory
     */
    protected $_resultLayoutFactory;

    /**
     * @var PageFactory
     */
    protected $_resultPageFactory;

    /**
     * @var BannerFactory
     */
    protected $_bannerFactory;

    /**
     * @var SliderFactory
     */
    protected $_sliderFactory;

    /**
     * @var BannerCollectionFactory
     */
    protected $_bannerCollectionFactory;

    /**
     * @var SliderCollectionFactory
     */
    protected $_sliderCollectionFactory;

    /**
     * @var Registry
     */
    protected $_coreRegistry;

    /**
     * @var FileFactory
     */
    protected $_fileFactory;

    /**
     * AbstractAction constructor.
     * @param Context $context
     * @param Registry $coreRegistry
     * @param FileFactory $fileFactory
     * @param PageFactory $resultPageFactory
     * @param LayoutFactory $resultLayoutFactory
     * @param ForwardFactory $resultForwardFactory
     * @param Js $jsHelper
     * @param BannerFactory $bannerFactory
     * @param SliderFactory $sliderFactory
     * @param BannerCollectionFactory $bannerCollectionFactory
     * @param SliderCollectionFactory $sliderCollectionFactory
     */
    public function __construct(
        Context $context,
        Registry $coreRegistry,
        FileFactory $fileFactory,
        PageFactory $resultPageFactory,
        LayoutFactory $resultLayoutFactory,
        ForwardFactory $resultForwardFactory,
        Js $jsHelper,
        BannerFactory $bannerFactory,
        SliderFactory $sliderFactory,
        BannerCollectionFactory $bannerCollectionFactory,
        SliderCollectionFactory $sliderCollectionFactory
    ) {
        parent::__construct($context);

        $this->_coreRegistry = $coreRegistry;
        $this->_fileFactory = $fileFactory;
        $this->_resultPageFactory = $resultPageFactory;
        $this->_resultLayoutFactory = $resultLayoutFactory;
        $this->_resultForwardFactory = $resultForwardFactory;
        $this->_jsHelper = $jsHelper;
        $this->_bannerFactory = $bannerFactory;
        $this->_sliderFactory = $sliderFactory;
        $this->_bannerCollectionFactory = $bannerCollectionFactory;
        $this->_sliderCollectionFactory = $sliderCollectionFactory;
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
        $back = $this->getRequest()->getParam('back');

        switch ($back) {
            case 'new':
                $resultRedirect->setPath('*/*/new', ['_current' => true]);
                break;
            case 'edit':
                $resultRedirect->setPath('*/*/edit', ['id' => $paramId, '_current' => true]);
                break;
            default:
                $resultRedirect->setPath('*/*/');
        }

        return $resultRedirect;
    }
}
