<?php

namespace App\Entity;

use App\Repository\ScreenRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ScreenRepository::class)
 */
class Screen
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
    private $size;

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
    private $frequency;

    /**
     * @ORM\Column(type="string", length=5)
     */
    private $response_time;

    /**
     * @ORM\Column(type="string", length=8)
     */
    private $shine;

    /**
     * @ORM\Column(type="string", length=8, nullable=true)
     */
    private $view;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $connectors;

    /**
     * @ORM\ManyToOne(targetEntity=SubCategory::class, inversedBy="screens")
     * @ORM\JoinColumn(nullable=false)
     */
    private $idSubcategory;

    /**
     * @ORM\ManyToOne(targetEntity=Product::class, inversedBy="screens")
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

    public function getFrequency(): ?string
    {
        return $this->frequency;
    }

    public function setFrequency(string $frequency): self
    {
        $this->frequency = $frequency;

        return $this;
    }

    public function getResponseTime(): ?string
    {
        return $this->response_time;
    }

    public function setResponseTime(string $response_time): self
    {
        $this->response_time = $response_time;

        return $this;
    }

    public function getShine(): ?string
    {
        return $this->shine;
    }

    public function setShine(string $shine): self
    {
        $this->shine = $shine;

        return $this;
    }

    public function getView(): ?string
    {
        return $this->view;
    }

    public function setView(?string $view): self
    {
        $this->view = $view;

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
