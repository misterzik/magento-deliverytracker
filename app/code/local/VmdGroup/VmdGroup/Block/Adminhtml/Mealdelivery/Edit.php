<?php
/**
 * /\/\!st3rZ!k
 *
 * Edit Views
 */
class VMDGroup_VMDGroup_Block_Adminhtml_Mealdelivery_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{
		public function __construct()
		{

				parent::__construct();
				$this->_objectId = "date_id";
				$this->_blockGroup = "vmdgroup";
				$this->_controller = "adminhtml_mealdelivery";
				$this->_updateButton("save", "label", Mage::helper("vmdgroup")->__("Save Item"));
				$this->_updateButton("delete", "label", Mage::helper("vmdgroup")->__("Delete Item"));

				$this->_addButton("saveandcontinue", array(
					"label"     => Mage::helper("vmdgroup")->__("Save And Continue Edit"),
					"onclick"   => "saveAndContinueEdit()",
					"class"     => "save",
				), -100);



				$this->_formScripts[] = "

							function saveAndContinueEdit(){
								editForm.submit($('edit_form').action+'back/edit/');
							}
						";
		}

		public function getHeaderText()
		{
				if( Mage::registry("mealdelivery_data") && Mage::registry("mealdelivery_data")->getId() ){

				    return Mage::helper("vmdgroup")->__("Edit Item '%s'", $this->htmlEscape(Mage::registry("mealdelivery_data")->getId()));

				} 
				else{

				     return Mage::helper("vmdgroup")->__("Add Item");

				}
		}
}