<?php

namespace App\Entity;

use App\Repository\WebcamRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=WebcamRepository::class)
 */
class Webcam
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
    private $resolution_px;

    /**
     * @ORM\Column(type="string", length=10)
     */
    private $sound;

    /**
     * @ORM\Column(type="string", length=10)
     */
    private $connection;

    /**
     * @ORM\ManyToOne(targetEntity=SubCategory::class, inversedBy="webcams")
     */
    private $idSubcategory;

    /**
     * @ORM\ManyToOne(targetEntity=Product::class, inversedBy="webcams")
     * @ORM\JoinColumn(nullable=false)
     */
    private $idProduct;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getSound(): ?string
    {
        return $this->sound;
    }

    public function setSound(string $sound): self
    {
        $this->sound = $sound;

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
