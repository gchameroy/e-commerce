<?php

namespace App\Repository;

use App\Entity\FilterCategory;
use App\Entity\ProductSubCategory;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method FilterCategory|null find($id, $lockMode = null, $lockVersion = null)
 * @method FilterCategory|null findOneBy(array $criteria, array $orderBy = null)
 * @method FilterCategory[]    findAll()
 * @method FilterCategory[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FilterCategoryRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, FilterCategory::class);
    }

    public function getListForSubCategory(ProductSubCategory $subCategory)
    {
        return $this->createQueryBuilder('fc')
            ->join('fc.filters', 'f')
            ->join('f.productModels', 'pm')
            ->join('pm.product', 'p')
            ->andWhere('p.subCategory = :subCategory')
            ->setParameter('subCategory', $subCategory)
            ->getQuery()
            ->getResult()
        ;
    }
}
