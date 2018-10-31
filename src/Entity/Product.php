<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Gedmo\SoftDeleteable\Traits\SoftDeleteableEntity;
use Gedmo\Timestampable\Traits\TimestampableEntity;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ProductRepository")
 */
class Product
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
     * @ORM\Column(type="string", length=100)
     */
    private $label;

    /**
     * @Gedmo\Slug(fields={"label"})
     * @ORM\Column(type="string", length=125, unique=true)
     */
    private $slug;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $description;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $detail;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\ProductModel", mappedBy="product", orphanRemoval=true)
     */
    private $models;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\ProductModel", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $defaultModel;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\ProductSubCategory", inversedBy="products")
     * @ORM\JoinColumn(nullable=false)
     */
    private $subCategory;

    public function __construct()
    {
        $this->models = new ArrayCollection();
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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getDetail(): ?string
    {
        return $this->detail;
    }

    public function setDetail(?string $detail): self
    {
        $this->detail = $detail;

        return $this;
    }

    /**
     * @return Collection|ProductModel[]
     */
    public function getModels(): Collection
    {
        return $this->models;
    }

    public function addModel(ProductModel $model): self
    {
        if (!$this->models->contains($model)) {
            $this->models[] = $model;
            $model->setProduct($this);
        }

        return $this;
    }

    public function removeModel(ProductModel $model): self
    {
        if ($this->models->contains($model)) {
            $this->models->removeElement($model);
            // set the owning side to null (unless already changed)
            if ($model->getProduct() === $this) {
                $model->setProduct(null);
            }
        }

        return $this;
    }

    public function getDefaultModel(): ?ProductModel
    {
        return $this->defaultModel;
    }

    public function setDefaultModel(ProductModel $defaultModel): self
    {
        $this->defaultModel = $defaultModel;

        return $this;
    }

    public function getSubCategory(): ?ProductSubCategory
    {
        return $this->subCategory;
    }

    public function setSubCategory(?ProductSubCategory $subCategory): self
    {
        $this->subCategory = $subCategory;

        return $this;
    }
}
