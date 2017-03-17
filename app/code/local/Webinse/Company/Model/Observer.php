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
 * Company observer
 *
 * @category    Webinse
 * @package     Webinse_Company
 * @author      Webinse Team <info@webinse.com>
 * @copyright   2017 Webinse Ltd. (https://www.webinse.com)
 * @license     http://opensource.org/licenses/OSL-3.0 The Open Software License 3.0
 */
class Webinse_Company_Model_Observer
{
    public function customerFilter(Varien_Event_Observer $observer)
    {
        $customer = $observer->getCustomer();
        $mail = $customer->getEmail();
        $domain_name = substr(strrchr($mail, "@"), 1);
        $companies = Mage::getModel('webinse_company/company')->getCollection();
        $restrict = true;
        foreach ($companies as $company) {
            $pieces = explode(", ", $company->getData('domains'));
            foreach($pieces as $domain) {
                if ($domain_name == $domain) {
                    $id = $company->getData('entity_id');
                    $customer->setCompanyId($id);
                    $restrict = false;
                }
            }
        }
        if ($restrict) {
            $error = Mage::helper('webinse_company')->__('Your email is not acceptable in our system.');
            Mage::throwException($error);
        }

    }
}