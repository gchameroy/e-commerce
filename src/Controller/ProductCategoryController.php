<?php

namespace App\Controller;

use App\Entity\ProductSubCategory;
use App\Service\ProductCategoryService;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ProductCategoryController extends Controller
{
    private $service;

    public function __construct(ProductCategoryService $service)
    {
        $this->service = $service;
    }

    public function highlights()
    {
        return $this->render('website/product-category/_highlights.html.twig', [
            'categories' => $this->service->getList(),
        ]);
    }

    public function sidebar(ProductSubCategory $currentSubCategory)
    {
        return $this->render('website/product-category/_sidebar.html.twig', [
            'categories' => $this->service->getList(),
            'currentSubCategory' => $currentSubCategory,
        ]);
    }
}
