<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Screen
 *
 * @ORM\Table(name="screen", indexes={@ORM\Index(name="id_sub_cat_screen_fk", columns={"id_subcategory"}), @ORM\Index(name="id_product_screen_fk", columns={"id_porduct"})})
 * @ORM\Entity
 */
class Screen
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="size", type="string", length=4, nullable=false)
     */
    private $size;

    /**
     * @var string
     *
     * @ORM\Column(name="resolution", type="string", length=10, nullable=false)
     */
    private $resolution;

    /**
     * @var string
     *
     * @ORM\Column(name="resolution_px", type="string", length=10, nullable=false)
     */
    private $resolutionPx;

    /**
     * @var string
     *
     * @ORM\Column(name="frequency", type="string", length=10, nullable=false)
     */
    private $frequency;

    /**
     * @var string|null
     *
     * @ORM\Column(name="response_time", type="string", length=5, nullable=true)
     */
    private $responseTime;

    /**
     * @var string|null
     *
     * @ORM\Column(name="shine", type="string", length=8, nullable=true)
     */
    private $shine;

    /**
     * @var string|null
     *
     * @ORM\Column(name="view", type="string", length=8, nullable=true)
     */
    private $view;

    /**
     * @var string|null
     *
     * @ORM\Column(name="connectors", type="string", length=8, nullable=true)
     */
    private $connectors;

    /**
     * @var \Product
     *
     * @ORM\ManyToOne(targetEntity="Product")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_porduct", referencedColumnName="id")
     * })
     */
    private $idPorduct;

    /**
     * @var \Subcategory
     *
     * @ORM\ManyToOne(targetEntity="Subcategory")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_subcategory", referencedColumnName="id")
     * })
     */
    private $idSubcategory;

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
        return $this->resolutionPx;
    }

    public function setResolutionPx(string $resolutionPx): self
    {
        $this->resolutionPx = $resolutionPx;

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
        return $this->responseTime;
    }

    public function setResponseTime(?string $responseTime): self
    {
        $this->responseTime = $responseTime;

        return $this;
    }

    public function getShine(): ?string
    {
        return $this->shine;
    }

    public function setShine(?string $shine): self
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

    public function setConnectors(?string $connectors): self
    {
        $this->connectors = $connectors;

        return $this;
    }

    public function getIdPorduct(): ?Product
    {
        return $this->idPorduct;
    }

    public function setIdPorduct(?Product $idPorduct): self
    {
        $this->idPorduct = $idPorduct;

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


}
