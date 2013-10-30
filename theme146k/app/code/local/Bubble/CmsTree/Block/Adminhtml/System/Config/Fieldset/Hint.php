<?php
/**
 * @category    Bubble
 * @package     Bubble_CmsTree
 * @version     1.2.2
 * @copyright   Copyright (c) 2013 BubbleCode (http://shop.bubblecode.net)
 */
class Bubble_CmsTree_Block_Adminhtml_System_Config_Fieldset_Hint
    extends Mage_Adminhtml_Block_Abstract
    implements Varien_Data_Form_Element_Renderer_Interface
{
    protected $_template = 'bubble/cmstree/system/config/fieldset/hint.phtml';

    public function render(Varien_Data_Form_Element_Abstract $element)
    {
        return $this->toHtml();
    }
}