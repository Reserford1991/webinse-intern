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
$installer->startSetup();
$table = $installer->getTable('cms_page');

$installer->getConnection()
    ->addColumn($table, 'customer_group', array(
        'type' => Varien_Db_Ddl_Table::TYPE_INTEGER,
        'nullable' => true,
        'length' => 255,
        'comment' => 'Customer Group'
    ));

$installer->getConnection()
    ->addColumn($table, 'date_from', array(
        'type' => Varien_Db_Ddl_Table::TYPE_DATE,
        'nullable' => true,
        'comment' => 'Date From'
    ));

$installer->getConnection()
    ->addColumn($table, 'date_to', array(
        'type' => Varien_Db_Ddl_Table::TYPE_DATE,
        'nullable' => true,
        'comment' => 'Date To'
    ));

$installer->endSetup();