<?php

namespace App\Controller;

use App\Entity\ProductSubCategory;
use App\Service\FilterCategoryService;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class FilterCategoryController extends Controller
{
    private $service;

    public function __construct(FilterCategoryService $service)
    {
        $this->service = $service;
    }

    public function sidebar(ProductSubCategory $currentSubCategory)
    {
        return $this->render('website/filter-category/_sidebar.html.twig', [
            'filterCategories' => $this->service->getListForSubCategory($currentSubCategory),
            'currentSubCategory' => $currentSubCategory,
        ]);
    }
}
