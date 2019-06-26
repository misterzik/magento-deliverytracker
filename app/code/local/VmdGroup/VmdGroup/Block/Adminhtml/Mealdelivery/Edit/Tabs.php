<?php
/**
 * /\/\!st3rZ!k
 */
class VMDGroup_VMDGroup_Block_Adminhtml_Mealdelivery_Edit_Tabs extends Mage_Adminhtml_Block_Widget_Tabs
{
    public function __construct()
    {
        parent::__construct();
        $this->setId("mealdelivery_tabs");
        $this->setDestElementId("edit_form");
        $this->setTitle(Mage::helper("vmdgroup")->__("Meal Information"));
    }
    protected function _beforeToHtml()
    {
        $this->addTab("form_section", array(
            "label" => Mage::helper("vmdgroup")->__("Meal Delivery Info"),
            "title" => Mage::helper("vmdgroup")->__("Meal Delivery Default"),
            "content" => $this->getLayout()->createBlock("vmdgroup/adminhtml_mealdelivery_edit_tab_form")->toHtml(),
        ));
        return parent::_beforeToHtml();
    }

}
