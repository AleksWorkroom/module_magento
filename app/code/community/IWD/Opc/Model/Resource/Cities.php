<?php

class IWD_Opc_Model_Resource_Cities extends Mage_Core_Model_Mysql4_Abstract
{

    public function _construct()
    {
        $this->_init('opc/table_cities', 'city_id');
    }

}