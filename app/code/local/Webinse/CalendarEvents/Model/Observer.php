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
 * CalendarEvents observer
 *
 * @category    Webinse
 * @package     Webinse_CalendarEvents
 * @author      Webinse Team <info@webinse.com>
 * @copyright   2017 Webinse Ltd. (https://www.webinse.com)
 * @license     http://opensource.org/licenses/OSL-3.0 The Open Software License 3.0
 */
class Webinse_CalendarEvents_Model_Observer
{
    public function cmsField($observer)
    {
        $helper = Mage::helper('webinse_calendarevents');
        $groups = Mage::getResourceModel('customer/group_collection')->toOptionHash();
        $image = Mage::getDesign()->getSkinUrl('images/grid-cal.gif');
        $format = Mage::app()->getLocale()->getDateFormat(Mage_Core_Model_Locale::FORMAT_TYPE_SHORT);
        $form = $observer->getForm();

        $fieldset = $form->getElement('base_fieldset');

        $fieldset->addField('customer_group', 'select', array(
            'name' => 'customer_group',
            'label' => $helper->__('Assign to Customer Group'),
            'options' => $groups,
        ));

        $fieldset->addField('date_from', 'date', array(
            'name' => 'date_from',
            'label' => $helper->__('Date From'),
            'image' => $image,
            'format' => $format,
        ));

        $fieldset->addField('date_to', 'date', array(
            'name' => 'date_to',
            'label' => $helper->__('Date To'),
            'image' => $image,
            'format' => $format,
        ));
    }

    public function cmsPage($observer)
    {
        $templateId = Mage::getStoreConfig('webinse_calendarevents/email/email_template');
        $subject = Mage::getStoreConfig('webinse_calendarevents/email/email_subject');

        $sender = Mage::getStoreConfig('webinse_calendarevents/email/sender_email_identity');
        $recipientEmail = Mage::getStoreConfig('webinse_calendarevents/email/recipient_email');
        $recipientName = Mage::getStoreConfig('webinse_calendarevents/email/recipient_name');

        $vars = array (
            'subject' => $subject,
            'cmsPageId' => Mage::app()->getRequest()->getParam('page_id'),
            'cmsPageTitle' => Mage::app()->getRequest()->getParam('title'),
            'calendarLink' => 'calendarevents/customer/index',
            );

        $emailTemplate = Mage::getModel('core/email_template_mailer');
        $emailInfo = Mage::getModel('core/email_info');
        $emailInfo->addTo($recipientEmail, $recipientName);
        $emailTemplate->addEmailInfo($emailInfo);

        $emailTemplate->setSender($sender);
        $emailTemplate->setTemplateId($templateId);
        $emailTemplate->setTemplateParams($vars);

       try {
            $emailTemplate->send();
            Mage::getSingleton('core/session')->addSuccess('Email has been sent!');
        } catch (Exception $ex) {
            Mage::getSingleton('core/session')->addError('Unable to send...');
        }
    }
}