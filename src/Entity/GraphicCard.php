<?php

namespace App\Entity;

use App\Repository\GraphicCardRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=GraphicCardRepository::class)
 */
class GraphicCard
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
    private $size;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $resolution_max;

    /**
     * @ORM\Column(type="string", length=10)
     */
    private $clock_frequency;

    /**
     * @ORM\Column(type="string", length=10)
     */
    private $type_memory;

    /**
     * @ORM\Column(type="string", length=10)
     */
    private $speed_memory;

    /**
     * @ORM\Column(type="string", length=10)
     */
    private $interface;

    /**
     * @ORM\ManyToOne(targetEntity=SubCategory::class, inversedBy="graphicCards")
     */
    private $idSubcategory;

    /**
     * @ORM\ManyToOne(targetEntity=Product::class, inversedBy="graphicCards")
     * @ORM\JoinColumn(nullable=false)
     */
    private $idProduct;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSize(): ?string
    {
        return $this->size;
    }

    public function setSize(string $size): self
    {
        $this->size = $size;

        return $this;
    }

    public function getResolutionMax(): ?string
    {
        return $this->resolution_max;
    }

    public function setResolutionMax(string $resolution_max): self
    {
        $this->resolution_max = $resolution_max;

        return $this;
    }

    public function getClockFrequency(): ?string
    {
        return $this->clock_frequency;
    }

    public function setClockFrequency(string $clock_frequency): self
    {
        $this->clock_frequency = $clock_frequency;

        return $this;
    }

    public function getTypeMemory(): ?string
    {
        return $this->type_memory;
    }

    public function setTypeMemory(string $type_memory): self
    {
        $this->type_memory = $type_memory;

        return $this;
    }

    public function getSpeedMemory(): ?string
    {
        return $this->speed_memory;
    }

    public function setSpeedMemory(string $speed_memory): self
    {
        $this->speed_memory = $speed_memory;

        return $this;
    }

    public function getInterface(): ?string
    {
        return $this->interface;
    }

    public function setInterface(string $interface): self
    {
        $this->interface = $interface;

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
