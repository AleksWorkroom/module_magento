<?php
class IWD_Opc_Model_Resource_Cities_Collection extends Mage_Core_Model_Mysql4_Collection_Abstract
{

    public function _construct()
    {
        parent::_construct();
        $this->_init('opc/cities');
    }

}