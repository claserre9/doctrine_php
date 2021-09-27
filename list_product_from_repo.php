<?php
// list_products.php

require_once "bootstrap.php";

if (isset($entityManager)) {
    $productRepository = $entityManager->getRepository("Product");
}
if (isset($productRepository)) {
    $products = $productRepository->getProductBeginningWith_D3();
}

if (!empty($products)) {
    foreach ($products as $product) {
        echo sprintf("-%s\n", $product->getName());
    }
}