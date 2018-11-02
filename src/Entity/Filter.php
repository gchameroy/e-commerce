<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Gedmo\SoftDeleteable\Traits\SoftDeleteableEntity;
use Gedmo\Timestampable\Traits\TimestampableEntity;

/**
 * @ORM\Entity(repositoryClass="App\Repository\FilterRepository")
 */
class Filter
{
    use TimestampableEntity;
    use SoftDeleteableEntity;

    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $label;

    /**
     * @Gedmo\Slug(fields={"label"})
     * @ORM\Column(type="string", length=25, unique=true)
     */
    private $slug;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\FilterCategory", inversedBy="filters")
     * @ORM\JoinColumn(nullable=false)
     */
    private $category;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\ProductModel", mappedBy="filters")
     */
    private $productModels;

    public function __construct()
    {
        $this->productModels = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLabel(): ?string
    {
        return $this->label;
    }

    public function setLabel(string $label): self
    {
        $this->label = $label;

        return $this;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function getCategory(): ?FilterCategory
    {
        return $this->category;
    }

    public function setCategory(?FilterCategory $category): self
    {
        $this->category = $category;

        return $this;
    }

    /**
     * @return Collection|ProductModel[]
     */
    public function getProductModels(): Collection
    {
        return $this->productModels;
    }

    public function addProductModel(ProductModel $productModel): self
    {
        if (!$this->productModels->contains($productModel)) {
            $this->productModels[] = $productModel;
            $productModel->addFilter($this);
        }

        return $this;
    }

    public function removeProductModel(ProductModel $productModel): self
    {
        if ($this->productModels->contains($productModel)) {
            $this->productModels->removeElement($productModel);
            $productModel->removeFilter($this);
        }

        return $this;
    }
}
