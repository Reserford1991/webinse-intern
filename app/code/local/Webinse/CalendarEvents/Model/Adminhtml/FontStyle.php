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

class Webinse_CalendarEvents_Model_Adminhtml_FontStyle
{
    const NORMAL = 0;
    const ITALIC = 1;

    protected $_options = array(
        self::NORMAL => array(
            'label' => 'normal',
            'value' => self::NORMAL,
            'font-style' => 'normal',
        ),
        self::ITALIC => array(
            'label' => 'italic',
            'value' => self::ITALIC,
            'font-style' => 'italic',
        ),
    );

    public function toOptionArray()
    {
        return $this->_options;
    }

    public function getFontStyleById($choise)
    {
        $fontStyle = $this->_options[$choise]['font-style'];
        return $fontStyle;
    }
}