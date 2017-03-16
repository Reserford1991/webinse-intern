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
    public function StoreRestriction($observer)
    {
        $controller = $observer->getControllerAction();
        $request = $controller->getRequest();
        $actionName = $controller->getFullActionName();
        $pieces = explode(",", Mage::getStoreConfig('webinse_storerestriction/configuration/allow_cms_pages'));
        $flagRedirect = false;
        $openActions = array(
            'customer-account_create',
            'customer_account_login',
            'customer_account_logoutsuccess',
            'customer_account_forgotpassword',
            'customer_account_forgotpasswordpost',
            'customer_account_changeforgotten',
            'customer_account_resetpassword',
            'customer_account_resetpasswordpost',
            'customer_account_confirm',
            'customer_account_confirmation'
        );
        if (!Mage::getSingleton('customer/session')->isLoggedIn()) {
            if ($actionName == 'cms_page_view') {
                $path = Mage::getModel('cms/page')->load($request->getParam('page_id'))->getIdentifier();
                if (is_null($path) || !in_array($path, $pieces)) {
                    $flagRedirect = true;
                }
            } elseif (!in_array($actionName, $openActions)) {
                $flagRedirect = true;
            }
        }
        if ($flagRedirect) {
            Mage::getSingleton('core/session')->addError(Mage::helper('webinse_storerestriction')
                ->__('Please login first'));
            Mage::app()->getResponse()->setRedirect('/customer/account/login/');
            $controller->setFlag('', 'no-dispatch', true);
        }
    }
}