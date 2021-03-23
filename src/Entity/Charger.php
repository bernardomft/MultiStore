<?php

namespace App\Entity;

use App\Repository\ChargerRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ChargerRepository::class)
 */
class Charger
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
    private $voltage;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $amperage;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $connection;

    /**
     * @ORM\ManyToOne(targetEntity=SubCategory::class, inversedBy="chargers")
     * @ORM\JoinColumn(nullable=false)
     */
    private $idSubcategory;

    /**
     * @ORM\ManyToOne(targetEntity=Product::class, inversedBy="chargers")
     * @ORM\JoinColumn(nullable=false)
     */
    private $idProduct;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getVoltage(): ?string
    {
        return $this->voltage;
    }

    public function setVoltage(string $voltage): self
    {
        $this->voltage = $voltage;

        return $this;
    }

    public function getAmperage(): ?string
    {
        return $this->amperage;
    }

    public function setAmperage(string $amperage): self
    {
        $this->amperage = $amperage;

        return $this;
    }

    public function getConnection(): ?string
    {
        return $this->connection;
    }

    public function setConnection(string $connection): self
    {
        $this->connection = $connection;

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
