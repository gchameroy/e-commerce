<?php

namespace App\Service;

use App\Entity\Product;
use App\Entity\ProductSubCategory;
use App\Repository\ProductRepository;
use Doctrine\ORM\EntityManagerInterface;

/**
 * @method Product[] getList()
 * @method ProductRepository getRepository()()
 */
class ProductService extends AbstractService
{
    public function __construct(EntityManagerInterface $em)
    {
        parent::__construct($em, Product::class);
    }

    /**
     * @param ProductSubCategory $subCategory
     * @return Product[]
     */
    public function search(ProductSubCategory $subCategory)
    {
        return $this->getRepository()->findBy([
            'subCategory' => $subCategory
        ]);
    }
}
