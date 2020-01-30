<?php

namespace Magestio\Slider\Block\Adminhtml\Slider\Edit\Tab\Helper\Renderer;

use Magento\Backend\Block\Context;
use Magento\Backend\Block\Widget\Grid\Column\Renderer\AbstractRenderer;
use Magento\Store\Model\StoreManagerInterface;
use Magestio\Slider\Model\BannerFactory;

/**
 * Class EditBanner
 * @package Magestio\Slider\Block\Adminhtml\Slider\Edit\Tab\Helper\Renderer
 */
class EditBanner extends AbstractRenderer
{

    /**
     * @var StoreManagerInterface
     */
    protected $_storeManager;

    /**
     * @var BannerFactory
     */
    protected $_bannerFactory;

    /**
     * EditBanner constructor.
     * @param Context $context
     * @param StoreManagerInterface $storeManager
     * @param BannerFactory $bannerFactory
     * @param array $data
     */
    public function __construct(
        Context $context,
        StoreManagerInterface $storeManager,
        BannerFactory $bannerFactory,
        array $data = []
    ) {
        parent::__construct($context, $data);
        $this->_storeManager = $storeManager;
        $this->_bannerFactory = $bannerFactory;
    }

    /**
     * Render action.
     *
     * @param \Magento\Framework\DataObject $row
     *
     * @return string
     */
    public function render(\Magento\Framework\DataObject $row)
    {
        return '<a href="' . $this->getUrl('*/banner/edit', ['_current' => false, 'id' => $row->getId()])
            . '" target="_blank">Edit</a> ';
    }
}
