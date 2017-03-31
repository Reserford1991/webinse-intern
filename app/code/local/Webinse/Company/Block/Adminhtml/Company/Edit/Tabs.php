<?php
class Webinse_Company_Block_Adminhtml_Company_Edit_Tabs extends Mage_Adminhtml_Block_Widget_Tabs
{

    public function __construct()
    {
        parent::__construct();
        $this->setId('company_tabs');
        $this->setDestElementId('edit_form');
        $this->setTitle(Mage::helper('cms')->__('Company Information'));
    }
}
