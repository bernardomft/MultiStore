<?php

namespace App\Entity;

use App\Repository\CategoryRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CategoryRepository::class)
 */
class Category
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $desciption;

    /**
     * @ORM\OneToMany(targetEntity=Product::class, mappedBy="idCategory")
     */
    private $products;

    /**
     * @ORM\OneToMany(targetEntity=SubCategory::class, mappedBy="idCategory")
     */
    private $subCategories;

    /**
     * @ORM\OneToMany(targetEntity=Smartphone::class, mappedBy="idCategory")
     */
    private $smartphones;

    /**
     * @ORM\OneToMany(targetEntity=Tablet::class, mappedBy="idCategory")
     */
    private $tablets;

    public function __construct()
    {
        $this->products = new ArrayCollection();
        $this->subCategories = new ArrayCollection();
        $this->smartphones = new ArrayCollection();
        $this->tablets = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getDesciption(): ?string
    {
        return $this->desciption;
    }

    public function setDesciption(string $desciption): self
    {
        $this->desciption = $desciption;

        return $this;
    }

    /**
     * @return Collection|Product[]
     */
    public function getProducts(): Collection
    {
        return $this->products;
    }

    public function addProduct(Product $product): self
    {
        if (!$this->products->contains($product)) {
            $this->products[] = $product;
            $product->setIdCategory($this);
        }

        return $this;
    }

    public function removeProduct(Product $product): self
    {
        if ($this->products->removeElement($product)) {
            // set the owning side to null (unless already changed)
            if ($product->getIdCategory() === $this) {
                $product->setIdCategory(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|SubCategory[]
     */
    public function getSubCategories(): Collection
    {
        return $this->subCategories;
    }

    public function addSubCategory(SubCategory $subCategory): self
    {
        if (!$this->subCategories->contains($subCategory)) {
            $this->subCategories[] = $subCategory;
            $subCategory->setIdCategory($this);
        }

        return $this;
    }

    public function removeSubCategory(SubCategory $subCategory): self
    {
        if ($this->subCategories->removeElement($subCategory)) {
            // set the owning side to null (unless already changed)
            if ($subCategory->getIdCategory() === $this) {
                $subCategory->setIdCategory(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Smartphone[]
     */
    public function getSmartphones(): Collection
    {
        return $this->smartphones;
    }

    public function addSmartphone(Smartphone $smartphone): self
    {
        if (!$this->smartphones->contains($smartphone)) {
            $this->smartphones[] = $smartphone;
            $smartphone->setIdCategory($this);
        }

        return $this;
    }

    public function removeSmartphone(Smartphone $smartphone): self
    {
        if ($this->smartphones->removeElement($smartphone)) {
            // set the owning side to null (unless already changed)
            if ($smartphone->getIdCategory() === $this) {
                $smartphone->setIdCategory(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Tablet[]
     */
    public function getTablets(): Collection
    {
        return $this->tablets;
    }

    public function addTablet(Tablet $tablet): self
    {
        if (!$this->tablets->contains($tablet)) {
            $this->tablets[] = $tablet;
            $tablet->setIdCategory($this);
        }

        return $this;
    }

    public function removeTablet(Tablet $tablet): self
    {
        if ($this->tablets->removeElement($tablet)) {
            // set the owning side to null (unless already changed)
            if ($tablet->getIdCategory() === $this) {
                $tablet->setIdCategory(null);
            }
        }

        return $this;
    }
}
