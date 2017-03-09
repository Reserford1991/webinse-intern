<?php
/**
 * Webinse
 *
 * PHP Version 5.6.23
 *
 * @category    Webinse
 * @package     Webinse_Discount
 * @author      Webinse Team <info@webinse.com>
 * @copyright   2017 Webinse Ltd. (https://www.webinse.com)
 * @license     http://opensource.org/licenses/OSL-3.0 The Open Software License 3.0
 */
/**
 * Install db script
 *
 * @category    Webinse
 * @package     Webinse_Discount
 * @author      Webinse Team <info@webinse.com>
 * @copyright   2017 Webinse Ltd. (https://www.webinse.com)
 * @license     http://opensource.org/licenses/OSL-3.0 The Open Software License 3.0
 */
$installer = $this;
$installer->startSetup();

$tableName = $installer->getTable('webinse_discount/discount');
if (!($installer->getConnection()->isTableExists($tableName))) {
    $table = $installer->getConnection()
        ->newTable($tableName)
        ->addColumn('entity_id', Varien_Db_Ddl_Table::TYPE_INTEGER, 11, array(
            'unsigned' => true,
            'nullable' => false,
            'primary'  => true,
            'identity' => true,
        ))
        ->addColumn('product_id', Varien_Db_Ddl_Table::TYPE_INTEGER, 50, array(
            'nullable' => false,
        ))
        ->addColumn('qty_products', Varien_Db_Ddl_Table::TYPE_INTEGER, 50, array(
            'nullable' => false,
        ))
        ->addColumn('item_price', Varien_Db_Ddl_Table::TYPE_FLOAT, array(
            'nullable' => false,
        ))
        ->addColumn('subtotal', Varien_Db_Ddl_Table::TYPE_FLOAT, array(
            'nullable' => false,
        ))
        -> addForeignKey(
            $installer->getFkName(
                'webinse_discount/discount',
                'product_id',
                'catalog/product',
                'entity_id'
            ),
            'product_id', $installer->getTable('catalog/product'), 'entity_id',
            Varien_Db_Ddl_Table::ACTION_CASCADE, Varien_Db_Ddl_Table::ACTION_CASCADE
        );
    $installer->getConnection()->createTable($table);
}

$installer->endSetup();