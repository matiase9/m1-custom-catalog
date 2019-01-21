<?php


$installer = $this;

$installer->startSetup();

$installer->run("
ALTER TABLE sales_flat_quote_item
  ADD COLUMN `shipping_date` VARCHAR( 10 ) 

");


$installer->run("
ALTER TABLE `sales_flat_order_item`
  ADD COLUMN `shipping_date` VARCHAR( 10 )

");

$installer->endSetup();