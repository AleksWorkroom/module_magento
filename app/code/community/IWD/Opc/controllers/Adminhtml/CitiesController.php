<?php
class IWD_Opc_Adminhtml_CitiesController extends Mage_Adminhtml_Controller_Action
{
    public function indexAction()
    {
        $this->loadLayout();
        $this->_setActiveMenu('opc');
        $contentBlock = $this->getLayout()->createBlock('opc/adminhtml_cities');
        $this->_addContent($contentBlock);
        $this->renderLayout();
    }

    public function newAction()
    {
        $this->_forward('edit');
    }

    public function editAction()
    {
        $id = (int) $this->getRequest()->getParam('id');
        Mage::register('current_cities', Mage::getModel('opc/cities')->load($id));

        $this->loadLayout()->_setActiveMenu('opc');
        $this->_addContent($this->getLayout()->createBlock('opc/adminhtml_cities_edit'));
        $this->renderLayout();
    }

    public function saveAction()
    {
        if ($data = $this->getRequest()->getPost()) {
            unset($data['image']);
            $id = $this->getRequest()->getParam('id');
            try {
                $model = Mage::getModel('opc/cities');
                $model->setData($data)->setId($id);
                if(!$model->getCreated()){
                    $model->setCreated(now());
                }
                $model->save();


                Mage::getSingleton('adminhtml/session')->addSuccess($this->__('City was saved successfully'));
                Mage::getSingleton('adminhtml/session')->setFormData(false);
                $this->_redirect('*/*/');
            } catch (Exception $e) {
                Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
                Mage::getSingleton('adminhtml/session')->setFormData($data);
                $this->_redirect('*/*/edit', array(
                    'id' => $this->getRequest()->getParam('id')
                ));
            }
            return;
        }
        Mage::getSingleton('adminhtml/session')->addError($this->__('Unable to find item to save'));
        $this->_redirect('*/*/');
    }
    public function deleteAction()
    {
        if ($id = $this->getRequest()->getParam('id')) {
            try {
                Mage::getModel('opc/cities')->setId($id)->delete();
                Mage::getSingleton('adminhtml/session')->addSuccess($this->__('City was deleted successfully'));
            } catch (Exception $e) {
                Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
                $this->_redirect('*/*/edit', array('id' => $id));
            }
        }
        $this->_redirect('*/*/');
    }

}