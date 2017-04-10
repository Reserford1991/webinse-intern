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
 * Block rewrite for Webinse_Company
 *
 * @category    Webinse
 * @package     Webinse_Company
 * @author      Webinse Team <info@webinse.com>
 * @copyright   2017 Webinse Ltd. (https://www.webinse.com)
 * @license     http://opensource.org/licenses/OSL-3.0 The Open Software License 3.0
 */
class Webinse_Company_Block_Shipping extends Mage_Checkout_Block_Onepage_Shipping
{
    public function getCustomerCompany()
    {
        return Mage::getSingleton('customer/session')->getCustomer()->getCompanyId();
    }

    public function loadCompany()
    {
        return Mage::getModel('webinse_company/company')->load($this->getCustomerCompany());
    }

    public function loadAddresses()
    {
        return Mage::getModel('webinse_company/addresses')->load($this->getCustomerCompany(), 'company_id');
    }

    public function getRegionName()
    {
        if (!$this->loadAddresses()->getRegion()){
            return $this->loadAddresses()->getRegionId();
        }
        return Mage::getModel('directory/region')->load($this->loadAddresses()->getRegion())->getName();
    }

    public function getCountryName()
    {
        return Mage::getModel('directory/country')->loadByCode($this->loadAddresses()->getCountry())->getName();
    }
}
