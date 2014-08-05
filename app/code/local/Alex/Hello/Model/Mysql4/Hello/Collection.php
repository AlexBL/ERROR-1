    <?php
     
    class Alex_Hello_Model_Mysql4_Hello_Collection extends Mage_Core_Model_Mysql4_Collection_Abstract
    {
        public function _construct()
        {
            //parent::__construct();
            $this->_init('hello/hello');
        }
    }