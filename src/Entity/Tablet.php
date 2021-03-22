<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tablet
 *
 * @ORM\Table(name="tablet", indexes={@ORM\Index(name="id_cat_tablet_fk", columns={"id_category"}), @ORM\Index(name="id_product_tablet_fk", columns={"id_porduct"})})
 * @ORM\Entity
 */
class Tablet
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
     * @var \Category
     *
     * @ORM\ManyToOne(targetEntity="Category")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_category", referencedColumnName="id")
     * })
     */
    private $idCategory;

    /**
     * @var \Product
     *
     * @ORM\ManyToOne(targetEntity="Product")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_porduct", referencedColumnName="id")
     * })
     */
    private $idPorduct;

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

    public function getIdCategory(): ?Category
    {
        return $this->idCategory;
    }

    public function setIdCategory(?Category $idCategory): self
    {
        $this->idCategory = $idCategory;

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


}
