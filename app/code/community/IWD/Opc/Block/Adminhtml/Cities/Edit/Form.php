<?php
class IWD_Opc_Block_Adminhtml_Cities_Edit_Form extends Mage_Adminhtml_Block_Widget_Form
{

    protected function _prepareForm()
    {
        $helper = Mage::helper('opc');
        $model = Mage::registry('current_cities');

        $form = new Varien_Data_Form(array(
            'id' => 'edit_form',
            'action' => $this->getUrl('*/*/save', array(
                'id' => $this->getRequest()->getParam('id')
            )),
            'method' => 'post',
            'enctype' => 'multipart/form-data'
        ));

        $this->setForm($form);

        $fieldset = $form->addFieldset('news_form', array('legend' => $helper->__('Cities Information')));

        $fieldset->addField('city_name', 'text', array(
            'label' => $helper->__('Title'),
            'required' => true,
            'name' => 'city_name',
        ));

        $fieldset->addField('price', 'text', array(
            'label' => $helper->__('Price'),
            'required' => true,
            'name' => 'price',
        ));


        $formData = $model->getData();
        $form->setValues($formData);
        $form->setUseContainer(true);

        return parent::_prepareForm();
    }

}