<?php

namespace Dtn\FeaturedProducts\Block\Product;

class ProductsList extends \Magento\CatalogWidget\Block\Product\ProductsList
{
    public  function createCollection()
    {
        $collection = $this->productCollectionFactory->create();
        $this->setTemplate("Magento_CatalogWidget::product/widget/content/grid.phtml");
        $collection->setVisibility($this->catalogProductVisibility->getVisibleInCatalogIds());

        $collection = $this->_addProductAttributesAndPrices($collection)
                            ->setOrder($this->getData('sort_order'), $this->getData('type_sort'))
                            ->setPageSize($this->getData('products_count'))
                            ->addStoreFilter();
        if ($this->getData('display_product')=='special_price') {
            $collection->addAttributeToFilter('special_price', array('notnull'=>true));
        }
        return $collection;
    }
}