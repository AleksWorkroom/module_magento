<?php
class IWD_Opc_Block_Adminhtml_Cities extends Mage_Adminhtml_Block_Widget_Grid_Container

{
    protected function _construct()
    {
        parent::_construct();

        $helper = Mage::helper('opc');
        $this->_blockGroup = 'opc';
        $this->_controller = 'adminhtml_cities';

        $this->_headerText = $helper->__('Cities Management');
    }
}