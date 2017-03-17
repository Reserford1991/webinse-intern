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
 * CalendarEvents custom dropdown menu
 *
 * @category    Webinse
 * @package     Webinse_CalendarEvents
 * @author      Webinse Team <info@webinse.com>
 * @copyright   2017 Webinse Ltd. (https://www.webinse.com)
 * @license     http://opensource.org/licenses/OSL-3.0 The Open Software License 3.0
 */

class Webinse_CalendarEvents_Model_Adminhtml_Dayname
{
    const ABBREVIATION = 0;
    const NARROW = 1;
    const WIDE = 2;

    public function toOptionArray()
    {
        return array(
            array('value' => self::ABBREVIATION, 'label' => Mage::helper('webinse_calendarevents')->__('Abbreviation')),
            array('value' => self::NARROW, 'label' => Mage::helper('webinse_calendarevents')->__('Narrow')),
            array('value' => self::WIDE, 'label' => Mage::helper('webinse_calendarevents')->__('Wide')),
        );
    }
}