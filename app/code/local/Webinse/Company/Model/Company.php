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
        $errors = array();

        if (!Zend_Validate::is($this->getBlockName(), 'NotEmpty')) {
            $errors[] = Mage::helper('adminhtml')->__('This is required field.');
        }
        if (!Zend_Validate::is($this->getBlockName(), 'Regex', array('/^[-_a-zA-Z0-9\/]*$/'))) {
            $errors[] = Mage::helper('adminhtml')->__('This is incorrect.');
        }

        if (!in_array($this->getIsAllowed(), array('0', '1'))) {
            $errors[] = Mage::helper('adminhtml')->__('Is Allowed is required field.');
        }

        if (empty($errors)) {
            return true;
        }
        return $errors;
    }
}