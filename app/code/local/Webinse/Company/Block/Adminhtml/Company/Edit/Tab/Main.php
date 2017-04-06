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
 * Adminhtml company edit form company information block
 *
 * @category    Webinse
 * @package     Webinse_Company
 * @author      Webinse Team <info@webinse.com>
 * @copyright   2017 Webinse Ltd. (https://www.webinse.com)
 * @license     http://opensource.org/licenses/OSL-3.0 The Open Software License 3.0
 */
class Webinse_Company_Block_Adminhtml_Company_Edit_Tab_Main
    extends Mage_Adminhtml_Block_Widget_Form
    implements Mage_Adminhtml_Block_Widget_Tab_Interface
{
    protected function _prepareForm()
    {
        $company = Mage::registry('current_company');

        $form = new Varien_Data_Form();

        $form->setHtmlIdPrefix('company_');

        $fieldset = $form->addFieldset('base_fieldset', array('legend' => Mage::helper('webinse_company')->__('Address Information')));

        $country = Mage::getModel('directory/country')->getResourceCollection()->loadByStore()->toOptionArray(true);

        if ($company->getPageId()) {
            $fieldset->addField('entity_id', 'hidden', array(
                'name' => 'company[entity_id]',
            ));
        }

        $fieldset->addField('name', 'text', array(
            'name'      => 'company[name]',
            'label'     => Mage::helper('webinse_company')->__('Company name'),
            'maxlength' => '250',
            'required'  => true,
            'class'     => 'validate-alphanum',
        ));

        $fieldset->addField('domains', 'text', array(
            'name'      => 'company[domains]',
            'label'     => Mage::helper('webinse_company')->__('Domains'),
            'maxlength' => '250',
            'required'  => true,
            'class'     => 'required-entry',
        ));

        $fieldset->addField('contact_name', 'text', array(
            'name'      => 'company[contact_name]',
            'label'     => Mage::helper('webinse_company')->__('Contact name'),
            'maxlength' => '250',
            'required'  => true,
            'class'     => 'validate-alphanum',
        ));

        $fieldset->addField('office_phone', 'text', array(
            'name'      => 'company[office_phone]',
            'label'     => Mage::helper('webinse_company')->__('Office phone'),
            'maxlength' => '250',
            'required'  => true,
            'class'     => 'validate-alphanum',
        ));

        $fieldset->addField('mobile_phone', 'text', array(
            'name'      => 'company[mobile_phone]',
            'label'     => Mage::helper('webinse_company')->__('Mobile phone'),
            'maxlength' => '250',
            'required'  => true,
            'class'     => 'validate-alphanum',
        ));

        $fieldset->addField('street', 'text', array(
            'name'      => 'company[street]',
            'label'     => Mage::helper('webinse_company')->__('Street'),
            'maxlength' => '250',
            'required'  => true,
            'class'     => 'validate-alphanum',
        ));

        $fieldset->addField('city', 'text', array(
            'name'      => 'company[city]',
            'label'     => Mage::helper('webinse_company')->__('City'),
            'maxlength' => '250',
            'required'  => true,
            'class'     => 'validate-alphanum',
        ));

        $fieldset->addField('state', 'select', array(
            'name'      => 'company[state]',
            'label'     => Mage::helper('webinse_company')->__('State'),
            'maxlength' => '250',
            'required'  => true,
            'class'     => 'validate-alphanum',
            'values' => $country,
        ));

        $fieldset->addField('zip', 'text', array(
            'name'      => 'company[zip]',
            'label'     => Mage::helper('webinse_company')->__('Zip'),
            'maxlength' => '250',
            'required'  => true,
            'class'     => 'validate-alphanum',
        ));

        Mage::dispatchEvent('adminhtml_webinse_company_edit_tab_main_prepare_form', array('form' => $form));
        $form->setValues($company->getData());
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
        return Mage::helper('webinse_company')->__('Company Information');
    }

    /**
     * Prepare title for tab
     *
     * @return string
     */
    public function getTabTitle()
    {
        return Mage::helper('webinse_company')->__('Company Information');
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
