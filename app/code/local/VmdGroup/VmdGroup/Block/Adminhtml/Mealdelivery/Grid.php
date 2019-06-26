<?php
/**
 * /\/\!st3rZ!k
 *
 * Grid Functions Kudi, The Kudi says ?
 */
class VMDGroup_VMDGroup_Block_Adminhtml_Mealdelivery_Grid extends Mage_Adminhtml_Block_Widget_Grid
{

    /**
     * Aint Safe, Aint Safe, Tell your Corp to Pipe up!
     */
		public function __construct()
		{
				parent::__construct();
				$this->setId("mealdeliveryGrid");
				$this->setDefaultSort("date_id");
				$this->setDefaultDir("DESC");
				$this->setSaveParametersInSession(true);
		}

		protected function _prepareCollection()
		{
				$collection = Mage::getModel("vmdgroup/mealdelivery")->getCollection();
				$this->setCollection($collection);
				return parent::_prepareCollection();
		}
		protected function _prepareColumns()
		{
				$this->addColumn("date_id", array(
				"header" => Mage::helper("vmdgroup")->__("ID"),
				"align" =>"right",
				"width" => "50px",
			    "type" => "number",
				"index" => "date_id",
				));
                
				$this->addColumn("name", array(
				"header" => Mage::helper("vmdgroup")->__("Meal Delivery Date"),
				"index" => "name",
				));				
		 $this->addRssList('vmdgroup/adminhtml_rss_rss/mealdelivery', Mage::helper('vmdgroup')->__('RSS')); 
			$this->addExportType('*/*/exportExcel', Mage::helper('sales')->__('Excel'));

				return parent::_prepareColumns();
		}

		public function getRowUrl($row)
		{
			   return $this->getUrl("*/*/edit", array("id" => $row->getId()));
		}
		

}