<?php

namespace Magestio\Slider\Block\Adminhtml\Banner;

use Magento\Backend\Block\Template\Context;
use Magento\Backend\Block\Widget\Grid\Extended;
use Magento\Backend\Helper\Data as HelperBackend;
use Magestio\Slider\Model\ResourceModel\Banner\CollectionFactory as BannerCollectionFactory;
use Magestio\Slider\Model\ResourceModel\Slider\CollectionFactory as SliderCollectionFactory;
use Magestio\Slider\Model\Status;

/**
 * Class Grid
 * @package Magestio\Slider\Block\Adminhtml\Banner
 */
class Grid extends Extended
{
    /**
     * @var BannerCollectionFactory
     */
    protected $_bannerCollectionFactory;

    /**
     * @var SliderCollectionFactory
     */
    protected $_sliderCollectionFactory;

    /**
     * @var Status
     */
    private $_status;

    /**
     * Grid constructor.
     * @param Context $context
     * @param HelperBackend $backendHelper
     * @param BannerCollectionFactory $bannerCollectionFactory
     * @param SliderCollectionFactory $sliderCollectionFactory
     * @param Status $status
     * @param array $data
     */
    public function __construct(
        Context $context,
        HelperBackend $backendHelper,
        BannerCollectionFactory $bannerCollectionFactory,
        SliderCollectionFactory $sliderCollectionFactory,
        Status $status,
        array $data = []
    ) {
        $this->_bannerCollectionFactory = $bannerCollectionFactory;
        $this->_sliderCollectionFactory = $sliderCollectionFactory;
        $this->_status = $status;

        parent::__construct($context, $backendHelper, $data);
    }

    protected function _construct()
    {
        parent::_construct();

        $this->setId('bannerGrid');
        $this->setDefaultSort('id');
        $this->setDefaultDir('ASC');
        $this->setSaveParametersInSession(true);
        $this->setUseAjax(true);
    }

    protected function _prepareCollection()
    {
        /** @var \Magestio\Slider\Model\ResourceModel\Banner\Collection $collection */
        $collection = $this->_bannerCollectionFactory->create();

        $this->setCollection($collection);

        return parent::_prepareCollection();
    }

    /**
     * @return $this
     */
    protected function _prepareColumns()
    {
        $this->addColumn(
            'id',
            [
                'header' => __('Banner ID'),
                'type'   => 'number',
                'index'  => 'id',
                'header_css_class' => 'col-id',
                'column_css_class' => 'col-id',
            ]
        );

        $this->addColumn(
            'slider_id',
            [
                'header' => __('Slider ID'),
                'type'   => 'number',
                'index'  => 'slider_id',
                'header_css_class' => 'col-id',
                'column_css_class' => 'col-id',
            ]
        );

        $this->addColumn(
            'status',
            [
                'header'  => __('Status'),
                'index'   => 'status',
                'type'    => 'options',
                'options' => $this->_status->getAllAvailableStatuses(),
            ]
        );

        $this->addColumn(
            'title',
            [
                'header' => __('Title'),
                'index'  => 'title',
                'width'  => '50px',
            ]
        );

        $this->addColumn(
            'image',
            [
                'header'   => __('Image'),
                'width'    => '50px',
                'filter'   => false,
                'renderer' => 'Magestio\Slider\Block\Adminhtml\Banner\Helper\Renderer\Image',
                'align'  => 'center',
            ]
        );

        $this->addColumn(
            'mobile_image',
            [
                'header'   => __('Mobile Image'),
                'width'    => '50px',
                'filter'   => false,
                'renderer' => 'Magestio\Slider\Block\Adminhtml\Banner\Helper\Renderer\MobileImage',
            ]
        );

        $this->addColumn(
            'valid_from',
            [
                'header'   => __('Valid From'),
                'type'     => 'datetime',
                'index'    => 'valid_from',
                'width'    => '50px',
                'timezone' => true,
            ]
        );

        $this->addColumn(
            'valid_to',
            [
                'header'   => __('Valid To'),
                'type'     => 'datetime',
                'index'    => 'valid_to',
                'width'    => '50px',
                'timezone' => true,
            ]
        );

        $this->addColumn(
            'edit',
            [
                'header'  => __('Edit'),
                'type'    => 'action',
                'getter'  => 'getId',
                'actions' => [
                    [
                        'caption' => __('Edit'),
                        'url'     => ['base' => '*/*/edit'],
                        'field'   => 'id',
                    ],
                ],
                'filter'   => false,
                'sortable' => false,
                'index'    => 'stores',
                'header_css_class' => 'col-action',
                'column_css_class' => 'col-action',
            ]
        );

        return parent::_prepareColumns();
    }

    /**
     * Get slider available option.
     *
     * @return array
     */
    public function getSliderAvailableOption()
    {
        $option = [];

        $sliderCollection = $this->_sliderCollectionFactory->create()->addFieldToSelect(['title']);

        if (count($sliderCollection)) {
            foreach ($sliderCollection as $slider) {
                $option[$slider->getId()] = $slider->getTitle();
            }
        }

        return $option;
    }

    /**
     * Prepare grid massaction actions
     *
     * @return $this
     */
    protected function _prepareMassaction()
    {
        $this->setMassactionIdField('id');

        $this->getMassactionBlock()->setFormFieldName('banner');

        $this->getMassactionBlock()->addItem(
            'delete',
            [
                'label'   => __('Delete'),
                'url'     => $this->getUrl('mslider/*/massDelete'),
                'confirm' => __('Are you sure?'),
            ]
        );

        $status = $this->_status->getAllAvailableStatuses();
        array_unshift($status, ['label' => '', 'value' => '']);
        $this->getMassactionBlock()->addItem(
            'status',
            [
                'label' => __('Change Status'),
                'url'   => $this->getUrl('mslider/*/massStatus', ['_current' => true]),
                'additional' => [
                    'visibility' => [
                        'name'   => 'status',
                        'type'   => 'select',
                        'class'  => 'required-entry',
                        'label'  => __('Status'),
                        'values' => $status,
                    ],
                ],
            ]
        );

        return $this;
    }

    /**
     * Retrieve grid reload url
     *
     * @return string;
     */
    public function getGridUrl()
    {
        return $this->getUrl('*/*/grid', ['_current' => true]);
    }

    /**
     * Return row url for js event handlers
     *
     * @param \Magento\Catalog\Model\Product|\Magento\Framework\DataObject $row
     * @return string
     */
    public function getRowUrl($row)
    {
        return $this->getUrl('*/*/edit', ['id' => $row->getId()]);
    }
}
