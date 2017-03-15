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
    public function example($observer)
    {
        $action = strtolower(Mage::app()->getRequest()->getActionName());
        $controller = strtolower(Mage::app()->getRequest()->getControllerName());
        $openActions = array(
            'create',
            'createpost',
            'login',
            'loginpost',
            'logoutsuccess',
            'forgotpassword',
            'forgotpasswordpost',
            'resetpassword',
            'resetpasswordpost',
            'confirm',
            'confirmation'
        );
        $configValue = Mage::getStoreConfig('webinse_storerestriction/configuration/allow_cms_pages');
        $pieces = explode(",", $configValue);
        $openActions = array_merge($openActions, $pieces);
        if ($controller == 'account' && in_array($action, $openActions)) {
            return $this;
        }
        if(!Mage::getSingleton('customer/session')->isLoggedIn()){
            Mage::getSingleton('customer/session')->addError('Please, login first');
            Mage::app()->getFrontController()->getResponse()->setRedirect(Mage::getUrl('customer/account/login'));
        }

    }
}