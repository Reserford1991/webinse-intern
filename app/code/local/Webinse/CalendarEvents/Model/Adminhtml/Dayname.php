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

class Webinse_CalendarEvents_Model_Adminhtml_DayName
{
    const ABBREVIATION = 0;
    const NARROW = 1;
    const WIDE = 2;
    public function toOptionArray()
    {
        return array(
            array('value' => self::ABBREVIATION, 'label' => 'Abbreviation'),
            array('value' => self::NARROW, 'label' => 'Narrow'),
            array('value' => self::WIDE, 'label' => 'Wide'),
        );
    }
}