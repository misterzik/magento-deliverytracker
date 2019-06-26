<?php
/**
 * /\/\!st3rZ!k
 */
class VMDGroup_VMDGroup_Adminhtml_vmdgroupbackendController extends Mage_Adminhtml_Controller_Action
{

	protected function _isAllowed()
	{
		//return Mage::getSingleton('admin/session')->isAllowed('vmdgroup/vmdgroupbackend');
		return true;
	}

	public function indexAction()
    {
       $this->loadLayout();
	    $this->_title($this->__("Credits Page - VMD Developers!"));
	   $this->renderLayout();
    }
}
