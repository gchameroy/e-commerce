<?php

namespace App\Service;

use App\Entity\FilterCategory;
use App\Entity\ProductSubCategory;
use App\Repository\FilterCategoryRepository;
use Doctrine\ORM\EntityManagerInterface;

/**
 * @method FilterCategory[] getList()
 * @method FilterCategoryRepository getRepository()
 */
class FilterCategoryService extends AbstractService
{
    public function __construct(EntityManagerInterface $em)
    {
        parent::__construct($em, FilterCategory::class);
    }

    public function getListForSubCategory(ProductSubCategory $subCategory)
    {
        return $this->getRepository()->getListForSubCategory($subCategory);
    }
}
