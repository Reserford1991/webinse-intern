<?php
/**
 * Webinse
 *
 * PHP Version 5.6.23
 *
 * @category    Webinse
 * @package     Webinse_Discount
 * @author      Webinse Team <info@webinse.com>
 * @copyright   2017 Webinse Ltd. (https://www.webinse.com)
 * @license     http://opensource.org/licenses/OSL-3.0 The Open Software License 3.0
 */
/**
 * Adminhtml grid block
 *
 * @category    Webinse
 * @package     Webinse_Discount
 * @author      Webinse Team <info@webinse.com>
 * @copyright   2017 Webinse Ltd. (https://www.webinse.com)
 * @license     http://opensource.org/licenses/OSL-3.0 The Open Software License 3.0
 */
class Webinse_Discount_Block_Adminhtml_Discount_Grid extends Mage_Adminhtml_Block_Widget_Grid
{

    public function __construct()
    {
        parent::__construct();
        $this->setId('discountGrid');
        $this->setUseAjax(true);
        $this->setDefaultSort('entity_id');
        $this->setSaveParametersInSession(true);
    }

    protected function _prepareCollection()
    {
        $collection=Mage::getModel('webinse_discount/discount')->getCollection();
        $collection->joinProducts($collection);
        $this->setCollection($collection);
        return parent::_prepareCollection();
    }

    protected function _prepareColumns()
    {
        $helper = Mage::helper('webinse_discount');

        $this->addColumn('entity_id', array(
            'header'        => $helper->__('ID'),
            'width'         => 50,
            'align'         => 'right',
            'filter_index'  => 'main_table.entity_id',
            'index'         => 'entity_id',
            'type'          => 'number',
        ));

        $this->addColumn('product_name', array(
            'header'        => $helper->__('Product Name'),
            'align'         => 'left',
            'index'         => 'product_name',
            'filter_index'  => 'product_name',
            'type'          => 'text',
        ));

        $this->addColumn('sku', array(
            'header'        => $helper->__('Product SKU'),
            'align'         => 'left',
            'index'         => 'sku',
            'filter_index'  => 'sku',
            'type'          => 'text',
        ));

        $this->addColumn('qty_products', array(
            'header'        => $helper->__('QTY'),
            'align'         => 'left',
            'index'         => 'qty_products',
            'filter_index'  => 'qty_products',
            'type'          => 'text',
        ));

        $this->addColumn('item_price', array(
            'header'        => $helper->__('Item Price'),
            'align'         => 'left',
            'index'         => 'item_price',
            'filter_index'  => 'item_price',
            'type'          => 'text',
        ));

        $this->addColumn('subtotal', array(
            'header'        => $helper->__('Subtotal'),
            'align'         => 'left',
            'index'         => 'subtotal',
            'filter_index'  => 'subtotal',
            'type'          => 'text',
        ));

        return parent::_prepareColumns();
    }

    protected function _prepareMassaction()
    {
        $helper = Mage::helper('webinse_discount');
        $this->setMassactionIdField('entity_id');
        $this->getMassactionBlock()->setFormFieldName('entity_id');
        $this->getMassactionBlock()->addItem('delete', array(
            'label'         => $helper->__('Delete'),
            'url'           => $this->getUrl('*/*/massDelete')
        ));
        return $this;
    }

    public function getGridUrl()
    {
        return $this->getUrl('*/*/grid', array('_current'=>true));
    }

}