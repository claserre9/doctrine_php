<?php
// update_product.php <id> <new-name>
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;

require_once "bootstrap.php";

list($file, $id, $newName) = $argv;

if(isset($entityManager)){
    $product = $entityManager->find('Product', $id);
}


if (empty($product)) {
    echo "Product $id does not exist.\n";
    exit(1);
}

$product->setName($newName);

if (isset($entityManager)) {
    try {
        $entityManager->flush();
    } catch (OptimisticLockException $e) {
        die($e->getMessage());
    } catch (ORMException $e) {
        die($e->getMessage());
    }
}
