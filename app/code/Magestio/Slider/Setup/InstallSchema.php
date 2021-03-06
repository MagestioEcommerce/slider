<?php

namespace Magestio\Slider\Setup;

use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;

/**
 * Class InstallSchema
 * @package Magestio\Slider\Setup
 */
class InstallSchema implements InstallSchemaInterface
{
    /**
     * Installs DB schema for module
     *
     * @param SchemaSetupInterface $setup
     * @param ModuleContextInterface $context
     * @return void
     * @throws \Zend_Db_Exception
     */
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $installer = $setup;

        $installer->startSetup();

        // Get magestio_slider_banners table
        $tableName = $installer->getTable('magestio_slider_banners');

        // Check if the table already exists
        if ($installer->getConnection()->isTableExists($tableName) != true) {

            /*
             * Create table magestio_slider_banners
             */

            $table = $installer->getConnection()->newTable(
                $tableName
            )->addColumn(
                'id',
                \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                null,
                ['identity' => true, 'unsigned' => true, 'nullable' => false, 'primary' => true],
                'Banner Id'
            )->addColumn(
                'status',
                \Magento\Framework\DB\Ddl\Table::TYPE_SMALLINT,
                null,
                ['nullable' => false, 'default' => '0'],
                'Banner Status'
            )->addColumn(
                'title',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                255,
                ['nullable' => false, 'default' => ''],
                'Banner Title'
            )->addColumn(
                'show_title',
                \Magento\Framework\DB\Ddl\Table::TYPE_SMALLINT,
                null,
                ['nullable' => true, 'default' => '0'],
                'Show Banner Title'
            )->addColumn(
                'description',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                '64k',
                ['nullable' => true, 'default' => ''],
                'Banner Description'
            )->addColumn(
                'show_description',
                \Magento\Framework\DB\Ddl\Table::TYPE_SMALLINT,
                null,
                ['nullable' => true, 'default' => '0'],
                'Show Banner Description'
            )->addColumn(
                'banner_type',
                \Magento\Framework\DB\Ddl\Table::TYPE_SMALLINT,
                null,
                ['nullable' => true, 'default' => '0'],
                'Banner Type'
            )->addColumn(
                'slider_id',
                \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                null,
                ['nullable' => true],
                'Slider Id'
            )->addColumn(
                'url',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                255,
                ['nullable' => true, 'default' => ''],
                'Banner Url'
            )->addColumn(
                'target',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                50,
                ['nullable' => true, 'default' => '_blank'],
                'Banner Url Target'
            )->addColumn(
                'video',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                '64k',
                ['nullable' => true, 'default' => ''],
                'Banner Video'
            )->addColumn(
                'image',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                255,
                ['nullable' => true],
                'Banner Image'
            )->addColumn(
                'mobile_image',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                255,
                ['nullable' => true],
                'Mobile Image'
            )->addColumn(
                'custom',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                '64k',
                ['nullable' => true, 'default' => ''],
                'Banner Custom HTML'
            )->addColumn(
                'alt_text',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                255,
                ['nullable' => true],
                'Banner Image Alt Text'
            )->addColumn(
                'button_text',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                255,
                ['nullable' => true],
                'Button Text'
            )->addColumn(
                'custom_content',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                '64k',
                ['nullable' => true],
                'Custom Content'
            )->addColumn(
                'custom_css',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                null,
                ['nullable' => true],
                'Custom CSS'
            )->addColumn(
                'valid_from',
                \Magento\Framework\DB\Ddl\Table::TYPE_DATETIME,
                null,
                ['nullable' => true],
                'Banner Valid From'
            )->addColumn(
                'valid_to',
                \Magento\Framework\DB\Ddl\Table::TYPE_DATETIME,
                null,
                ['nullable' => true],
                'Banner Valid To'
            )->addColumn(
                'sort_order',
                \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                null,
                ['nullable' => true],
                'Banner Sort Ordert'
            )->addColumn(
                'created_at',
                \Magento\Framework\DB\Ddl\Table::TYPE_TIMESTAMP,
                null,
                ['nullable' => false, 'default' => \Magento\Framework\DB\Ddl\Table::TIMESTAMP_INIT],
                'Created at'
            )->addColumn(
                'updated_at',
                \Magento\Framework\DB\Ddl\Table::TYPE_TIMESTAMP,
                null,
                ['nullable' => false, 'default' => \Magento\Framework\DB\Ddl\Table::TIMESTAMP_INIT_UPDATE],
                'Updated at'
            )->addIndex(
                $installer->getIdxName('magestio_slider_banners', ['id']),
                ['id']
            )->addIndex(
                $installer->getIdxName('magestio_slider_banners', ['status']),
                ['status']
            )->addIndex(
                $installer->getIdxName('magestio_slider_banners', ['slider_id']),
                ['slider_id']
            )->addIndex(
                $installer->getIdxName('magestio_slider_banners', ['valid_from']),
                ['valid_from']
            )->addIndex(
                $installer->getIdxName('magestio_slider_banners', ['valid_to']),
                ['valid_to']
            );

            $installer->getConnection()->createTable($table);
        }

        /*
         * Create table magestio_slider_sliders
         */

        // Get magestio_slider_sliders table
        $tableName = $installer->getTable('magestio_slider_sliders');

        // Check if the table already exists
        if ($installer->getConnection()->isTableExists($tableName) != true) {
            $table = $installer->getConnection()->newTable(
                $tableName
            )->addColumn(
                'id',
                \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                null,
                ['identity' => true, 'unsigned' => true, 'nullable' => false, 'primary' => true],
                'ID'
            )->addColumn(
                'status',
                \Magento\Framework\DB\Ddl\Table::TYPE_SMALLINT,
                null,
                ['nullable' => true, 'default' => '0'],
                'Slider Status'
            )->addColumn(
                'title',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                255,
                ['nullable' => false, 'default' => 'Custom Slider'],
                'Slider Title'
            )->addColumn(
                'show_title',
                \Magento\Framework\DB\Ddl\Table::TYPE_SMALLINT,
                null,
                ['nullable' => true, 'default' => '0'],
                'Show Title'
            )->addColumn(
                'slider_content',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                '64k',
                ['nullable' => true, 'default' => ''],
                'Slider Content'
            )->addColumn(
                'scheduled_ajax',
                \Magento\Framework\DB\Ddl\Table::TYPE_SMALLINT,
                null,
                ['nullable' => true, 'unsigned' => true, 'default' => 0],
                'Ajax Calls required for Scheduled Banners'
            )->addColumn(
                'nav',
                \Magento\Framework\DB\Ddl\Table::TYPE_SMALLINT,
                null,
                ['nullable' => true, 'default' => '1'],
                'Navigation'
            )->addColumn(
                'dots',
                \Magento\Framework\DB\Ddl\Table::TYPE_SMALLINT,
                null,
                ['nullable' => true, 'default' => '1'],
                'Dots'
            )->addColumn(
                'center',
                \Magento\Framework\DB\Ddl\Table::TYPE_SMALLINT,
                null,
                ['nullable' => true, 'default' => '1'],
                'Center'
            )->addColumn(
                'items',
                \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                null,
                ['nullable' => true, 'default' => '1'],
                'Items'
            )->addColumn(
                'loop',
                \Magento\Framework\DB\Ddl\Table::TYPE_SMALLINT,
                null,
                ['nullable' => true, 'default' => '1'],
                'Loop'
            )->addColumn(
                'margin',
                \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                null,
                ['nullable' => true, 'default' => '0'],
                'Margin'
            )->addColumn(
                'stagePadding',
                \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                null,
                ['nullable' => true, 'default' => '0'],
                'StagePadding'
            )->addColumn(
                'lazyLoad',
                \Magento\Framework\DB\Ddl\Table::TYPE_SMALLINT,
                null,
                ['nullable' => true, 'default' => '1'],
                'LazyLoad'
            )->addColumn(
                'transition',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                255,
                ['nullable' => true, 'default' => 'fadeOut'],
                'Transition'
            )->addColumn(
                'autoplay',
                \Magento\Framework\DB\Ddl\Table::TYPE_SMALLINT,
                null,
                ['nullable' => true, 'default' => '1'],
                'Autoplay'
            )->addColumn(
                'autoplayTimeout',
                \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                null,
                ['nullable' => true, 'default' => '3000'],
                'AutoplayTimeout'
            )->addColumn(
                'autoplayHoverPause',
                \Magento\Framework\DB\Ddl\Table::TYPE_SMALLINT,
                null,
                ['nullable' => true, 'default' => '1'],
                'AutoplayHoverPause'
            )->addColumn(
                'autoHeight',
                \Magento\Framework\DB\Ddl\Table::TYPE_SMALLINT,
                null,
                ['nullable' => true, 'default' => '1'],
                'AutoHeight'
            )->addColumn(
                'nav_brk1',
                \Magento\Framework\DB\Ddl\Table::TYPE_SMALLINT,
                null,
                ['nullable' => true, 'default' => '1'],
                'Breakpoint 1 Nav'
            )->addColumn(
                'items_brk1',
                \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                null,
                ['nullable' => true, 'default' => '1'],
                'Breakpoint 1 Items'
            )->addColumn(
                'nav_brk2',
                \Magento\Framework\DB\Ddl\Table::TYPE_SMALLINT,
                null,
                ['nullable' => true, 'default' => '1'],
                'Breakpoint 2 Nav'
            )->addColumn(
                'items_brk2',
                \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                null,
                ['nullable' => true, 'default' => '1'],
                'Breakpoint 2 Items'
            )->addColumn(
                'nav_brk3',
                \Magento\Framework\DB\Ddl\Table::TYPE_SMALLINT,
                null,
                ['nullable' => true, 'default' => '1'],
                'Breakpoint 3 Nav'
            )->addColumn(
                'items_brk3',
                \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                null,
                ['nullable' => true, 'default' => '1'],
                'Breakpoint 3 Items'
            )->addColumn(
                'nav_brk4',
                \Magento\Framework\DB\Ddl\Table::TYPE_SMALLINT,
                null,
                ['nullable' => true, 'default' => '1'],
                'Breakpoint 4 Nav'
            )->addColumn(
                'items_brk4',
                \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                null,
                ['nullable' => true, 'default' => '1'],
                'Breakpoint 4 Items'
            )->addColumn(
                'created_at',
                \Magento\Framework\DB\Ddl\Table::TYPE_TIMESTAMP,
                null,
                ['nullable' => false, 'default' => \Magento\Framework\DB\Ddl\Table::TIMESTAMP_INIT],
                'Created at'
            )->addColumn(
                'updated_at',
                \Magento\Framework\DB\Ddl\Table::TYPE_TIMESTAMP,
                null,
                ['nullable' => false, 'default' => \Magento\Framework\DB\Ddl\Table::TIMESTAMP_INIT_UPDATE],
                'Updated at'
            )->addIndex(
                $installer->getIdxName('magestio_slider_sliders', ['id']),
                ['status']
            )->addIndex(
                $installer->getIdxName('magestio_slider_sliders', ['status']),
                ['status']
            );

            $installer->getConnection()->createTable($table);
        }
        $installer->endSetup();
    }
}
