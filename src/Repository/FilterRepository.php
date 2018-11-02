<?php

namespace App\Repository;

use App\Entity\Filter;
use App\Entity\ProductSubCategory;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Filter|null find($id, $lockMode = null, $lockVersion = null)
 * @method Filter|null findOneBy(array $criteria, array $orderBy = null)
 * @method Filter[]    findAll()
 * @method Filter[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FilterRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Filter::class);
    }

    public function getNbModelsForSubCategory(Filter $filter, ProductSubCategory $subCategory): int
    {
        return $this->createQueryBuilder('f')
            ->select('count(distinct p.id)')
            ->join('f.productModels', 'pm')
            ->join('pm.product', 'p')
            ->andWhere('f = :filter')
            ->setParameter('filter', $filter)
            ->andWhere('p.subCategory = :subCategory')
            ->setParameter('subCategory', $subCategory)
            ->getQuery()
            ->getSingleScalarResult()
        ;
    }
}
