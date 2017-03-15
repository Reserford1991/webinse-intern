<?php

define("ONE", Mage::helper('webinse_calendarevents')->__('Abbreviation'));
define("TWO", Mage::helper('webinse_calendarevents')->__('Narrow'));
define("THREE", Mage::helper('webinse_calendarevents')->__('Wide'));

class Webinse_CalendarEvents_Model_Adminhtml_DayName
{


    public function toOptionArray()
    {
        return array(
            array('value' => 0, 'label' => ONE),
            array('value' => 1, 'label' => TWO),
            array('value' => 2, 'label' => THREE),
        );
    }
}