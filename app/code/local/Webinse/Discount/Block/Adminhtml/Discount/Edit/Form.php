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
 * Adminhtml discount edit form block
 *
 * @category    Webinse
 * @package     Webinse_Discount
 * @author      Webinse Team <info@webinse.com>
 * @copyright   2017 Webinse Ltd. (https://www.webinse.com)
 * @license     http://opensource.org/licenses/OSL-3.0 The Open Software License 3.0
 */
class Webinse_Discount_Block_Adminhtml_Discount_Edit_Form extends Mage_Adminhtml_Block_Widget_Form
{
    protected function _prepareLayout()
    {
        $head = $this->getLayout()->getBlock('head');
        $head->addJs('webinse_discount/my_script.js');

        parent::_prepareLayout();
        $helper = Mage::helper('webinse_discount');
        $form = new Varien_Data_Form();
        $discount = Mage::registry('current_discount');
        $fieldset = $form->addFieldset('base_fieldset', array('legend'=>$helper->__('discount Information')));

        if ($discount->getId()) {
           $fieldset->addField('entity_id', 'hidden', array(
                'name'      => 'entity_id',
                'required'  => true
           ));
        }

        $fieldset->addField('product_id', 'text', array(
            'name'      => 'product_id',
            'label'     => Mage::helper('webinse_discount')->__('Product ID'),
            'maxlength' => '250',
            'required'  => true,
            'class'     => 'validate-digits-range digits-range-231-905',
        ));

        $fieldset->addField('qty_products', 'text', array(
            'name'      => 'qty_products',
            'label'     => Mage::helper('webinse_discount')->__('Product QTY'),
            'maxlength' => '250',
            'required'  => true,
            'class'     => 'validate-number',
        ));

        $fieldset->addField('item_price', 'text', array(
            'name'      => 'item_price',
            'label'     => Mage::helper('webinse_discount')->__('Price for item'),
            'maxlength' => '250',
            'required'  => true,
            'class'     => 'validate-number',
        ));

        $fieldset->addField('register', 'button', array(
             'value'    => Mage::helper('webinse_discount')->__('Subtotal'),
             'onclick'  => "myFunction()",
        ));

        $fieldset->addField('subtotal', 'text', array(
             'name'      => 'subtotal',
             'label'     => Mage::helper('webinse_discount')->__('Subtotal'),
             'maxlength' => '250',
             'required'  => true,
             'class'     => 'validate-number disabled',
             'readonly'  => true,
        ));

        $form->addValues($discount->getData());
        $form->setMethod('post');
        $form->setUseContainer(true);
        $form->setId('edit_form');
        $form->setAction($this->getUrl('*/*/save'));
        $this->setForm($form);
    }
}