<?php

namespace Magestio\Slider\Block\Adminhtml\Slider;

use Magento\Backend\Block\Template\Context;
use Magento\Backend\Block\Widget\Grid\Extended as GridExtended;
use Magento\Backend\Helper\Data as HelperBackend;
use Magestio\Slider\Helper\Data as HelperSlider;
use Magestio\Slider\Model\ResourceModel\Slider\CollectionFactory as SliderCollectionFactory;
use Magestio\Slider\Model\Status;

/**
 * Class Grid
 * @package Magestio\Slider\Block\Adminhtml\Slider
 */
class Grid extends GridExtended
{
    /**
     * @var SliderCollectionFactory
     */
    protected $_sliderCollectionFactory;

    /**
     * @var HelperSlider
     */
    protected $_bannersliderHelper;

    /**
     * @var Status
     */
    private $_status;

    /**
     * Grid constructor.
     * @param Context $context
     * @param HelperBackend $backendHelper
     * @param SliderCollectionFactory $sliderCollectionFactory
     * @param HelperSlider $bannersliderHelper
     * @param Status $status
     * @param array $data
     */
    public function __construct(
        Context $context,
        HelperBackend $backendHelper,
        SliderCollectionFactory $sliderCollectionFactory,
        HelperSlider $bannersliderHelper,
        Status $status,
        array $data = []
    ) {
        parent::__construct($context, $backendHelper, $data);

        $this->_sliderCollectionFactory = $sliderCollectionFactory;
        $this->_bannersliderHelper = $bannersliderHelper;
        $this->_status = $status;
    }

    /**
     * Internal constructor, that is called from real constructor
     * @return void
     */
    protected function _construct()
    {
        parent::_construct();

        $this->setId('sliderGrid');
        $this->setDefaultSort('id');
        $this->setDefaultDir('ASC');
        $this->setSaveParametersInSession(true);
        $this->setUseAjax(true);
    }

    /**
     * Prepare collection.
     *
     * @return [type] [description]
     */
    protected function _prepareCollection()
    {
        $collection = $this->_sliderCollectionFactory->create();
        $this->setCollection($collection);

        return parent::_prepareCollection();
    }

    /**
     * @return $this
     * @throws \Exception
     */
    protected function _prepareColumns()
    {
        $this->addColumn(
            'id',
            [
                'header' => __('Slider ID'),
                'type'   => 'number',
                'index'  => 'id',
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
                'class'  => 'xxx',
                'width'  => '50px',
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
                        'url' => [
                            'base' => '*/*/edit',
                        ],
                        'field' => 'id',
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
     * @return $this
     */
    protected function _prepareMassaction()
    {
        $this->setMassactionIdField('id');
        $this->getMassactionBlock()->setFormFieldName('slider');

        $this->getMassactionBlock()->addItem(
            'delete',
            [
                'label' => __('Delete'),
                'url' => $this->getUrl('mslider/*/massDelete'),
                'confirm' => __('Are you sure?'),
            ]
        );

        $status = $this->_status->getAllAvailableStatuses();
        $this->getMassactionBlock()->addItem(
            'status',
            [
                'label' => __('Change status'),
                'url' => $this->getUrl('mslider/*/massStatus', ['_current' => true]),
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
     * @return string
     */
    public function getGridUrl()
    {
        return $this->getUrl('*/*/grid', ['_current' => true]);
    }

    /**
     * get row url
     * @param  object $row
     * @return string
     */
    public function getRowUrl($row)
    {
        return $this->getUrl(
            '*/*/edit',
            ['id' => $row->getId()]
        );
    }
}
