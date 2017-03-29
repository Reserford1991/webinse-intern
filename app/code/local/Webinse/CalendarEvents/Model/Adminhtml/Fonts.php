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

class Webinse_CalendarEvents_Model_Adminhtml_Fonts
{
    const ARIAL = 0;
    const TIMES_NEW_ROMAN = 1;
    const VERDANA = 2;

    public function toOptionArray()
    {
        return array(
            array('value' => self::ARIAL, 'label' => Mage::helper('webinse_calendarevents')->__('Arial')),
            array('value' => self::TIMES_NEW_ROMAN, 'label' => Mage::helper('webinse_calendarevents')->__('Times New Romen')),
            array('value' => self::VERDANA, 'label' => Mage::helper('webinse_calendarevents')->__('Verdana')),
        );
    }
}