<?php

class IWD_Opc_Model_Cities extends Mage_Core_Model_Abstract
{

    public function _construct()
    {
        parent::_construct();
        $this->_init('opc/cities');
    }

    public function getImageUrl()
    {
        $helper = Mage::helper('opc');
        if ($this->getId()) {
            return $helper->getImageUrl($this->getId());
        }
        return null;
    }

}