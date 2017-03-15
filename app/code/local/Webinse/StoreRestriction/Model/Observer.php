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
        $pages = (Mage::app()->getFrontController()->getAction()->getFullActionName());
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
        $configValue = Mage::getStoreConfig('webinse_storerestriction/configuration/allow_cms_pages');
        $pieces = explode(",", $configValue);
        if (in_array($pages, $openActions) || in_array($pages, $pieces)) {
            return $this;
        }
        if(!Mage::getSingleton('customer/session')->isLoggedIn()){
            Mage::getSingleton('customer/session')->addError('Please, login first');
            Mage::app()->getFrontController()->getResponse()->setRedirect(Mage::getUrl('customer/account/login'));
        }
    }
}