<?php
class IWD_Opc_Block_Adminhtml_Cities_Grid extends Mage_Adminhtml_Block_Widget_Grid
{

    protected function _prepareCollection()
    {
        $collection = Mage::getModel('opc/cities')->getCollection();
        $this->setCollection($collection);
        return parent::_prepareCollection();
    }

    protected function _prepareColumns()
    {

        $helper = Mage::helper('opc');

        $this->addColumn('city_id', array(
            'header' => $helper->__('Block ID'),
            'index' => 'city_id'
        ));

        $this->addColumn('city_name', array(
            'header' => $helper->__('Name'),
            'index' => 'city_name',
            'type' => 'text',
        ));

        $this->addColumn('price', array(
            'header' => $helper->__('Price'),
            'index' => 'price',
            'type' => 'text',
        ));


        return parent::_prepareColumns();
    }

    public function getRowUrl($model)
    {
        return $this->getUrl('*/*/edit', array(
            'id' => $model->getId(),
        ));
    }

}