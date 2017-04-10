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
 * Adminhtml company edit form address block
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
        $addresses = Mage::registry('current_addresses');

        $form = new Varien_Data_Form();

        $form->setHtmlIdPrefix('addresses_');

        $fieldset = $form->addFieldset('base_fieldset', array('legend' => Mage::helper('webinse_company')->__('Address Information')));

        if ($addresses->getPageId()) {
            $fieldset->addField('company_id', 'hidden', array(
                'name' => 'addresses[company_id]',
            ));
        }

        $fieldset->addField('first_name', 'text', array(
            'name' => 'addresses[first_name]',
            'label' => Mage::helper('webinse_company')->__('First Name'),
            'title' => Mage::helper('webinse_company')->__('First Name'),
            'required' => true,
            'class' => 'validate-alphanum',
        ));

        $fieldset->addField('last_name', 'text', array(
            'name' => 'addresses[last_name]',
            'label' => Mage::helper('webinse_company')->__('Last Name'),
            'title' => Mage::helper('webinse_company')->__('Last Name'),
            'required' => true,
            'class' => 'validate-alphanum',
        ));

        $fieldset->addField('street_address', 'text', array(
            'name' => 'addresses[street_address]',
            'label' => Mage::helper('webinse_company')->__('Street Address'),
            'title' => Mage::helper('webinse_company')->__('Street Address'),
            'required' => true,
            'class' => 'validate-alphanum',
        ));

        $fieldset->addField('country', 'select', array(
            'name' => 'addresses[country]',
            'label' => Mage::helper('webinse_company')->__('Country'),
            'title' => Mage::helper('webinse_company')->__('Country'),
            'required' => true,
            'values' => Mage::getModel('adminhtml/system_config_source_country')->toOptionArray(),
            'class' => 'validate-alphanum',
        ));

        $fieldset->addField('city', 'text', array(
            'name' => 'addresses[city]',
            'label' => Mage::helper('webinse_company')->__('City'),
            'title' => Mage::helper('webinse_company')->__('City'),
            'required' => true,
            'class' => 'validate-alphanum',
        ));

        $fieldset->addField('region', 'select', array(
            'name' => 'addresses[region]',
            'label' => Mage::helper('webinse_company')->__('Region'),
            'title' => Mage::helper('webinse_company')->__('Region'),
            'required' => false,
            'values' => Mage::getModel('adminhtml/system_config_source_allregion')->toOptionArray(),
            'class' => 'validate-alphanum',
        ));

        $fieldset->addField('region_id', 'text', array(
            'name' => 'addresses[region_id]',
            'label' => Mage::helper('webinse_company')->__('Region'),
            'title' => Mage::helper('webinse_company')->__('Region'),
            'required' => false,
            'class' => 'validate-alphanum',
        ));

        $fieldset->addField('zip_code', 'text', array(
            'name' => 'addresses[zip_code]',
            'label' => Mage::helper('webinse_company')->__('Zip code'),
            'title' => Mage::helper('webinse_company')->__('Zip code'),
            'required' => true,
            'class' => 'validate-number',
        ));

        $fieldset->addField('telephone', 'text', array(
            'name' => 'addresses[telephone]',
            'label' => Mage::helper('webinse_company')->__('Telephone'),
            'title' => Mage::helper('webinse_company')->__('Telephone'),
            'required' => false,
            'class' => 'validate-number',
        ));

        $fieldset->addField('fax', 'text', array(
            'name' => 'addresses[fax]',
            'label' => Mage::helper('webinse_company')->__('Fax'),
            'title' => Mage::helper('webinse_company')->__('Fax'),
            'required' => false,
            'class' => 'validate-number',
        ));

        $fieldset->addField('vat_number', 'text', array(
            'name' => 'addresses[vat_number]',
            'label' => Mage::helper('webinse_company')->__('VAT number'),
            'title' => Mage::helper('webinse_company')->__('VAT number'),
            'required' => false,
            'class' => 'validate-alphanum',
        ));



        Mage::dispatchEvent('adminhtml_webinse_company_edit_tab_addres_prepare_form', array('form' => $form));
        $form->setValues($addresses->getData());
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
