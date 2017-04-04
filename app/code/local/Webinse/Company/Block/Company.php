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
 * Block for Webinse_CalendarEvents
 *
 * @category    Webinse
 * @package     Webinse_Company
 * @author      Webinse Team <info@webinse.com>
 * @copyright   2017 Webinse Ltd. (https://www.webinse.com)
 * @license     http://opensource.org/licenses/OSL-3.0 The Open Software License 3.0
 */

class Webinse_Company_Block_Company extends Mage_Core_Block_Template
{
    public function getCustomerCompany()
    {
        $customerCompanyId = Mage::getSingleton('customer/session')->getCustomer()->getCompanyId();
        return $customerCompanyId;
    }

    public function loadCompany()
    {
        $customer = $this->getCustomerCompany();
        $companyInfo = Mage::getModel('webinse_company/company')->load($customer);
        return $companyInfo;
    }

    public function loadAddresses()
    {
        $customer = $this->getCustomerCompany();
        $addressesInfo = Mage::getModel('webinse_company/addresses')->load($customer, 'company_id');
        return $addressesInfo;
    }

}