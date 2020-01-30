<?php

namespace Magestio\Slider\Block\Adminhtml\Banner\Helper\Renderer;

use Magento\Backend\Block\Context;
use Magento\Backend\Block\Widget\Grid\Column\Renderer\AbstractRenderer;
use Magento\Store\Model\StoreManagerInterface;
use Magestio\Slider\Model\BannerFactory;

/**
 * Class MobileImage
 * @package Magestio\Slider\Block\Adminhtml\Banner\Helper\Renderer
 */
class MobileImage extends AbstractRenderer
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
     * Image constructor.
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

        $this->_storeManager  = $storeManager;
        $this->_bannerFactory = $bannerFactory;
    }

    /**
     * Render action.
     *
     * @param \Magento\Framework\DataObject $row
     *
     * @return string
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function render(\Magento\Framework\DataObject $row)
    {
        $banner = $this->_bannerFactory->create()->load($row->getId());

        $imageSrc = $this->_storeManager->getStore()->getBaseUrl(\Magento\Framework\UrlInterface::URL_TYPE_MEDIA)
            . $banner->getMobileImage();

        return '<image width="150" src ="' . $imageSrc . '" alt="' . $banner->getMobileImage() . '" >';
    }
}
