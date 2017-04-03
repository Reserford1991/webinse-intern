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
 * Business model Company
 *
 * @category    Webinse
 * @package     Webinse_Company
 * @author      Webinse Team <info@webinse.com>
 * @copyright   2017 Webinse Ltd. (https://www.webinse.com)
 * @license     http://opensource.org/licenses/OSL-3.0 The Open Software License 3.0
 */
class Webinse_Company_Model_Addresses extends Mage_Core_Model_Abstract
{
    public function _construct()
    {
        parent::_construct();
        $this->_init('webinse_company/addresses');
    }

    public function validate()
    {
        $error = false;

        if (!Zend_Validate::is($this->getFirstName(), 'Regex', array('/^[a-zA-Z0-9]+$/'))) {
            $error = true;
        }

        if (!Zend_Validate::is($this->getLastName(), 'Regex', array('/^[a-zA-Z0-9]+$/'))) {
            $error = true;
        }

        if (!Zend_Validate::is($this->getStreetAddress(), 'Regex', array('/^[a-zA-Z0-9]+$/'))) {
            $error = true;
        }

        if (!Zend_Validate::is($this->getCity(), 'Regex', array('/^[a-zA-Z0-9]+$/'))) {
            $error = true;
        }

        if (!Zend_Validate::is($this->getStateProvinse(), 'Regex', array('/^[a-zA-Z0-9]+$/'))) {
            $error = true;
        }

        if (!Zend_Validate::is($this->getZipCode(), 'Regex', array('/^[0-9]+$/'))) {
            $error = true;
        }

        if (!Zend_Validate::is($this->getTelephone(), 'Regex', array('/^[0-9]+$/'))) {
            $error = true;
        }

        if (!Zend_Validate::is($this->getFax(), 'Regex', array('/^[0-9]+$/'))) {
            $error = true;
        }

        if (!Zend_Validate::is($this->getVatNumber(), 'Regex', array('/^[a-zA-Z0-9]+$/'))) {
            $error = true;
        }

        if ($error) {
            Mage::throwException('Please fill all required fields for addresses correctly');
        }

        return $this;
    }
}