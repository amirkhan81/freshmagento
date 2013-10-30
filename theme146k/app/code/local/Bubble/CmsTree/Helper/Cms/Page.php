<?php
/**
 * @category    Bubble
 * @package     Bubble_CmsTree
 * @version     1.2.2
 * @copyright   Copyright (c) 2013 BubbleCode (http://shop.bubblecode.net)
 */
class Bubble_CmsTree_Helper_Cms_Page extends Mage_Cms_Helper_Page
{
    public function renderPage(Mage_Core_Controller_Front_Action $action, $pageId = null)
    {
        $storeId = Mage::app()->getStore()->getId();
        $customerGroupId = Mage::getSingleton('customer/session')->getCustomerGroupId();
        if (!$this->isAllowed($storeId, $customerGroupId, $pageId)) {
            return false;
        }

        return parent::renderPage($action, $pageId);
    }

    public function isAllowed($storeId, $customerGroupId, $pageId)
    {
        $page = Mage::getModel('cms/page')->load($pageId);
        if ($page->getStoreId() == 0 && !in_array($storeId, $page->getStores())) {
            return false;
        }

        if (!$this->isPermissionsEnabled($storeId)) {
            return true;
        }

        return Mage::getResourceModel('cms/page_permission')->exists($storeId, $customerGroupId, $pageId);
    }

    public function isPermissionsEnabled($store = null)
    {
        return Mage::getStoreConfigFlag('bubble_cmstree/general/permissions_enabled', Mage::app()->getStore($store));
    }

    public function isCreatePermanentRedirects($store = null)
    {
        return Mage::getStoreConfigFlag('bubble_cmstree/general/save_rewrites_history', Mage::app()->getStore($store));
    }
}