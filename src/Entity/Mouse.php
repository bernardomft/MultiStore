<?php

namespace App\Entity;

use App\Repository\MouseRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=MouseRepository::class)
 */
class Mouse
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
    private $dpi;

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
     * @ORM\Column(type="string", length=20)
     */
    private $frequency;

    /**
     * @ORM\ManyToOne(targetEntity=Subcategory::class, inversedBy="Mouse")
     * @ORM\JoinColumn(nullable=false)
     */
    private $idSubcategory;

    /**
     * @ORM\ManyToOne(targetEntity=Product::class, inversedBy="Mouse")
     * @ORM\JoinColumn(nullable=false)
     */
    private $idProduct;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDpi(): ?string
    {
        return $this->dpi;
    }

    public function setDpi(string $dpi): self
    {
        $this->dpi = $dpi;

        return $this;
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

    public function getFrequency(): ?string
    {
        return $this->frequency;
    }

    public function setFrequency(string $frequency): self
    {
        $this->frequency = $frequency;

        return $this;
    }

    public function getIdSubcategory(): ?Subcategory
    {
        return $this->idSubcategory;
    }

    public function setIdSubcategory(?Subcategory $idSubcategory): self
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
