<?php
/**
* Webinse
*
* PHP Version 5.6.23
*
* @category    Webinse
* @package     Webinse_CalendarEvants
* @author      Webinse Team <info@webinse.com>
* @copyright   2017 Webinse Ltd. (https://www.webinse.com)
* @license     http://opensource.org/licenses/OSL-3.0 The Open Software License 3.0
*/
/**
* Install db script
*
* @category    Webinse
* @package     Webinse_CalendarEvants
* @author      Webinse Team <info@webinse.com>
* @copyright   2017 Webinse Ltd. (https://www.webinse.com)
* @license     http://opensource.org/licenses/OSL-3.0 The Open Software License 3.0
*/

$installer = $this;
/* @var $installer Mage_Core_Model_Resource_Setup */

$installer->startSetup();

$conn = $installer->getConnection();
$table = $installer->getTable('cms_page');

$installer->getConnection()
    ->addColumn($table,'customer_group', array(
        'type'      => Varien_Db_Ddl_Table::TYPE_INTEGER,
        'nullable'  => true,
        'length'    => 255,
        'after'     => null, // column name to insert new column after
        'comment'   => 'Customer Group'
    ));
$installer->endSetup();