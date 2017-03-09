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
 * Install db script
 *
 * @category    Webinse
 * @package     Webinse_Company
 * @author      Webinse Team <info@webinse.com>
 * @copyright   2017 Webinse Ltd. (https://www.webinse.com)
 * @license     http://opensource.org/licenses/OSL-3.0 The Open Software License 3.0
 */
$installer = $this;
$installer->startSetup();

$tableName = $installer->getTable('webinse_company/company');
if (!($installer->getConnection()->isTableExists($tableName))) {
    $table = $installer->getConnection()
        ->newTable($tableName)
        ->addColumn('entity_id', Varien_Db_Ddl_Table::TYPE_INTEGER, 11, array(
            'unsigned' => true,
            'nullable' => false,
            'primary'  => true,
            'identity' => true,
        ))
        ->addColumn('name', Varien_Db_Ddl_Table::TYPE_TEXT, 255, array(
            'nullable' => false,
        ))
        ->addColumn('domains', Varien_Db_Ddl_Table::TYPE_TEXT, 255, array(
            'nullable' => false,
        ))
        ->addColumn('contact_name', Varien_Db_Ddl_Table::TYPE_TEXT, 255, array(
            'nullable' => false,
        ))
        ->addColumn('office_phone', Varien_Db_Ddl_Table::TYPE_TEXT, 255, array(
            'nullable' => false,
        ))
        ->addColumn('mobile_phone', Varien_Db_Ddl_Table::TYPE_TEXT, 255, array(
            'nullable' => false,
        ))
        ->addColumn('street', Varien_Db_Ddl_Table::TYPE_TEXT, 255, array(
            'nullable' => false,
        ))
        ->addColumn('city', Varien_Db_Ddl_Table::TYPE_TEXT, 255, array(
            'nullable' => false,
        ))
        ->addColumn('state', Varien_Db_Ddl_Table::TYPE_TEXT, 255, array(
            'nullable' => false,
        ))
        ->addColumn('zip', Varien_Db_Ddl_Table::TYPE_TEXT, 255, array(
            'nullable' => false,
        ));
    $installer->getConnection()->createTable($table);
}

$installer->endSetup();