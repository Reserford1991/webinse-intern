<?php
/**
 * Webinse
 *
 * PHP Version 5.6.23
 *
 * @category    Webinse
 * @package     Webinse_discount
 * @author      Webinse Team <info@webinse.com>
 * @copyright   2017 Webinse Ltd. (https://www.webinse.com)
 * @license     http://opensource.org/licenses/OSL-3.0 The Open Software License 3.0
 */
/**
 * Backend discount controller
 *
 * @category    Webinse
 * @package     Webinse_discount
 * @author      Webinse Team <info@webinse.com>
 * @copyright   2017 Webinse Ltd. (https://www.webinse.com)
 * @license     http://opensource.org/licenses/OSL-3.0 The Open Software License 3.0
 */
class Webinse_Discount_Adminhtml_Webinse_Discount_IndexController extends Mage_Adminhtml_Controller_Action
{
    public function indexAction()
    {
        $this->loadLayout();
        $this->_setActiveMenu('webinse_discount');
        $this->renderLayout();
        return $this;
    }

    public function massDeleteAction()
    {
        $helper = Mage::helper('webinse_discount');
        $Ids=$this->getRequest()->getParam('entity_id');
        if(!is_array($Ids)) {
            Mage::getSingleton('adminhtml/session')->addError($helper->__('Please select one or more companies.'));
        } else {
            try {
                $discount = Mage::getModel('webinse_discount/discount');
                foreach ($Ids as $Id) {
                    $discount->setId($Id)->delete();
                }
                Mage::getSingleton('adminhtml/session')->addSuccess($helper->__('Records were deleted.')
                );
            } catch (Exception $e) {
                Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
            }
        }

        $this->_redirect('*/*/index');
    }

    public function gridAction()
    {
        $this->loadLayout();
        $this->getResponse()->setBody(
            $this->getLayout()->createBlock('webinse_discount/adminhtml_discount_grid')->toHtml()
        );
    }

}