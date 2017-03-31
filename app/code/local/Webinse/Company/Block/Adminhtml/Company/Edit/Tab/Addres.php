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
class Webinse_Company_Block_Adminhtml_Company_Edit_Tab_Addres
    extends Mage_Adminhtml_Block_Widget_Form
    implements Mage_Adminhtml_Block_Widget_Tab_Interface
{

    protected function _prepareForm()
    {
        $model = Mage::registry('current_addresses');

        $form = new Varien_Data_Form();

        $form->setHtmlIdPrefix('company_');

        $fieldset = $form->addFieldset('base_fieldset', array('legend'=>Mage::helper('webinse_company')->__('Address Information')));

        if ($model->getPageId()) {
            $fieldset->addField('company_id', 'hidden', array(
                'name' => 'company_id',
                ));
        }

        $fieldset->addField('first_name', 'text', array(
            'name' => 'first_name',
            'label' => Mage::helper('webinse_company')->__('First Name'),
            'title' => Mage::helper('webinse_company')->__('First Name'),
            'required' => true,
        ));

        $fieldset->addField('last_name', 'text', array(
            'name' => 'last_name',
            'label' => Mage::helper('webinse_company')->__('Last Name'),
            'title' => Mage::helper('webinse_company')->__('Last Name'),
            'required' => true,
        ));

        $fieldset->addField('street_address', 'text', array(
            'name' => 'street_address',
            'label' => Mage::helper('webinse_company')->__('Street Address'),
            'title' => Mage::helper('webinse_company')->__('Street Address'),
            'required' => true,
        ));

        $fieldset->addField('city', 'text', array(
            'name' => 'city',
            'label' => Mage::helper('webinse_company')->__('City'),
            'title' => Mage::helper('webinse_company')->__('City'),
            'required' => true,
        ));

        $fieldset->addField('state_provinse', 'text', array(
            'name' => 'state_provinse',
            'label' => Mage::helper('webinse_company')->__('State/Provinse'),
            'title' => Mage::helper('webinse_company')->__('State/Provinse'),
            'required' => true,
        ));

        $fieldset->addField('zip_code', 'text', array(
            'name' => 'zip_code',
            'label' => Mage::helper('webinse_company')->__('Zip code'),
            'title' => Mage::helper('webinse_company')->__('Zip code'),
            'required' => true,
        ));

        $fieldset->addField('telephone', 'text', array(
            'name' => 'telephone',
            'label' => Mage::helper('webinse_company')->__('Telephone'),
            'title' => Mage::helper('webinse_company')->__('Telephone'),
            'required' => true,
        ));

        $fieldset->addField('fax', 'text', array(
            'name' => 'fax',
            'label' => Mage::helper('webinse_company')->__('Telephone'),
            'title' => Mage::helper('webinse_company')->__('Telephone'),
            'required' => true,
        ));

        $fieldset->addField('vat_number', 'text', array(
            'name' => 'vat_number',
            'label' => Mage::helper('webinse_company')->__('VAT number'),
            'title' => Mage::helper('webinse_company')->__('VAT number'),
            'required' => true,
        ));

        Mage::dispatchEvent('adminhtml_webinse_company_edit_tab_addres_prepare_form', array('form' => $form));
        $form->setValues($model->getData());
        $this->setForm($form);

        return parent::_prepareForm();
    }

    /**
     * Prepare label for tab
     *
     * @return string
     */
    public function getTabLabel()
    {
        return Mage::helper('webinse_company')->__('Addresses');
    }

    /**
     * Prepare title for tab
     *
     * @return string
     */
    public function getTabTitle()
    {
        return Mage::helper('webinse_company')->__('Addresses');
    }

    /**
     * Returns status flag about this tab can be shown or not
     *
     * @return true
     */
    public function canShowTab()
    {
        return true;
    }

    /**
     * Returns status flag about this tab hidden or not
     *
     * @return true
     */
    public function isHidden()
    {
        return false;
    }
}
