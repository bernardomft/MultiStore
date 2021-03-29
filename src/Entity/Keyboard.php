<?php

namespace App\Entity;

use App\Repository\KeyboardRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=KeyboardRepository::class)
 */
class Keyboard
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
    private $type;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $type_2;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $connector;

    /**
     * @ORM\ManyToOne(targetEntity=SubCategory::class, inversedBy="keyboards")
     * @ORM\JoinColumn(nullable=false)
     */
    private $idSubcategory;

    /**
     * @ORM\ManyToOne(targetEntity=Product::class, inversedBy="keyboards")
     * @ORM\JoinColumn(nullable=false)
     */
    private $idProduct;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getType2(): ?string
    {
        return $this->type_2;
    }

    public function setType2(string $type_2): self
    {
        $this->type_2 = $type_2;

        return $this;
    }

    public function getConnector(): ?string
    {
        return $this->connector;
    }

    public function setConnector(string $connector): self
    {
        $this->connector = $connector;

        return $this;
    }

    public function getIdSubcategory(): ?SubCategory
    {
        return $this->idSubcategory;
    }

    public function setIdSubcategory(?SubCategory $idSubcategory): self
    {
        $this->idSubcategory = $idSubcategory;

        return $this;
    }

    public function getIdProduct(): ?Product
    {
        return $this->idProduct;
    }

    public function setIdProduct(?Product $idProduct): self
    {
        $this->idProduct = $idProduct;

        return $this;
    }
}
