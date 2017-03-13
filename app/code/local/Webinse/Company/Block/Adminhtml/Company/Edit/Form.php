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
 * Adminhtml company edit form block
 *
 * @category    Webinse
 * @package     Webinse_Company
 * @author      Webinse Team <info@webinse.com>
 * @copyright   2017 Webinse Ltd. (https://www.webinse.com)
 * @license     http://opensource.org/licenses/OSL-3.0 The Open Software License 3.0
 */
class Webinse_Company_Block_Adminhtml_Company_Edit_Form extends Mage_Adminhtml_Block_Widget_Form
{

    protected function _prepareLayout()
    {
        parent::_prepareLayout();
        $helper = Mage::helper('webinse_company');
        $form = new Varien_Data_Form();
        $company = Mage::registry('current_company');
        $fieldset = $form->addFieldset('base_fieldset', array('legend'=>$helper->__('Company Information')));

        if ($company->getId()) {
           $fieldset->addField('entity_id', 'hidden', array(
                'name'      => 'entity_id',
                'required'  => true
                ));
        }

        $fieldset->addField('name', 'text', array(
            'name'      => 'name',
            'label'     => Mage::helper('webinse_company')->__('Company name'),
            'maxlength' => '250',
            'required'  => true,
            'class'     => 'validate-alphanum',
        ));

        $fieldset->addField('domains', 'text', array(
            'name'      => 'domains',
            'label'     => Mage::helper('webinse_company')->__('Domains'),
            'maxlength' => '250',
            'required'  => true,
            'class'     => 'validate-alphanum',
        ));

        $fieldset->addField('contact_name', 'text', array(
            'name'      => 'contact_name',
            'label'     => Mage::helper('webinse_company')->__('Contact name'),
            'maxlength' => '250',
            'required'  => true,
            'class'     => 'validate-alphanum',
        ));

        $fieldset->addField('office_phone', 'text', array(
            'name'      => 'office_phone',
            'label'     => Mage::helper('webinse_company')->__('Office phone'),
            'maxlength' => '250',
            'required'  => true,
            'class'     => 'validate-alphanum',
        ));

        $fieldset->addField('mobile_phone', 'text', array(
            'name'      => 'mobile_phone',
            'label'     => Mage::helper('webinse_company')->__('Mobile phone'),
            'maxlength' => '250',
            'required'  => true,
            'class'     => 'validate-alphanum',
        ));

        $fieldset->addField('street', 'text', array(
            'name'      => 'street',
            'label'     => Mage::helper('webinse_company')->__('Street'),
            'maxlength' => '250',
            'required'  => true,
            'class'     => 'validate-alphanum',
        ));

        $fieldset->addField('city', 'text', array(
            'name'      => 'city',
            'label'     => Mage::helper('webinse_company')->__('City'),
            'maxlength' => '250',
            'required'  => true,
            'class'     => 'validate-alphanum',
        ));

        $fieldset->addField('state', 'text', array(
            'name'      => 'state',
            'label'     => Mage::helper('webinse_company')->__('State'),
            'maxlength' => '250',
            'required'  => true,
            'class'     => 'validate-alphanum',
        ));

        $fieldset->addField('zip', 'text', array(
            'name'      => 'zip',
            'label'     => Mage::helper('webinse_company')->__('Zip'),
            'maxlength' => '250',
            'required'  => true,
            'class'     => 'validate-alphanum',
        ));

        $form->addValues($company->getData());
        $form->setMethod('post');
        $form->setUseContainer(true);
        $form->setId('edit_form');
        $form->setAction($this->getUrl('*/*/save'));
        $this->setForm($form);
    }

}