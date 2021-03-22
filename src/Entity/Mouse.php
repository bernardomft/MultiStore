<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Mouse
 *
 * @ORM\Table(name="mouse", indexes={@ORM\Index(name="id_sub_cat_mouse_fk", columns={"id_subcategory"}), @ORM\Index(name="id_product_mouse_fk", columns={"id_porduct"})})
 * @ORM\Entity
 */
class Mouse
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
     * @ORM\Column(name="dpi", type="string", length=20, nullable=false)
     */
    private $dpi;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=20, nullable=false)
     */
    private $type;

    /**
     * @var bool
     *
     * @ORM\Column(name="type_2", type="boolean", nullable=false)
     */
    private $type2;

    /**
     * @var string
     *
     * @ORM\Column(name="connector", type="string", length=20, nullable=false)
     */
    private $connector;

    /**
     * @var string|null
     *
     * @ORM\Column(name="frequency", type="string", length=20, nullable=true)
     */
    private $frequency;

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

    public function getType2(): ?bool
    {
        return $this->type2;
    }

    public function setType2(bool $type2): self
    {
        $this->type2 = $type2;

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

    public function setFrequency(?string $frequency): self
    {
        $this->frequency = $frequency;

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
