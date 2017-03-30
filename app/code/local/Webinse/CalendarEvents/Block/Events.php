<?php
/**
 * Webinse
 *
 * PHP Version 5.6.23
 *
 * @category    Webinse
 * @package     Webinse_CalendarEvents
 * @author      Webinse Team <info@webinse.com>
 * @copyright   2017 Webinse Ltd. (https://www.webinse.com)
 * @license     http://opensource.org/licenses/OSL-3.0 The Open Software License 3.0
 */
/**
 * Block for Webinse_CalendarEvents
 *
 * @category    Webinse
 * @package     Webinse_CalendarEvents
 * @author      Webinse Team <info@webinse.com>
 * @copyright   2017 Webinse Ltd. (https://www.webinse.com)
 * @license     http://opensource.org/licenses/OSL-3.0 The Open Software License 3.0
 */

class Webinse_CalendarEvents_Block_Events extends Mage_Core_Block_Template
{
    public function getAllEvents()
    {
        $collection = Mage::getModel('cms/page')->getCollection()
            ->addFieldToFilter('date_from', array('nlike'=> 'null'))
            ->addFieldToFilter('date_to', array('nlike'=> 'null'))
            ->addFieldToSelect('title', 'title')
            ->addFieldToSelect('date_from', 'start')
            ->addFieldToSelect('date_to', 'end')
            ->addFieldToSelect('color', 'color')
            ->getData();
        return Mage::helper('core')->jsonEncode($collection);
    }

    public function getNumberOfPrevMonths()
    {
        return Mage::getStoreConfig('webinse_calendarevents/configuration/number_of_prev_months');
    }

    public function getNumberOfNextMonths()
    {
        return Mage::getStoreConfig('webinse_calendarevents/configuration/number_of_next_months');
    }

    public function getFontColor()
    {
        return Mage::getStoreConfig('webinse_calendarevents/calendar_design/font_color');
    }

    public function getFontFamily()
    {
        $choise = Mage::getStoreConfig('webinse_calendarevents/calendar_design/font_family');
        return Mage::getModel('webinse_calendarevents/adminhtml_fonts')->getFontById($choise);
    }

    public function getFontSize()
    {
        return Mage::getStoreConfig('webinse_calendarevents/calendar_design/font_size');
    }

    public function getFontStyle()
    {
        $choise = Mage::getStoreConfig('webinse_calendarevents/calendar_design/font_style');
        return Mage::getModel('webinse_calendarevents/adminhtml_fontStyle')->getFontStyleById($choise);
    }

    public function getBorderColor()
    {
        $color = Mage::getStoreConfig('webinse_calendarevents/calendar_design/border_color');
        return $color;
    }

    public function getBorderSize()
    {
        $size = Mage::getStoreConfig('webinse_calendarevents/calendar_design/border_width');
        return $size;
    }
}