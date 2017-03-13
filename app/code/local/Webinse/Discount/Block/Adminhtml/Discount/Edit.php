<?php
/**
 * Webinse
 *
 * PHP Version 5.6.23
 *
 * @category    Webinse
 * @package     Webinse_Discount
 * @author      Webinse Team <info@webinse.com>
 * @copyright   2017 Webinse Ltd. (https://www.webinse.com)
 * @license     http://opensource.org/licenses/OSL-3.0 The Open Software License 3.0
 */
/**
 * Adminhtml Discount edit container block
 *
 * @category    Webinse
 * @package     Webinse_Discount
 * @author      Webinse Team <info@webinse.com>
 * @copyright   2017 Webinse Ltd. (https://www.webinse.com)
 * @license     http://opensource.org/licenses/OSL-3.0 The Open Software License 3.0
 */
class Webinse_discount_Block_Adminhtml_discount_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{
    public function __construct()
    {
        parent::__construct();
        $this->_blockGroup= 'webinse_discount';
        $this->_mode = 'edit';
        $this->_controller = 'adminhtml_discount';
    }

    public function getHeaderText()
    {
        $discount = Mage::registry('current_discount');
        if ($discount->getId()) {
            return Mage::helper('webinse_discount')->__("Edit Discount");
        } else {
            return Mage::helper('webinse_discount')->__("Add new Discount");
        }
    }

    public function getHeaderCssClass()
    {
        return 'icon-head head-discount';
    }
}