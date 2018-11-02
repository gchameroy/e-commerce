<?php

namespace App\Service;

use App\Entity\ProductCategory;
use App\Repository\ProductCategoryRepository;
use Doctrine\ORM\EntityManagerInterface;

/**
 * @method ProductCategory[] getList()
 * @method ProductCategoryRepository getRepository()
 */
class ProductCategoryService extends AbstractService
{
    public function __construct(EntityManagerInterface $em)
    {
        parent::__construct($em, ProductCategory::class);
    }
}
