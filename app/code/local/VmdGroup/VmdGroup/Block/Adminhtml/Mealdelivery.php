<?php
/**
 * /\/\!st3rZ!k
 *
 * Simple Constructor, We are utilizing this page
 * to tight in all controller use within the module
 * We will be ignoring the vmdgroupbackend.php File
 * Since most of the logistic is done on this side.
 */

class VMDGroup_VMDGroup_Block_Adminhtml_Mealdelivery extends Mage_Adminhtml_Block_Widget_Grid_Container{

	public function __construct()
	{
        // Calls Controllers
        $this->_controller = "adminhtml_mealdelivery";
        // Calls BlockGroups with FE
        $this->_blockGroup = "vmdgroup";
        // Call Header Text/Buttons New | Edit
        $this->_headerText = Mage::helper("vmdgroup")->__("Meal-delivery Manager");
        // Call First Object to Add New entry to Data
        $this->_addButtonLabel = Mage::helper("vmdgroup")->__("Add New Item");
        parent::__construct();
	
	}

}