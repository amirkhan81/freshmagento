<?php
/**
 * @category    Bubble
 * @package     Bubble_CmsTree
 * @version     1.2.2
 * @copyright   Copyright (c) 2013 BubbleCode (http://shop.bubblecode.net)
 */
class Bubble_CmsTree_Block_Page_Html_Topmenu extends Bubble_CmsTree_Block_Catalog_Navigation
{
    public function shouldRenderPages()
    {
        return Mage::getStoreConfigFlag('bubble_cmstree/general/include_in_menu');
    }
}