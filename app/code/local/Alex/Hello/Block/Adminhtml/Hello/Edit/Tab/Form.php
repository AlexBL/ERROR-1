<?php

 

class Alex_Hello_Block_Adminhtml_Hello_Edit_Tab_Form extends Mage_Adminhtml_Block_Widget_Form

{

    protected function _prepareForm()

    {

        $form = new Varien_Data_Form();

        $this->setForm($form);

        $fieldset = $form->addFieldset('hello_form', array('legend'=>Mage::helper('hello')->__('Item information')));

        

        $fieldset->addField('title', 'text', array(

            'label'     => Mage::helper('hello')->__('Title'),

            'class'     => 'required-entry',

            'required'  => true,

            'name'      => 'title',

        ));

 

        $fieldset->addField('status', 'select', array(

            'label'     => Mage::helper('hello')->__('Status'),

            'name'      => 'status',

            'values'    => array(

                array(

                    'value'     => 1,

                    'label'     => Mage::helper('hello')->__('Active'),

                ),

 

                array(

                    'value'     => 0,

                    'label'     => Mage::helper('hello')->__('Inactive'),

                ),

            ),

        ));

        

        $fieldset->addField('content', 'editor', array(

            'name'      => 'content',

            'label'     => Mage::helper('hello')->__('Content'),

            'title'     => Mage::helper('hello')->__('Content'),

            'style'     => 'width:98%; height:400px;',

            'wysiwyg'   => false,

            'required'  => true,

        ));

        

        if ( Mage::getSingleton('adminhtml/session')->get<Module>Data() )

        {

            $form->setValues(Mage::getSingleton('adminhtml/session')->get<Module>Data());

            Mage::getSingleton('adminhtml/session')->set<Module>Data(null);

        } elseif ( Mage::registry('hello_data') ) {

            $form->setValues(Mage::registry('hello_data')->getData());

        }

        return parent::_prepareForm();

    }

}