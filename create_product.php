<?php
// create_product.php <name>
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;

require_once "bootstrap.php";

$newProductName = $argv[1];

$product = new Product();
$product->setName($newProductName);

if (isset($entityManager)) {
    try {
        $entityManager->persist($product);
    } catch (ORMException $e) {
    }
}
if (isset($entityManager)) {
    try {
        $entityManager->flush();
    } catch (OptimisticLockException $e) {
        die($e->getMessage());
    } catch (ORMException $e) {
        die($e->getMessage());
    }
}

echo "Created Product with ID " . $product->getId() . "\n";