<?php

class Webinse_CalendarEvents_Model_Adminhtml_DayName
{
    public function toOptionArray()
    {
        return array(
            array('value' => 0, 'label' => Mage::helper('webinse_calendarevents')->__('Abbreviation')),
            array('value' => 1, 'label' => Mage::helper('webinse_calendarevents')->__('Narrow')),
            array('value' => 2, 'label' => Mage::helper('webinse_calendarevents')->__('Wide')),
        );
    }
}