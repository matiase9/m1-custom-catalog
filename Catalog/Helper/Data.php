<?php

class WFS_Catalog_Helper_Data extends Mage_Core_Helper_Abstract
{
    const CATEGORY_FLOWER = 'flowers';

    /**
     * @param $categoryIds
     * @return bool
     */
    public function isFlower($categoryIds) {
        foreach($categoryIds as $id) {
            $category = Mage::getModel('catalog/category')
                ->setStoreId(Mage::app()->getStore()->getId())
                ->load($id);
            if ($category->getUrlKey() == self::CATEGORY_FLOWER) {
                return true;
            }
        }
        return false;
    }

    /**
     * @param $quote
     * @return bool
     */
    public function allFlowers($quote)
    {
        $listProducts = array();
        foreach ($quote as $item) {
            $listProducts[] = $item->getProduct();
        }
        foreach($listProducts as $product) {
            if (!self::isFlower($product->getCategoryIds())) {
                return false;
            }
        }
        return true;
    }

    /**
     * @return mixed
     */
    public function getOptionFlowers() {

        $idFlower = Mage::getModel('eav/entity_attribute')
            ->loadByCode('catalog_product','multiple_flowers')
            ->getId();
        $options = Mage::getModel('catalog/resource_eav_attribute')
            ->load($idFlower)
            ->getSource()
            ->getAllOptions();
        return $options;
    }

    /**
     * @param $listItems
     * @return array
     */
    public function filterByFlower($listItems)
    {
        $listProducts = array();
        $pValue = 0;
        $pValueDiscount = 0;
        $pWeight = 0;
        $pQty = 0;
        $pPhysical = 0;
        $freeMethod = 0;
        foreach ($listItems as $item) {
            if (empty($item->getShippingDate())) {
                $pValue += $item->getBaseRowTotal();
                $pValueDiscount += ($item->getBaseRowTotal() - $item->getBaseDiscountAmount());
                $pWeight += $item->getRowWeight();
                $pQty += $item->getQty();
                $pPhysical += $item->getBaseRowTotal();
                $freeMethod += 0;
                $listProducts[] = $item;
            }
        }
        return array( 'items' => $listProducts,
            'package_value' => $pValue,
            'package_value_with_discount' => $pValueDiscount,
            'package_weight' => $pWeight,
            'package_qty' => $pQty,
            'package_physical' => $pPhysical,
            'package_freemethod' => $freeMethod
            );
    }
}
