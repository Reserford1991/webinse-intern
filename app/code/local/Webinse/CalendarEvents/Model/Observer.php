<?php

class Webinse_CalendarEvents_Model_Observer
{
    public function cmsField($observer)
    {
        $helper = Mage::helper('webinse_calendarevents');
        $groups = Mage::getResourceModel('customer/group_collection')->toOptionHash();
        $image = Mage::getDesign()->getSkinUrl('images/grid-cal.gif');
        $format = Mage::app()->getLocale()->getDateFormat(Mage_Core_Model_Locale::FORMAT_TYPE_SHORT);
        $form = $observer->getForm();

        $fieldset = $form->getElement('base_fieldset');

        $fieldset->addField('customer_group', 'select', array(
            'name' => 'customer_group',
            'label' => $helper->__('Assign to Customer Group'),
            'options' => $groups,
        ));

        $fieldset->addField('date_from', 'date', array(
            'name' => 'date_from',
            'label' => $helper->__('Date From'),
            'image' => $image,
            'format' => $format,
        ));

        $fieldset->addField('date_to', 'date', array(
            'name' => 'date_to',
            'label' => $helper->__('Date To'),
            'image' => $image,
            'format' => $format,
        ));
    }
}