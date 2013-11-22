<?php

class RK_Bestsellers_Block_Bestsellers extends Mage_Core_Block_Template
{

    protected function _construct()
    {
        $this->addData(array(
            'cache_lifetime'    => Mage::getStoreConfig('catalog/bestsellers/cache_lifetime'),
            'cache_tags'        => array(Mage_Catalog_Model_Product::CACHE_TAG),
        ));
    }

    public function getBestsellers($limit = 10)
    {
        $_collection = Mage::getResourceModel('reports/product_collection')
            ->addOrderedQty()
            ->addAttributeToSelect(array('name'))
            ->setStoreId(Mage::app()->getStore())
            ->setOrder('ordered_qty', 'desc')
            ->setPageSize($limit);

        return $_collection;
    }

}