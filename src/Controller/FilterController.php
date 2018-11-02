<?php

namespace App\Controller;

use App\Entity\Filter;
use App\Entity\ProductSubCategory;
use App\Service\FilterService;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class FilterController extends Controller
{
    private $service;

    public function __construct(FilterService $service)
    {
        $this->service = $service;
    }

    public function sidebar(Filter $filter, ProductSubCategory $currentSubCategory)
    {
        return $this->render('website/filter/_sidebar.html.twig', [
            'filter' => $filter,
            'nbProducts' => $this->service->getNbModelsForSubCategory($filter, $currentSubCategory),
        ]);
    }
}
