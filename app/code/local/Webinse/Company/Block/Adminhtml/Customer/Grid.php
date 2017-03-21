<?php

class Webinse_Company_Block_Adminhtml_Customer_Grid extends Mage_Adminhtml_Block_Customer_Grid
{
    public function setCollection($collection)
    {
        $companies = Mage::getModel('webinse_company/company')->getCollection();
        $collection->joinAttribute('company_id', 'customer/company_id', 'entity_id', null, 'left')
           ->joinTable(
                'webinse_company', 'entity_id = company_id ', array('company_name' => 'name'), null, 'left'
            );
        $this->_collection = $collection;
    }

    protected function _prepareColumns()
    {
        $this->addColumnAfter('company_name', array(
            'header' => Mage::helper('customer')->__('Company Name'),
            'type' => 'text',
            'index' => 'company_name'
        ), 'billing_region');
        return parent::_prepareColumns();
    }
}