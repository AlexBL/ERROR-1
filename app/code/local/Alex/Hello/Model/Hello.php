      <?php
     
    class Alex_Hello_Model_Hello extends Mage_Core_Model_Abstract
    {
        public function _construct()
        {
            parent::_construct();
            $this->_init('<hello>/<hello>');
        }
    }