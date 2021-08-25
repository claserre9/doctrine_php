<?php
// cli-config.php
use Doctrine\ORM\Tools\Console\ConsoleRunner;

require_once "bootstrap.php";

if (isset($entityManager)) {
    return ConsoleRunner::createHelperSet($entityManager);
}