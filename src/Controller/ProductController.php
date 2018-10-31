<?php

namespace App\Controller;

use App\Entity\ProductCategory;
use App\Entity\ProductSubCategory;
use App\Service\ProductService;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ProductController extends Controller
{
    private $service;

    public function __construct(ProductService $service)
    {
        $this->service = $service;
    }

    /**
     * @Route("/products", name="product_category_list")
     */
    public function categoryList()
    {
        return $this->render('website/product-category/list.html.twig');
    }

    /**
     * @Route("/products/{category}/{subCategory}", name="product_list")
     * @ParamConverter("category", options={"mapping": {"category": "slug"}})
     * @ParamConverter("subCategory", options={"mapping": {"subCategory": "slug"}})
     */
    public function list(ProductCategory $category, ProductSubCategory $subCategory)
    {
        return $this->render('website/product/list.html.twig', [
            'category' => $category,
            'subCategory' => $subCategory,
            'products' => $this->service->search($subCategory),
        ]);
    }
}
