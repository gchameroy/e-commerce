<?php

namespace App\Repository;

use App\Entity\ProductSubCategory;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method ProductSubCategory|null find($id, $lockMode = null, $lockVersion = null)
 * @method ProductSubCategory|null findOneBy(array $criteria, array $orderBy = null)
 * @method ProductSubCategory[]    findAll()
 * @method ProductSubCategory[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProductSubCategoryRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, ProductSubCategory::class);
    }

//    /**
//     * @return ProductSubCategory[] Returns an array of ProductSubCategory objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ProductSubCategory
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
