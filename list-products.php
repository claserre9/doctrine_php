<?php
// list_products.php
require_once "bootstrap.php";

if (isset($entityManager)) {
    $productRepository = $entityManager->getRepository(Product::class);
}
if (isset($productRepository)) {
    $products = $productRepository->findAll();
}

if (!empty($products)) {
    foreach ($products as $product) {
        echo sprintf("-%s\n", $product->getName());
    }
}