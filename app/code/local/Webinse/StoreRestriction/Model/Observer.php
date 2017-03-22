<?php
/**
 * Webinse
 *
 * PHP Version 5.6.23
 *
 * @category    Webinse
 * @package     Webinse_StoreRestriction
 * @author      Webinse Team <info@webinse.com>
 * @copyright   2017 Webinse Ltd. (https://www.webinse.com)
 * @license     http://opensource.org/licenses/OSL-3.0 The Open Software License 3.0
 */

/**
 * StoreRestriction Observer controller
 *
 * @category    Webinse
 * @package     Webinse_StoreRestriction
 * @author      Webinse Team <info@webinse.com>
 * @copyright   2017 Webinse Ltd. (https://www.webinse.com)
 * @license     http://opensource.org/licenses/OSL-3.0 The Open Software License 3.0
 */
class Webinse_StoreRestriction_Model_Observer
{
    public function storeRestriction($observer)
    {
        if (!Mage::getStoreConfigFlag('webinse_storerestriction/general/enabled')) {
            return;
        }

        $controller = $observer->getControllerAction();
        $request = $controller->getRequest();
        $openActions = self::getOpenActions();
        $actionName = strtolower($controller->getFullActionName());
        $customer = $this->_getCustomer();
        $groupId = $customer->getCustomerGroupId();
        $groups = explode(',', Mage::getStoreConfig('webinse_storerestriction/general/allowed_customer_groups'));
        if (!$customer->isLoggedIn() || !in_array($groupId, $groups)) {
            if ($actionName == 'cms_page_view') {
                $path = Mage::getModel('cms/page')->load($request->getParam('page_id'))->getIdentifier();
                $configValue = explode(',', Mage::getStoreConfig('webinse_storerestriction/general/allow_cms_pages'));
                if (is_null($path) || !in_array($path, $configValue)) {
                    $this->_redirect($controller);
                }
            } elseif (!in_array($actionName, $openActions)) {
                $this->_redirect($controller);
            }
        }
    }

    protected function _getCustomer()
    {
        return Mage::getSingleton('customer/session');
    }

    protected function _redirect($controller)
    {
        if (!$this->_getCustomer()->isLoggedIn()) {
            Mage::getSingleton('core/session')
                ->addError(Mage::getStoreConfig('webinse_storerestriction/general/restricted_store_error_mesage'));
            Mage::app()->getResponse()->setRedirect('/customer/account/login/');
        } else {
            Mage::getSingleton('core/session')
                ->addError(Mage::getStoreConfig('webinse_storerestriction/general/restricted_customer_error_mesage'));
            Mage::app()->getResponse()->setRedirect('/customer/account/');
        }
        $controller->setFlag('', 'no-dispatch', true);
    }

    public static function getOpenActions()
    {
        return array(
            'customer_account_index',
            'customer_account_create',
            'customer_account_createpost',
            'customer_account_login',
            'customer_account_loginpost',
            'customer_account_logout',
            'customer_account_logoutsuccess',
            'customer_account_forgotpassword',
            'customer_account_forgotpasswordpost',
            'customer_account_changeforgotten',
            'customer_account_resetpassword',
            'customer_account_resetpasswordpost',
            'customer_account_confirm',
            'customer_account_confirmation',
        );
    }
}