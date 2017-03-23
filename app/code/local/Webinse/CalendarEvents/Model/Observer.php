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
        $emailTemplate  = Mage::getModel('core/email_template');
        $emailTemplate->loadDefault('notification_mail');

        $pageId =  Mage::app()->getRequest()->getParam('page_id');
        $pageTitle = Mage::app()->getRequest()->getParam('title');
        $calendarLink = 'http://magentosite.com/calendarevents/customer/index/';

        $sender = Mage::getStoreConfig('webinse_calendarevents/email/sender_email_identity');
        $recipientEmail = Mage::getStoreConfig('webinse_calendarevents/email/recipient_email');
        $recipientName = Mage::getStoreConfig('webinse_calendarevents/email/recipient_name');
        $emailSubject = Mage::getStoreConfig('webinse_calendarevents/email/email_subject');
        $senderEmail = Mage::getStoreConfig('trans_email/ident_'.$sender.'/email');

        $emailTemplate->setTemplateSubject($emailSubject);
        $emailTemplate->setSenderName($sender);
        $emailTemplate->setSenderEmail($senderEmail);

        $emailTemplateVariables['recipientName']  = $recipientName;
        $emailTemplateVariables['pageId'] = $pageId;
        $emailTemplateVariables['pageTitle'] = $pageTitle;
        $emailTemplateVariables['calendarLink'] = $calendarLink;
        $emailTemplate->send($recipientEmail, $recipientName, $emailTemplateVariables);
    }
}