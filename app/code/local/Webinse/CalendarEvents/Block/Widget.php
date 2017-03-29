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
 * Block for Webinse_CalendarEvents widget
 *
 * @category    Webinse
 * @package     Webinse_CalendarEvents
 * @author      Webinse Team <info@webinse.com>
 * @copyright   2017 Webinse Ltd. (https://www.webinse.com)
 * @license     http://opensource.org/licenses/OSL-3.0 The Open Software License 3.0
 */

class Webinse_CalendarEvents_Block_Widget extends Webinse_CalendarEvents_Block_Events implements Mage_Widget_Block_Interface {

    protected function _toHtml() {
        $this->setTemplate('webinse_calendarevents/calendarevents_widget.phtml');
        return parent::_toHtml();
    }
}