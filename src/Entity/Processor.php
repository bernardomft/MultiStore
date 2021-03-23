<?php

namespace App\Entity;

use App\Repository\ProcessorRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ProcessorRepository::class)
 */
class Processor
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
    private $speed;

    /**
     * @ORM\Column(type="string", length=10)
     */
    private $type;

    /**
     * @ORM\Column(type="string", length=10)
     */
    private $core_number;

    /**
     * @ORM\Column(type="string", length=10)
     */
    private $socket;

    /**
     * @ORM\ManyToOne(targetEntity=SubCategory::class, inversedBy="processors")
     * @ORM\JoinColumn(nullable=false)
     */
    private $idsubcategory;

    /**
     * @ORM\ManyToOne(targetEntity=Product::class, inversedBy="processors")
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

    public function getSpeed(): ?string
    {
        return $this->speed;
    }

    public function setSpeed(string $speed): self
    {
        $this->speed = $speed;

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

    public function getCoreNumber(): ?string
    {
        return $this->core_number;
    }

    public function setCoreNumber(string $core_number): self
    {
        $this->core_number = $core_number;

        return $this;
    }

    public function getSocket(): ?string
    {
        return $this->socket;
    }

    public function setSocket(string $socket): self
    {
        $this->socket = $socket;

        return $this;
    }

    public function getIdsubcategory(): ?SubCategory
    {
        return $this->idsubcategory;
    }

    public function setIdsubcategory(?SubCategory $idsubcategory): self
    {
        $this->idsubcategory = $idsubcategory;

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
