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
 * Backend company controller
 *
 * @category    Webinse
 * @package     Webinse_Company
 * @author      Webinse Team <info@webinse.com>
 * @copyright   2017 Webinse Ltd. (https://www.webinse.com)
 * @license     http://opensource.org/licenses/OSL-3.0 The Open Software License 3.0
 */
class Webinse_Company_Adminhtml_Webinse_Company_IndexController extends Mage_Adminhtml_Controller_Action
{
    protected function _initCompany()
    {
        $helper = Mage::helper('webinse_company');
        $this->_title($helper->__('Webinse'))->_title($helper->__('Company'));
        Mage::register('current_company', Mage::getModel('webinse_company/company'));
        $companyId = (int)$this->getRequest()->getParam('id');
        if (!is_null($companyId)) {
            Mage::registry('current_company')->load($companyId);
        }
    }

    public function indexAction()
    {
        $this->loadLayout();
        $this->_setActiveMenu('webinse_company');
        $this->renderLayout();
        return $this;
    }

    public function massDeleteAction()
    {
        $helper = Mage::helper('webinse_company');
        $Ids = $this->getRequest()->getParam('entity_id');
        if (!is_array($Ids)) {
            Mage::getSingleton('adminhtml/session')->addError($helper->__('Please select one or more companies.'));
        } else {
            try {
                $company = Mage::getModel('webinse_company/company');
                foreach ($Ids as $Id) {
                    $company->setId($Id)->delete();
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
            $this->getLayout()->createBlock('webinse_company/adminhtml_company_grid')->toHtml()
        );
    }

    public function newAction()
    {
        $this->_initCompany();
        $this->loadLayout();
        $this->_setActiveMenu('webinse_company');
        $this->_addContent($this->getLayout()->createBlock('webinse_company/adminhtml_company_edit'));
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
            $model = Mage::getModel('webinse_company/company');
            $model->setData($data);
            try {
                Mage::throwException($model->validate());
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
            Mage::getModel('webinse_company/company')->setId($tipId)->delete();
            Mage::getSingleton('adminhtml/session')->addSuccess(Mage::helper('webinse_company')->__('Company successfully deleted'));
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