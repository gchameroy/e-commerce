<?php

namespace App\Controller;

use App\Service\ProductCategoryService;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class LayoutController extends Controller
{
    public function navtop(ProductCategoryService $service)
    {
        return $this->render('website/layout/_navtop.html.twig', [
            'categories' => $service->getList(),
        ]);
    }
}
