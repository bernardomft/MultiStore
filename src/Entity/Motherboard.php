<?php

namespace App\Entity;

use App\Repository\MotherboardRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=MotherboardRepository::class)
 */
class Motherboard
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
     * @ORM\Column(type="string", length=10)
     */
    private $color;

    /**
     * @ORM\Column(type="string", length=10)
     */
    private $process_socket;

    /**
     * @ORM\Column(type="string", length=10)
     */
    private $memory_ram_type;

    /**
     * @ORM\Column(type="string", length=10)
     */
    private $memory_ram_slots;

    /**
     * @ORM\Column(type="string", length=10)
     */
    private $graphic_interface;

    /**
     * @ORM\Column(type="string", length=10)
     */
    private $internal_clock;

    /**
     * @ORM\Column(type="string", length=10)
     */
    private $connections;

    /**
     * @ORM\ManyToOne(targetEntity=SubCategory::class, inversedBy="motherboards")
     * @ORM\JoinColumn(nullable=false)
     */
    private $idSubcategory;

    /**
     * @ORM\ManyToOne(targetEntity=Product::class, inversedBy="motherboards")
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

    public function getColor(): ?string
    {
        return $this->color;
    }

    public function setColor(string $color): self
    {
        $this->color = $color;

        return $this;
    }

    public function getProcessSocket(): ?string
    {
        return $this->process_socket;
    }

    public function setProcessSocket(string $process_socket): self
    {
        $this->process_socket = $process_socket;

        return $this;
    }

    public function getMemoryRamType(): ?string
    {
        return $this->memory_ram_type;
    }

    public function setMemoryRamType(string $memory_ram_type): self
    {
        $this->memory_ram_type = $memory_ram_type;

        return $this;
    }

    public function getMemoryRamSlots(): ?string
    {
        return $this->memory_ram_slots;
    }

    public function setMemoryRamSlots(string $memory_ram_slots): self
    {
        $this->memory_ram_slots = $memory_ram_slots;

        return $this;
    }

    public function getGraphicInterface(): ?string
    {
        return $this->graphic_interface;
    }

    public function setGraphicInterface(string $graphic_interface): self
    {
        $this->graphic_interface = $graphic_interface;

        return $this;
    }

    public function getInternalClock(): ?string
    {
        return $this->internal_clock;
    }

    public function setInternalClock(string $internal_clock): self
    {
        $this->internal_clock = $internal_clock;

        return $this;
    }

    public function getConnections(): ?string
    {
        return $this->connections;
    }

    public function setConnections(string $connections): self
    {
        $this->connections = $connections;

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
