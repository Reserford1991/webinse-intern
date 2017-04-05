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
        //$customer = Mage::getSingleton('customer/session')->getCustomer()->getCompanyId();
        return Mage::getSingleton('customer/session')->getCustomer()->getCompanyId();
    }

    public function loadCompany()
    {
        //$company = Mage::getModel('webinse_company/company')->load($this->getCustomerCompany());
        return Mage::getModel('webinse_company/company')->load($this->getCustomerCompany());
    }

    public function loadAddresses()
    {
        return Mage::getModel('webinse_company/addresses')->load($this->getCustomerCompany(), 'company_id');
    }

    public function getCountryHtmlSelect($type)
    {
        $countryId = Mage::getModel('webinse_company/company')->load($this->getCustomerCompany())->getState();
        if (is_null($countryId)) {
            $countryId = Mage::helper('core')->getDefaultCountry();
        }
        $select = $this->getLayout()->createBlock('core/html_select')
            ->setName($type.'[country_id]')
            ->setId($type.':country_id')
            ->setTitle(Mage::helper('checkout')->__('Country'))
            ->setClass('validate-select')
            ->setValue($countryId)
            ->setOptions($this->getCountryOptions());
        if ($type === 'shipping') {
            $select->setExtraParams('onchange="if(window.shipping)shipping.setSameAsBilling(false);"');
        }

        return $select->getHtml();
    }

}
