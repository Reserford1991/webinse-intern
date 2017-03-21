<?php
/**
 * Webinse
 *
 * PHP Version 5.6.23
 *
 * @category    Webinse
 * @package     Webinse_Company
 * @author      Webinse Team <info@webinse.com>
 * @copyright   2017 Webinse Ltd. (https://www.webinse.com)
 * @license     http://opensource.org/licenses/OSL-3.0 The Open Software License 3.0
 */
/**
 * Customer grid container block rewrite
 *
 * @category    Webinse
 * @package     Webinse_Company
 * @author      Webinse Team <info@webinse.com>
 * @copyright   2017 Webinse Ltd. (https://www.webinse.com)
 * @license     http://opensource.org/licenses/OSL-3.0 The Open Software License 3.0
 */
class Webinse_Company_Block_Adminhtml_Customer_Grid extends Mage_Adminhtml_Block_Customer_Grid
{
    public function setCollection($collection)
    {
        $companies = Mage::getModel('webinse_company/company')->getCollection();
        $collection->joinAttribute('company_id', 'customer/company_id', 'entity_id', null, 'left')
           ->joinTable(
                'webinse_company', 'entity_id = company_id ', array('company_name' => 'name'), null, 'left'
            );
        parent::setCollection($collection);
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