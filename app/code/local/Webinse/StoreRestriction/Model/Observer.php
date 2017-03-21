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
        /*var_dump(Mage::getStoreConfig('webinse_storerestriction/configuration/enabled'));
        var_dump(Mage::getStoreConfig('webinse_storerestriction/configuration/restricted_store'));*/
        var_dump(Mage::getStoreConfig('webinse_storerestriction/configuration/allowedcustomergroups'));
        $groups = explode(",", Mage::getStoreConfig('webinse_storerestriction/configuration/allowedcustomergroups'));
        $groupId = Mage::getSingleton('customer/session')->getCustomerGroupId();
        var_dump($groupId);
        var_dump($groups);
        $controller = $observer->getControllerAction();
        $request = $controller->getRequest();
        $actionName = strtolower($controller->getFullActionName());
        $flagRedirect = false;
        $openActions = array(
            'customer_account_index',
            'customer_account_create',
            'customer_account_createpost',
            'customer_account_login',
            'customer_account_loginpost',
            'customer_account_logoutsuccess',
            'customer_account_logoutsuccesspost',
            'customer_account_forgotpassword',
            'customer_account_forgotpasswordpost',
            'customer_account_changeforgotten',
            'customer_account_resetpassword',
            'customer_account_resetpasswordpost',
            'customer_account_confirm',
            'customer_account_confirmation'
        );
        if (Mage::getStoreConfig('webinse_storerestriction/configuration/enabled')) {
            if (!Mage::getSingleton('customer/session')->isLoggedIn()) {
                if ($actionName == 'cms_page_view') {
                    $path = Mage::getModel('cms/page')->load($request->getParam('page_id'))->getIdentifier();
                    $pieces = explode(",", Mage::getStoreConfig('webinse_storerestriction/configuration/allow_cms_pages'));
                    if (is_null($path) || !in_array($path, $pieces)) {
                        $flagRedirect = true;
                    }
                } elseif (!in_array($actionName, $openActions)) {
                    $flagRedirect = true;
                }
            }
            if ($flagRedirect) {
                Mage::getSingleton('core/session')->addError(Mage::helper('webinse_storerestriction')
                    ->__(Mage::getStoreConfig('webinse_storerestriction/configuration/restricted_store')));
                Mage::app()->getResponse()->setRedirect('/customer/account/login/');
                $controller->setFlag('', 'no-dispatch', true);
            }
        }
    }
}