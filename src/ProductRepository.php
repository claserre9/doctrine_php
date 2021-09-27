<?php

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Query\ResultSetMapping;

class ProductRepository extends EntityRepository
{

    //with query builder
    public function getProductBeginningWith_D()
    {
        $qb = $this->createQueryBuilder('p')
            ->where('p.name like :name')
            ->setParameter('name', '%D%');

        $query = $qb->getQuery();

        return $query->getResult();
    }

    //with query
    public function getProductBeginningWith_D2()
    {

        $query = $this->getEntityManager()->createQuery(
            'SELECT p from PRODUCT p where p.name like :name '
        )->setParameter('name', '%D%');

        return $query->getResult();
    }

    public function getProductBeginningWith_D3()
    {
        $rsm = new ResultSetMapping;
        $rsm->addEntityResult('Product', 'p');
        $rsm->addFieldResult('p', 'id', 'id');
        $rsm->addFieldResult('p', 'name', 'name');

        $query = $this->getEntityManager()
            ->createNativeQuery('SELECT id, name from Product where name LIKE ? ', $rsm)
            ->setParameter('1', '%D%');

        return $query->getResult();
    }
}