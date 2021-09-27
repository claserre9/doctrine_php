<?php
// create_product.php <name> <feature_name>
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;

require_once "./src/Feature.php";
require_once "./src/Product.php";

require_once "bootstrap.php";

[$filename, $newProductName, $newFeatureName] = $argv;

$feature = new Feature();
$feature->setName($newFeatureName);

$product = new Product();
$product->setName($newProductName);

$product->addFeature($feature);



if (isset($entityManager)) {
    try {
//        $entityManager->persist($feature);
        $entityManager->persist($product);
    } catch (ORMException $e) {
        die($e->getMessage());
    }
}
if (isset($entityManager)) {
    try {
        $entityManager->flush();
    } catch (OptimisticLockException | ORMException $e) {
        die($e->getMessage());
    }
}

echo "Created Product with ID " . $product->getId() . "\n";