<?php

namespace App\Service;

use App\Entity\Filter;
use App\Entity\ProductSubCategory;
use App\Repository\FilterRepository;
use Doctrine\ORM\EntityManagerInterface;

/**
 * @method Filter[] getList()
 * @method FilterRepository getRepository()
 */
class FilterService extends AbstractService
{
    public function __construct(EntityManagerInterface $em)
    {
        parent::__construct($em, Filter::class);
    }

    public function getNbModelsForSubCategory(Filter $filter, ProductSubCategory $subCategory)
    {
        return $this->getRepository()->getNbModelsForSubCategory($filter, $subCategory);
    }
}
