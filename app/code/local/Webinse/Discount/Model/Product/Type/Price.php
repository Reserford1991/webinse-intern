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
 * Product price model model Discount
 *
 * @category    Webinse
 * @package     Webinse_Discount
 * @author      Webinse Team <info@webinse.com>
 * @copyright   2017 Webinse Ltd. (https://www.webinse.com)
 * @license     http://opensource.org/licenses/OSL-3.0 The Open Software License 3.0
 */
class Webinse_Discount_Model_Product_Type_Price extends Mage_Catalog_Model_Product_Type_Configurable_Price
{
    public function getFinalPrice($qty = null, $product)
    {
        $productId = $product->getdata("entity_id");
        $finalPrice = Mage::getModel('webinse_discount/discount')
            ->getCollection()
            ->addFieldToFilter('product_id', array('eq' => $productId))
            ->addFieldToFilter('qty_products', array("lteq" => $qty))
            ->setOrder('qty_products', Zend_Db_Select::SQL_DESC)
            ->getFirstItem()
            ->getItemPrice();
        if (!$finalPrice) {
            $finalPrice = parent::getFinalPrice($qty, $product);
        }
        return $finalPrice;
    }
}