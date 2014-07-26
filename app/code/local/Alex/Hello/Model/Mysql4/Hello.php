    <?php
     
    class Alex_Hello_Model_Mysql4_Hello extends Mage_Core_Model_Mysql4_Abstract
    {
        public function _construct()
        {   
            $this->_init('<hello>/<hello>', '<hello>_id');
        }
    }