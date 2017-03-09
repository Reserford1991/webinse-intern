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
       /* $errors = array();


        if (!Zend_Validate::is($this->getBlockName(), 'NotEmpty')) {
            $errors[] = Mage::helper('adminhtml')->__('This is required field.');
            Mage::getSingleton('adminhtml/session')->addError($this->__('This is required field.'));
        }
        if (!Zend_Validate::is($this->getBlockName(), 'Regex', array('/^[-_a-zA-Z0-9\/]*$/'))) {
            $errors[] = Mage::helper('adminhtml')->__('This is incorrect.');
            Mage::getSingleton('adminhtml/session')->addError($this->__('This is required field.'));
        }

        if (!in_array($this->getIsAllowed(), array('0', '1'))) {
            $errors[] = Mage::helper('adminhtml')->__('Is Allowed is required field.');
            Mage::getSingleton('adminhtml/session')->addError($this->__('This is required field.'));
        }

        if (empty($errors)) {
            return true;
        }
        return $errors;*/
        $errors = new ArrayObject();

        if (!Zend_Validate::is($this->getName(), 'NotEmpty')) {
            $errors[] = Mage::helper('adminhtml')->__('Name is required field.');
        }

        if (!Zend_Validate::is($this->getDomains(), 'NotEmpty')) {
            $errors[] = Mage::helper('adminhtml')->__('Domain is required field.');
        }

        if (!Zend_Validate::is($this->getContactName(), 'NotEmpty')) {
            $errors[] = Mage::helper('adminhtml')->__('ContactName is required field.');
        }

        if (!Zend_Validate::is($this->getOfficePhone(), 'NotEmpty')) {
            $errors[] = Mage::helper('adminhtml')->__('ContactName is required field.');
        }

        if (!Zend_Validate::is($this->getMobilePhone(), 'NotEmpty')) {
            $errors[] = Mage::helper('adminhtml')->__('Last Name is required field.');
        }

        if (!Zend_Validate::is($this->getStreet(), 'EmailAddress')) {
            $errors[] = Mage::helper('adminhtml')->__('Please enter a valid email.');
        }

        if (!Zend_Validate::is($this->getCity(), 'EmailAddress')) {
            $errors[] = Mage::helper('adminhtml')->__('Please enter a valid email.');
        }

        if (!Zend_Validate::is($this->getState(), 'EmailAddress')) {
            $errors[] = Mage::helper('adminhtml')->__('Please enter a valid email.');
        }

        if (!Zend_Validate::is($this->getZip(), 'EmailAddress')) {
            $errors[] = Mage::helper('adminhtml')->__('Please enter a valid email.');
        }

        if (count($errors) === 0) {
            return true;
        }
        return (array)$errors;
    }
}