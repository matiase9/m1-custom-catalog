<?php

$installer = $this;
$installer->startSetup();

$data = array(
    'label' => 'Multiple Flowers',
    'type' => 'varchar',
    'group' => 'WFS',
    'input' => 'multiselect',
    'backend' => 'eav/entity_attribute_backend_array',
    'frontend' => '',
    'global' => Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_STORE,
    'visible' => true,
    'required' => false,
    'user_defined' => true,
    'searchable' => false,
    'filterable' => false,
    'comparable' => false,
    'visible_on_front' => false,
    'visible_in_advanced_search' => false,
    'unique' => false,
    'is_filterable' => 1,
    'is_filterable_in_search' => 1,
    'is_html_allowed_on_front' => 1,
    'used_in_product_listing' => 1
);

$installer->addAttribute('catalog_product', 'multiple_flowers', $data);

$installer->endSetup();