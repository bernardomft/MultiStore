<?php

namespace App\Entity;

use App\Repository\TabletRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TabletRepository::class)
 */
class Tablet
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=10)
     */
    private $resolution;

    /**
     * @ORM\Column(type="string", length=10)
     */
    private $resolution_px;

    /**
     * @ORM\Column(type="string", length=10)
     */
    private $battery;

    /**
     * @ORM\Column(type="string", length=10)
     */
    private $os;

    /**
     * @ORM\Column(type="string", length=10)
     */
    private $cammera;

    /**
     * @ORM\Column(type="string", length=10)
     */
    private $cammera_px;

    /**
     * @ORM\Column(type="string", length=10)
     */
    private $technology;

    /**
     * @ORM\Column(type="string", length=10)
     */
    private $memory;

    /**
     * @ORM\Column(type="string", length=10)
     */
    private $memory_ram;

    /**
     * @ORM\Column(type="string", length=10)
     */
    private $connectors;

    /**
     * @ORM\Column(type="string", length=10)
     */
    private $sim_type;

    /**
     * @ORM\Column(type="string", length=10)
     */
    private $sd_type;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $color;

    /**
     * @ORM\ManyToOne(targetEntity=Category::class, inversedBy="tablets")
     * @ORM\JoinColumn(nullable=false)
     */
    private $idCategory;

    /**
     * @ORM\ManyToOne(targetEntity=Product::class, inversedBy="tablets")
     * @ORM\JoinColumn(nullable=false)
     */
    private $idProduct;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getBattery(): ?string
    {
        return $this->battery;
    }

    public function setBattery(string $battery): self
    {
        $this->battery = $battery;

        return $this;
    }

    public function getOs(): ?string
    {
        return $this->os;
    }

    public function setOs(string $os): self
    {
        $this->os = $os;

        return $this;
    }

    public function getCammera(): ?string
    {
        return $this->cammera;
    }

    public function setCammera(string $cammera): self
    {
        $this->cammera = $cammera;

        return $this;
    }

    public function getCammeraPx(): ?string
    {
        return $this->cammera_px;
    }

    public function setCammeraPx(string $cammera_px): self
    {
        $this->cammera_px = $cammera_px;

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

    public function getMemory(): ?string
    {
        return $this->memory;
    }

    public function setMemory(string $memory): self
    {
        $this->memory = $memory;

        return $this;
    }

    public function getMemoryRam(): ?string
    {
        return $this->memory_ram;
    }

    public function setMemoryRam(string $memory_ram): self
    {
        $this->memory_ram = $memory_ram;

        return $this;
    }

    public function getConnectors(): ?string
    {
        return $this->connectors;
    }

    public function setConnectors(string $connectors): self
    {
        $this->connectors = $connectors;

        return $this;
    }

    public function getSimType(): ?string
    {
        return $this->sim_type;
    }

    public function setSimType(string $sim_type): self
    {
        $this->sim_type = $sim_type;

        return $this;
    }

    public function getSdType(): ?string
    {
        return $this->sd_type;
    }

    public function setSdType(string $sd_type): self
    {
        $this->sd_type = $sd_type;

        return $this;
    }

    public function getColor(): ?string
    {
        return $this->color;
    }

    public function setColor(string $color): self
    {
        $this->color = $color;

        return $this;
    }

    public function getIdCategory(): ?Category
    {
        return $this->idCategory;
    }

    public function setIdCategory(?Category $idCategory): self
    {
        $this->idCategory = $idCategory;

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
