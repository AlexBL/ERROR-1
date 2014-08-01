<?php

 

class Alex_Hello_Block_Adminhtml_Hello_Edit extends Mage_Adminhtml_Block_Widget_Form_Container

{

    public function __construct()

    {

        parent::__construct();

                

        $this->_objectId = 'id';

        $this->_blockGroup = 'hello';

        $this->_controller = 'adminhtml_hello';

 

        $this->_updateButton('save', 'label', Mage::helper('hello')->__('Save Item'));

        $this->_updateButton('delete', 'label', Mage::helper('hello')->__('Delete Item'));

    }

 

    public function getHeaderText()

    {

        if( Mage::registry('hello_data') && Mage::registry('hello_data')->getId() ) {

            return Mage::helper('hello')->__("Edit Item '%s'", $this->htmlEscape(Mage::registry('hello_data')->getTitle()));

        } else {

            return Mage::helper('hello')->__('Add Item');

        }

    }

}