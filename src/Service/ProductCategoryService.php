<?php

namespace App\Service;

use App\Entity\ProductCategory;
use Doctrine\ORM\EntityManagerInterface;
use Psr\SimpleCache\CacheInterface;

/**
 * @method ProductCategory[] getList()
 */
class ProductCategoryService extends AbstractService
{
    public function __construct(CacheInterface $cache, EntityManagerInterface $em)
    {
        parent::__construct($cache, $em, ProductCategory::class, 'product.category');
    }
}
