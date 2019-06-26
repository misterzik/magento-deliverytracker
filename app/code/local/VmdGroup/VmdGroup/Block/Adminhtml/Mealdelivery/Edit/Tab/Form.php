<?php
/**
 * /\/\!st3rZ!k
 */
class VMDGroup_VMDGroup_Block_Adminhtml_Mealdelivery_Edit_Tab_Form extends Mage_Adminhtml_Block_Widget_Form
{
		protected function _prepareForm()
		{

				$form = new Varien_Data_Form();
				$this->setForm($form);
				$fieldset = $form->addFieldset("vmdgroup_form", array("legend"=>Mage::helper("vmdgroup")->__("Item information")));

				
						$fieldset->addField("name", "text", array(
						"label" => Mage::helper("vmdgroup")->__("Meal Delivery Date:"),
						"name" => "name",
						));
					

				if (Mage::getSingleton("adminhtml/session")->getMealdeliveryData())
				{
					$form->setValues(Mage::getSingleton("adminhtml/session")->getMealdeliveryData());
					Mage::getSingleton("adminhtml/session")->setMealdeliveryData(null);
				} 
				elseif(Mage::registry("mealdelivery_data")) {
				    $form->setValues(Mage::registry("mealdelivery_data")->getData());
				}
				return parent::_prepareForm();
		}
}
