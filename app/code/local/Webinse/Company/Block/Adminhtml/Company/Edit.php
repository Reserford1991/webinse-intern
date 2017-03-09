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
 * Adminhtml faq edit container block
 *
 * @category    Webinse
 * @package     Webinse_Company
 * @author      Webinse Team <info@webinse.com>
 * @copyright   2017 Webinse Ltd. (https://www.webinse.com)
 * @license     http://opensource.org/licenses/OSL-3.0 The Open Software License 3.0
 */
class Webinse_Company_Block_Adminhtml_Company_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{

    public function __construct()
    {
        parent::__construct();
        $this-> _blockGroup= 'webinse_company';
        $this->_mode = 'edit';
        $this->_controller = 'adminhtml_company';
        $company_id = (int)Mage::registry('current_company')->getId();
        $company = Mage::getModel('webinse_company/company')->load($company_id);
    }

    public function getHeaderText()
    {
        $company = Mage::registry('current_company');
        if ($company->getId()) {
            return Mage::helper('webinse_company')->__("Edit Company");
        } else {
            return Mage::helper('webinse_company')->__("Add new Company");
        }
    }

    public function getHeaderCssClass()
    {
        return 'icon-head head-company';
    }

}