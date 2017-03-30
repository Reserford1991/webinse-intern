<?php
/**
 * Webinse
 *
 * PHP Version 5.6.23
 *
 * @category    Webinse
 * @package     Webinse_CalendarEvants
 * @author      Webinse Team <info@webinse.com>
 * @copyright   2017 Webinse Ltd. (https://www.webinse.com)
 * @license     http://opensource.org/licenses/OSL-3.0 The Open Software License 3.0
 */
/**
 * Data install script
 *
 * @category    Webinse
 * @package     Webinse_CalendarEvants
 * @author      Webinse Team <info@webinse.com>
 * @copyright   2017 Webinse Ltd. (https://www.webinse.com)
 * @license     http://opensource.org/licenses/OSL-3.0 The Open Software License 3.0
 */

$widgetParameters = array(
    'title' => 'All events',
    'template' => 'webinse_calendarevents/calendarevents_widget.phtml'
);

$instance = Mage::getModel('widget/widget_instance')->setData(array(
    'type' => 'webinse_calendarevents/Widget',
    'package_theme' => 'rwd/default',
    'title' => 'Calendar',
    'store_ids' => '0',
    'widget_parameters' => serialize($widgetParameters),
    'page_groups' => array(array(
        'page_group' => 'all_pages',
        'all_pages' => array(
            'page_id' => 8,
            'group' => 'all_pages',
            'layout_handle' => 'default',
            'block' => 'left',
            'for' => 'all',
            'template' => $widgetParameters['template'],
        )
    ))
))->save();
