<?php

namespace App\Entity;

use App\Repository\SmartWatchRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SmartWatchRepository::class)
 */
class SmartWatch
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
    private $so;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $resolution;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $resolution_px;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $technology;

    /**
     * @ORM\ManyToOne(targetEntity=SubCategory::class, inversedBy="smartWatches")
     * @ORM\JoinColumn(nullable=false)
     */
    private $idSubcategory;

    /**
     * @ORM\ManyToOne(targetEntity=Product::class, inversedBy="smartWatches")
     * @ORM\JoinColumn(nullable=false)
     */
    private $idProduct;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSo(): ?string
    {
        return $this->so;
    }

    public function setSo(string $so): self
    {
        $this->so = $so;

        return $this;
    }

    public function getResolution(): ?string
    {
        return $this->resolution;
    }

    public function setResolution(string $resolution): self
    {
        $this->resolution = $resolution;

        return $this;
    }

    public function getResolutionPx(): ?string
    {
        return $this->resolution_px;
    }

    public function setResolutionPx(string $resolution_px): self
    {
        $this->resolution_px = $resolution_px;

        return $this;
    }

    public function getTechnology(): ?string
    {
        return $this->technology;
    }

    public function setTechnology(string $technology): self
    {
        $this->technology = $technology;

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
