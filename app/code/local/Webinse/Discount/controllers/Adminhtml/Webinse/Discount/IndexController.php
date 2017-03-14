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
 * Backend discount controller
 *
 * @category    Webinse
 * @package     Webinse_Discount
 * @author      Webinse Team <info@webinse.com>
 * @copyright   2017 Webinse Ltd. (https://www.webinse.com)
 * @license     http://opensource.org/licenses/OSL-3.0 The Open Software License 3.0
 */
class Webinse_Discount_Adminhtml_Webinse_Discount_IndexController extends Mage_Adminhtml_Controller_Action
{
    protected function _initDiscount()
    {
        $helper = Mage::helper('webinse_discount');
        $this->_title($helper->__('Webinse'))->_title($helper->__('Discount'));
        Mage::register('current_discount', Mage::getModel('webinse_discount/discount'));
        $discountId = (int)$this->getRequest()->getParam('id');
        if (!is_null($discountId)) {
            Mage::registry('current_discount')->load($discountId);
        }
    }

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
        $Ids = $this->getRequest()->getParam('entity_id');
        if (!is_array($Ids)) {
            Mage::getSingleton('adminhtml/session')->addError($helper->__('Please select one or more companies.'));
        } else {
            try {
                $discount = Mage::getModel('webinse_discount/discount');
                foreach ($Ids as $Id) {
                    $discount->setId($Id)->delete();
                }
                Mage::getSingleton('adminhtml/session')->addSuccess($helper->__('Records were deleted.'));
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

    public function newAction()
    {

        $this->_initDiscount();
        $this->loadLayout();
        $this->_setActiveMenu('webinse_discount');
        $this->_addContent($this->getLayout()->createBlock('webinse_discount/adminhtml_discount_edit'));
        $this->renderLayout();
    }

    public function editAction()
    {
        $this->_forward('new');
    }

    public function saveAction()
    {
        $data = $this->getRequest()->getPost();
        if (!empty($data)) {
            $model = Mage::getModel('webinse_discount/discount');
            $model->setData($data);
            try {
                $model->validate();
                $model->save();
            } catch
            (Mage_Core_Exception $e) {
                Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
            } catch (Exception $e) {
                Mage::logException($e);
                Mage::getSingleton('adminhtml/session')->addError($this->__('Somethings went wrong'));
            }
        } else {
            Mage::getSingleton('adminhtml/session')->addError($this->__('Backend validation went wrong'));
        }
        return $this->_redirect('*/*/');
    }

    public function deleteAction()
    {
        $tipId = $this->getRequest()->getParam('id', false);
        try {
            Mage::getModel('webinse_discount/discount')->setId($tipId)->delete();
            Mage::getSingleton('adminhtml/session')->addSuccess(Mage::helper('webinse_discount')->__('Discount successfully deleted'));
            return $this->_redirect('*/*/');
        } catch (Mage_Core_Exception $e) {
            Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
        } catch (Exception $e) {
            Mage::logException($e);
            Mage::getSingleton('adminhtml/session')->addError($this->__('Somethings went wrong'));
        }
        $this->_redirectReferer();
    }
}