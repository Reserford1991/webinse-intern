<?php

class Webinse_Company_Block_Adminhtml_Customer_Grid extends Mage_Adminhtml_Block_Customer_Grid
{
    public function setCollection($collection)
    {
        $companies = Mage::getModel('webinse_company/company')->getCollection();
        $collection->joinAttribute('companyName', 'customer/company_id', 'entity_id', null, 'left');
        $this->_collection = $collection;
    }

    protected function _prepareColumns()
    {
        $this->addColumnAfter('companyName', array(
            'header' => Mage::helper('customer')->__('Company Name'),
            'type' => 'text',
            'index' => 'companyName'
        ), 'billing_region');
        return parent::_prepareColumns();
    }
}