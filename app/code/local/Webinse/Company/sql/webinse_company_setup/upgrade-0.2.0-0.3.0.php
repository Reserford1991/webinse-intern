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
$tableName = $installer->getTable('webinse_company/addresses');

if (!($installer->getConnection()->isTableExists($tableName))) {
    $table = $installer->getConnection()
        ->newTable($tableName)
        ->addColumn('company_id', Varien_Db_Ddl_Table::TYPE_INTEGER, 11, array(
            'unsigned' => true,
            'nullable' => false,
            'primary' => true,
            'identity' => true,
        ))
        ->addColumn('first_name', Varien_Db_Ddl_Table::TYPE_TEXT, 255, array(
            'nullable' => false,
        ))
        ->addColumn('last_name', Varien_Db_Ddl_Table::TYPE_TEXT, 255, array(
            'nullable' => false,
        ))
        ->addColumn('street_address', Varien_Db_Ddl_Table::TYPE_TEXT, 255, array(
            'nullable' => false,
        ))
        ->addColumn('city', Varien_Db_Ddl_Table::TYPE_TEXT, 255, array(
            'nullable' => false,
        ))
        ->addColumn('state_provinse', Varien_Db_Ddl_Table::TYPE_TEXT, 255, array(
            'nullable' => false,
        ))
        ->addColumn('zip_code', Varien_Db_Ddl_Table::TYPE_INTEGER, 255, array(
            'nullable' => false,
        ))
        ->addColumn('telephone', Varien_Db_Ddl_Table::TYPE_INTEGER, 255, array(
            'nullable' => false,
        ))
        ->addColumn('fax', Varien_Db_Ddl_Table::TYPE_INTEGER, 255, array(
            'nullable' => true,
        ))
        ->addColumn('vat_number', Varien_Db_Ddl_Table::TYPE_TEXT, 255, array(
            'nullable' => true,
        ))
        ->addForeignKey(
            $installer->getFkName(
                'webinse_company/addresses',
                'company_id',
                'webinse_company/company',
                'entity_id'
            ),
            'company_id', $installer->getTable('webinse_company/company'), 'entity_id',
            Varien_Db_Ddl_Table::ACTION_CASCADE, Varien_Db_Ddl_Table::ACTION_CASCADE
        );
    $installer->getConnection()->createTable($table);
}

$installer->endSetup();