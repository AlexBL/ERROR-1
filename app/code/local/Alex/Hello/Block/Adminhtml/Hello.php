<?php

 

class Alex_Hello_Block_Adminhtml_Hello extends Mage_Adminhtml_Block_Widget_Grid_Container

{

    public function __construct()

    {

        $this->_controller = 'adminhtml_hello';

        $this->_blockGroup = 'hello';

        $this->_headerText = Mage::helper('hello')->__('Item Manager');

        $this->_addButtonLabel = Mage::helper('hello')->__('Add Item');

        parent::__construct();

    }

}