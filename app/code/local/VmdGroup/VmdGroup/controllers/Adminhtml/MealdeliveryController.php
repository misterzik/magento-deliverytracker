<?php
/**
 * /\/\!st3rZ!k
 *
 * Ain't Safe, Ain't Safe, Got the guns on in the Rave!
 * Highly Protected Functions!
 */
class VMDGroup_VMDGroup_Adminhtml_MealdeliveryController extends Mage_Adminhtml_Controller_Action
{
		protected function _isAllowed()
		{
		//return Mage::getSingleton('admin/session')->isAllowed('vmdgroup/mealdelivery');
			return true;
		}

		protected function _initAction()
		{
				$this->loadLayout()->_setActiveMenu("vmdgroup/mealdelivery")->_addBreadcrumb(Mage::helper("adminhtml")->__("Mealdelivery  Manager"),Mage::helper("adminhtml")->__("Mealdelivery Manager"));
				return $this;
		}
		public function indexAction() 
		{
			    $this->_title($this->__("vmdgroup"));
			    $this->_title($this->__("Manager Mealdelivery"));

				$this->_initAction();
				$this->renderLayout();
		}
		public function editAction()
		{			    
			    $this->_title($this->__("vmdgroup"));
				$this->_title($this->__("Mealdelivery"));
			    $this->_title($this->__("Edit Item"));
				
				$id = $this->getRequest()->getParam("id");
				$model = Mage::getModel("vmdgroup/mealdelivery")->load($id);
				if ($model->getId()) {
					Mage::register("mealdelivery_data", $model);
					$this->loadLayout();
					$this->_setActiveMenu("vmdgroup/mealdelivery");
					$this->_addBreadcrumb(Mage::helper("adminhtml")->__("Mealdelivery Manager"), Mage::helper("adminhtml")->__("Mealdelivery Manager"));
					$this->_addBreadcrumb(Mage::helper("adminhtml")->__("Mealdelivery Description"), Mage::helper("adminhtml")->__("Mealdelivery Description"));
					$this->getLayout()->getBlock("head")->setCanLoadExtJs(true);
					$this->_addContent($this->getLayout()->createBlock("vmdgroup/adminhtml_mealdelivery_edit"))->_addLeft($this->getLayout()->createBlock("vmdgroup/adminhtml_mealdelivery_edit_tabs"));
					$this->renderLayout();
				} 
				else {
					Mage::getSingleton("adminhtml/session")->addError(Mage::helper("vmdgroup")->__("Item does not exist."));
					$this->_redirect("*/*/");
				}
		}

		public function newAction()
		{

		$this->_title($this->__("vmdgroup"));
		$this->_title($this->__("Mealdelivery"));
		$this->_title($this->__("New Item"));

        $id   = $this->getRequest()->getParam("id");
		$model  = Mage::getModel("vmdgroup/mealdelivery")->load($id);

		$data = Mage::getSingleton("adminhtml/session")->getFormData(true);
		if (!empty($data)) {
			$model->setData($data);
		}

		Mage::register("mealdelivery_data", $model);

		$this->loadLayout();
		$this->_setActiveMenu("vmdgroup/mealdelivery");

		$this->getLayout()->getBlock("head")->setCanLoadExtJs(true);

		$this->_addBreadcrumb(Mage::helper("adminhtml")->__("Mealdelivery Manager"), Mage::helper("adminhtml")->__("Mealdelivery Manager"));
		$this->_addBreadcrumb(Mage::helper("adminhtml")->__("Mealdelivery Description"), Mage::helper("adminhtml")->__("Mealdelivery Description"));


		$this->_addContent($this->getLayout()->createBlock("vmdgroup/adminhtml_mealdelivery_edit"))->_addLeft($this->getLayout()->createBlock("vmdgroup/adminhtml_mealdelivery_edit_tabs"));

		$this->renderLayout();

		}

        /**
        *  Save Functionality
        *  MrZ
        */

		public function saveAction()
		{

			$post_data=$this->getRequest()->getPost();


				if ($post_data) {

					try {

						

						$model = Mage::getModel("vmdgroup/mealdelivery")
						->addData($post_data)
						->setId($this->getRequest()->getParam("id"))
						->save();

						Mage::getSingleton("adminhtml/session")->addSuccess(Mage::helper("adminhtml")->__("Mealdelivery was successfully saved"));
						Mage::getSingleton("adminhtml/session")->setMealdeliveryData(false);

						if ($this->getRequest()->getParam("back")) {
							$this->_redirect("*/*/edit", array("id" => $model->getId()));
							return;
						}
						$this->_redirect("*/*/");
						return;
					} 
					catch (Exception $e) {
						Mage::getSingleton("adminhtml/session")->addError($e->getMessage());
						Mage::getSingleton("adminhtml/session")->setMealdeliveryData($this->getRequest()->getPost());
						$this->_redirect("*/*/edit", array("id" => $this->getRequest()->getParam("id")));
					return;
					}

				}
				$this->_redirect("*/*/");
		}


        /**
        *  Delete Functionality Pri
        *  MrZ
        */

		public function deleteAction()
		{
				if( $this->getRequest()->getParam("id") > 0 ) {
					try {
						$model = Mage::getModel("vmdgroup/mealdelivery");
						$model->setId($this->getRequest()->getParam("id"))->delete();
						Mage::getSingleton("adminhtml/session")->addSuccess(Mage::helper("adminhtml")->__("Item was successfully deleted"));
						$this->_redirect("*/*/");
					} 
					catch (Exception $e) {
						Mage::getSingleton("adminhtml/session")->addError($e->getMessage());
						$this->_redirect("*/*/edit", array("id" => $this->getRequest()->getParam("id")));
					}
				}
				$this->_redirect("*/*/");
		}

		 
		/**
		 *  Export order grid to Excel XML
         *  I will be switching this to a proper
         *  file.
		 */
		public function exportExcelAction()
		{
			$fileName   = 'mealdelivery.csv';
			$grid       = $this->getLayout()->createBlock('vmdgroup/adminhtml_mealdelivery_grid');
			$this->_prepareDownloadResponse($fileName, $grid->getExcelFile($fileName));
		}
}
