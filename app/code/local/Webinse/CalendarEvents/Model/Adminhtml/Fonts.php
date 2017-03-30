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

    protected $_options = array(
        self::ARIAL => array(
            'label' => 'Arial',
            'value' => self::ARIAL,
            'font' => 'Arial',
        ),
        self::TIMES_NEW_ROMAN => array(
            'label' => 'Times New Roman',
            'value' => self::TIMES_NEW_ROMAN,
            'font' => "'Times New Roman'",
        ),
        self::VERDANA => array(
            'label' => 'Verdana',
            'value' => self::VERDANA,
            'font' => 'Verdana',
        ),
    );


    public function toOptionArray()
    {
        return $this->_options;
    }

    public function getFontById($choise)
    {
        $font = $this->_options[$choise]['font'];
        return $font;
    }
}