<?php

 

class Alex_Hello_Adminhtml_HelloController extends Mage_Adminhtml_Controller_Action

{

 

    protected function _initAction()

    {

        $this->loadLayout()

            ->_setActiveMenu('hello/items')

            ->_addBreadcrumb(Mage::helper('adminhtml')->__('Items Manager'), Mage::helper('adminhtml')->__('Item Manager'));

        return $this;

    }    

    

    public function indexAction() {

        $this->_initAction();        

        $this->_addContent($this->getLayout()->createBlock('hello/adminhtml_hello'));

        $this->renderLayout();

    }

 

    public function editAction()

    {

        $helloId     = $this->getRequest()->getParam('id');

        $helloModel  = Mage::getModel('hello/hello')->load($helloId);

 

        if ($helloModel->getId() || $helloId == 0) {

 

            Mage::register('hello_data', $helloModel);

 

            $this->loadLayout();

            $this->_setActiveMenu('hello/items');

            

            $this->_addBreadcrumb(Mage::helper('adminhtml')->__('Item Manager'), Mage::helper('adminhtml')->__('Item Manager'));

            $this->_addBreadcrumb(Mage::helper('adminhtml')->__('Item News'), Mage::helper('adminhtml')->__('Item News'));

            

            $this->getLayout()->getBlock('head')->setCanLoadExtJs(true);

            

            $this->_addContent($this->getLayout()->createBlock('hello/adminhtml_hello_edit'))

                 ->_addLeft($this->getLayout()->createBlock('hello/adminhtml_hello_edit_tabs'));

                

            $this->renderLayout();

        } else {

            Mage::getSingleton('adminhtml/session')->addError(Mage::helper('hello')->__('Item does not exist'));

            $this->_redirect('*/*/');

        }

    }

    

    public function newAction()

    {

        $this->_forward('edit');

    }

    

    public function saveAction()

    {

        if ( $this->getRequest()->getPost() ) {

            try {

                $postData = $this->getRequest()->getPost();

                $helloModel = Mage::getModel('hello/hello');

                

                $helloModel->setId($this->getRequest()->getParam('id'))

                    ->setTitle($postData['title'])

                    ->setContent($postData['content'])

                    ->setStatus($postData['status'])

                    ->save();

                

                Mage::getSingleton('adminhtml/session')->addSuccess(Mage::helper('adminhtml')->__('Item was successfully saved'));

                Mage::getSingleton('adminhtml/session')->setHelloData(false);

 

                $this->_redirect('*/*/');

                return;

            } catch (Exception $e) {

                Mage::getSingleton('adminhtml/session')->addError($e->getMessage());

                Mage::getSingleton('adminhtml/session')->setHelloData($this->getRequest()->getPost());

                $this->_redirect('*/*/edit', array('id' => $this->getRequest()->getParam('id')));

                return;

            }

        }

        $this->_redirect('*/*/');

    }

    

    public function deleteAction()

    {

        if( $this->getRequest()->getParam('id') > 0 ) {

            try {

                $helloModel = Mage::getModel('hello/hello');

                

                $helloModel->setId($this->getRequest()->getParam('id'))

                    ->delete();

                    

                Mage::getSingleton('adminhtml/session')->addSuccess(Mage::helper('adminhtml')->__('Item was successfully deleted'));

                $this->_redirect('*/*/');

            } catch (Exception $e) {

                Mage::getSingleton('adminhtml/session')->addError($e->getMessage());

                $this->_redirect('*/*/edit', array('id' => $this->getRequest()->getParam('id')));

            }

        }

        $this->_redirect('*/*/');

    }

    /**
     * Product grid for AJAX request.
     * Sort and filter result for example.
     */

    public function gridAction()

    {

        $this->loadLayout();

        $this->getResponse()->setBody(

               $this->getLayout()->createBlock('hello/adminhtml_hello_grid')->toHtml()

        );

    }

}