<?php

namespace App\Service;

use App\Entity\ProductCategory;
use Doctrine\ORM\EntityManagerInterface;

/**
 * @method ProductCategory[] getList()
 */
class ProductCategoryService extends AbstractService
{
    public function __construct(EntityManagerInterface $em)
    {
        parent::__construct($em, ProductCategory::class);
    }
}
