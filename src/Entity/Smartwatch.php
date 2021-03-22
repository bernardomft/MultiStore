<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Smartwatch
 *
 * @ORM\Table(name="smartwatch", indexes={@ORM\Index(name="id_sub_cat_smartwatch_fk", columns={"id_subcategory"}), @ORM\Index(name="id_product_smartwatch_fk", columns={"id_porduct"})})
 * @ORM\Entity
 */
class Smartwatch
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
     * @ORM\Column(name="name", type="string", length=20, nullable=false)
     */
    private $name;

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

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

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
