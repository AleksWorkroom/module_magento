<?php
class IWD_Opc_Block_Adminhtml_Cities_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{

    protected function _construct()
    {
        $this->_blockGroup = 'opc';
        $this->_controller = 'adminhtml_cities';
    }

    public function getHeaderText()
    {
        $helper = Mage::helper('opc');
        $model = Mage::registry('current_cities');

        if ($model->getId()) {
            return $helper->__("Edit Cities item '%s'", $this->escapeHtml($model->getTitle()));
        } else {
            return $helper->__("Adt Cities item");
        }
    }

}