<?php
/**
 * /\/\!st3rZ!k
 *
 * WORK IN PROGRESS...
 *
 */
class VMDGroup_VMDGroup_Adminhtml_Rss_RssController extends Mage_Core_Controller_Front_Action
{
	
		public function mealdeliveryAction()
		{

            //app\design\frontend\base\default\layout\rss.xml
			/*
				<rss_order_new>
					<block type="rss/order_new" output="toHtml" name="rss.order.new"/>
				</rss_order_new>
			*/
			//app\code\core\Mage\Rss\Block\Order\New.php
			//DEMO RSS CONTENT


			$this->getResponse()->setHeader('Content-type', 'text/xml; charset=UTF-8');
			$this->loadLayout(false);
			$this->renderLayout();
		}
			
    public function preDispatch()
    {
		
			if ($this->getRequest()->getActionName() == 'mealdelivery') {
				$this->_currentArea = 'adminhtml';
				Mage::helper('rss')->authAdmin('vmdgroup/vmdgroup');
			}
			
        return parent::preDispatch();
    }
}
	
	