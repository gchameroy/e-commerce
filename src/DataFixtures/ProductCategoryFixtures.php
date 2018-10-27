<?php

namespace App\DataFixtures;

use App\Entity\ProductCategory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class ProductCategoryFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $categories = ['Men', 'Women', 'Jewelry', 'Bags'];

        for ($i = 0; $i < 4; $i++) {
            $category = (new ProductCategory())
                ->setLabel($categories[$i]);
            $manager->persist($category);
            $this->setReference('product-category-' . $i, $category);
        }

        $manager->flush();
    }
}
