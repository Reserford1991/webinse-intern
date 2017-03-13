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
class Webinse_Company_Model_Company extends Mage_Core_Model_Abstract
{
    public function _construct()
    {
        parent::_construct();
        $this->_init('webinse_company/company');
    }

    public function validate()
    {
        $error = false;

        if (!Zend_Validate::is(trim($this->getName()), 'NotEmpty')) {
            $error = true;
        }

        if (!Zend_Validate::is(trim($this->getDomains()), 'NotEmpty')) {
            $error = true;
        }

        if (!Zend_Validate::is(trim($this->getContactName()), 'NotEmpty')) {
            $error = true;
        }

        if (!Zend_Validate::is(trim($this->getOfficePhone()), 'NotEmpty')) {
            $error = true;
        }

        if (!Zend_Validate::is(trim($this->getMobilePhone()), 'NotEmpty')) {
            $error = true;
        }

        if (!Zend_Validate::is(trim($this->getStreet()), 'NotEmpty')) {
            $error = true;
        }

        if (!Zend_Validate::is(trim($this->getCity()), 'NotEmpty')) {
            $error = true;
        }

        if (!Zend_Validate::is(trim($this->getState()), 'NotEmpty')) {
            $error = true;
        }

        if (!Zend_Validate::is(trim($this->getZip()), 'NotEmpty')) {
            $error = true;
        }

        if ($error) {
            Mage::throwException('Please fill all required fields');
        }

        return $this;
    }
}