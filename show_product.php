<?php
// show_product.php <id>
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\ORM\TransactionRequiredException;

require_once "bootstrap.php";

$id = $argv[1];
if (isset($entityManager)) {
    try {
        $product = $entityManager->find('Product', $id);
    } catch (OptimisticLockException $e) {
        die($e->getMessage());
    } catch (TransactionRequiredException $e) {
        die($e->getMessage());
    } catch (ORMException $e) {
        die($e->getMessage());
    }
}

if (empty($product)) {
    echo "No product found.\n";
    exit(1);
}

echo sprintf("-%s\n", $product->getName());