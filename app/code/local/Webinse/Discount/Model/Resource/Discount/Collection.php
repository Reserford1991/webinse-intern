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
 * Resource Collection model Discount
 *
 * @category    Webinse
 * @package     Webinse_Discount
 * @author      Webinse Team <info@webinse.com>
 * @copyright   2017 Webinse Ltd. (https://www.webinse.com)
 * @license     http://opensource.org/licenses/OSL-3.0 The Open Software License 3.0
 */
class Webinse_Discount_Model_Resource_Discount_Collection extends Mage_Core_Model_Resource_Db_Collection_Abstract
{

    protected function _construct()
    {
        $this->_init('webinse_discount/discount');
    }

    public function joinProducts($collection)
    {
        $productName = Mage::getSingleton('eav/config')->getAttribute('catalog_product', 'name');
        $id = $productName->getId();
        $this -> getSelect()
            ->join(array('product_sku'=>'catalog_product_entity'), 'product_sku.entity_id = main_table.product_id', array('product_sku.sku'));
        $this -> getSelect()
            ->join(array('product_name' => $productName->getBackendTable()), "product_name.entity_id = main_table.product_id AND product_name.attribute_id = $id", array('product_name'=>'product_name.value'));
        return $this;
    }

}