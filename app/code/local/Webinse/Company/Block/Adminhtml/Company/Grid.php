<?php
/**
 * Webinse
 *
 * PHP Version 5.6.23
 *
 * @category    Webinse
 * @package     Webinse_Company
 * @author      Webinse Team <info@webinse.com>
 * @copyright   2017 Webinse Ltd. (https://www.webinse.com)
 * @license     http://opensource.org/licenses/OSL-3.0 The Open Software License 3.0
 */
/**
 * Adminhtml grid block
 *
 * @category    Webinse
 * @package     Webinse_Company
 * @author      Webinse Team <info@webinse.com>
 * @copyright   2017 Webinse Ltd. (https://www.webinse.com)
 * @license     http://opensource.org/licenses/OSL-3.0 The Open Software License 3.0
 */
class Webinse_Company_Block_Adminhtml_Company_Grid extends Mage_Adminhtml_Block_Widget_Grid
{
    public function __construct()
    {
        parent::__construct();
        $this->setId('companyGrid');
        $this->setUseAjax(true);
        $this->setDefaultSort('entity_id');
        $this->setSaveParametersInSession(true);
    }

    protected function _prepareCollection()
    {
        $collection = Mage::getModel('webinse_company/company')->getCollection();
        $this->setCollection($collection);
        return parent::_prepareCollection();
    }

    protected function _prepareColumns()
    {
        $helper = Mage::helper('webinse_company');

        $this->addColumn('entity_id', array(
            'header'        => $helper->__('ID'),
            'width'         => 50,
            'align'         => 'right',
            'index'         => 'entity_id',
            'filter_index'  => 'entity_id',
        ));

        $this->addColumn('name', array(
            'header'        => $helper->__('Company Name'),
            'align'         => 'left',
            'index'         => 'name',
            'filter_index'  => 'name',
            'type'          => 'text',
        ));

        $this->addColumn('contact_name', array(
            'header'        => $helper->__('Contact Name'),
            'align'         => 'left',
            'index'         => 'contact_name',
            'filter_index'  => 'contact_name',
            'type'          => 'text',
        ));

        $this->addColumn('office_phone', array(
            'header'        => $helper->__('Office Phone'),
            'align'         => 'left',
            'index'         => 'office_phone',
            'filter_index'  => 'office_phone',
            'type'          => 'text',
        ));

        $this->addColumn('mobile_phone', array(
            'header'        => $helper->__('Mobile Phone'),
            'align'         => 'left',
            'index'         => 'mobile_phone',
            'filter_index'  => 'mobile_phone',
            'type'          => 'text',
        ));

        $this->addColumn('company_adress', array(
            'header'        => $helper->__('Company Adress'),
            'align'         => 'left',
            'index'         => array('street', 'city', 'state', 'zip'),
            'type'          => 'concat',
            'separator'     => ', ',
            'filter_index'  => 'zip',
        ));

        $this->addColumn('action', array(
            'header'        => Mage::helper('webinse_company')->__('Action'),
            'width'         => '50px',
            'type'          => 'action',
            'getter'        => 'getId',
            'actions'       => array(
                array(
                    'caption' => Mage::helper('webinse_company')->__('Edit'),
                    'url'     => array(
                        'base'=>'*/*/edit',
                         ),
                    'field'   => 'id'
                    )
            ),
            'filter'        => false,
            'sortable'      => false,
            'index'         => 'id',
        ));

        return parent::_prepareColumns();
    }

    protected function _prepareMassaction()
    {
        $helper = Mage::helper('webinse_company');
        $this->setMassactionIdField('entity_id');
        $this->getMassactionBlock()->setFormFieldName('entity_id');
        $this->getMassactionBlock()->addItem('delete', array(
            'label'         => $helper->__('Delete'),
            'url'           => $this->getUrl('*/*/massDelete')
        ));

        return $this;
    }

    public function getGridUrl()
    {
        return $this->getUrl('*/*/grid', array('_current'=>true));
    }

}