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
 * Adminhtml grid container block
 *
 * @category    Webinse
 * @package     Webinse_Company
 * @author      Webinse Team <info@webinse.com>
 * @copyright   2017 Webinse Ltd. (https://www.webinse.com)
 * @license     http://opensource.org/licenses/OSL-3.0 The Open Software License 3.0
 */
class Webinse_Company_Block_Adminhtml_Company extends Mage_Adminhtml_Block_Widget_Grid_Container
{
    protected $_blockGroup = 'webinse_company';

    public function __construct()
    {
        $this->_controller = 'adminhtml_company';
        $helper = Mage::helper('webinse_company');
        $this->_headerText = $helper->__('Company Manager');
        $this->_addButtonLabel = $helper->__('Add new company');
        parent::__construct();
    }

}