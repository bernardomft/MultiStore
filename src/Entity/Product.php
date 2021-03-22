<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Product
 *
 * @ORM\Table(name="product", indexes={@ORM\Index(name="id_category_fk", columns={"id_category"}), @ORM\Index(name="id_store_fk", columns={"id_store"})})
 * @ORM\Entity
 */
class Product
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
     * @var string
     *
     * @ORM\Column(name="model", type="string", length=20, nullable=false)
     */
    private $model;

    /**
     * @var string
     *
     * @ORM\Column(name="mark", type="string", length=20, nullable=false)
     */
    private $mark;

    /**
     * @var string
     *
     * @ORM\Column(name="maker", type="string", length=20, nullable=false)
     */
    private $maker;

    /**
     * @var string
     *
     * @ORM\Column(name="store", type="string", length=20, nullable=false)
     */
    private $store;

    /**
     * @var int
     *
     * @ORM\Column(name="stock", type="integer", nullable=false)
     */
    private $stock;

    /**
     * @var string
     *
     * @ORM\Column(name="descripcion", type="string", length=300, nullable=false)
     */
    private $descripcion;

    /**
     * @var string
     *
     * @ORM\Column(name="picture", type="string", length=200, nullable=false)
     */
    private $picture;

    /**
     * @var float
     *
     * @ORM\Column(name="price", type="float", precision=10, scale=0, nullable=false)
     */
    private $price;

    /**
     * @var float
     *
     * @ORM\Column(name="discount", type="float", precision=10, scale=0, nullable=false)
     */
    private $discount;

    /**
     * @var bool
     *
     * @ORM\Column(name="second_hand", type="boolean", nullable=false)
     */
    private $secondHand;

    /**
     * @var string|null
     *
     * @ORM\Column(name="dimmensions", type="string", length=30, nullable=true)
     */
    private $dimmensions;

    /**
     * @var string|null
     *
     * @ORM\Column(name="weight", type="string", length=30, nullable=true)
     */
    private $weight;

    /**
     * @var int|null
     *
     * @ORM\Column(name="year", type="integer", nullable=true)
     */
    private $year;

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
     * @var \Store
     *
     * @ORM\ManyToOne(targetEntity="Store")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_store", referencedColumnName="id")
     * })
     */
    private $idStore;

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

    public function getModel(): ?string
    {
        return $this->model;
    }

    public function setModel(string $model): self
    {
        $this->model = $model;

        return $this;
    }

    public function getMark(): ?string
    {
        return $this->mark;
    }

    public function setMark(string $mark): self
    {
        $this->mark = $mark;

        return $this;
    }

    public function getMaker(): ?string
    {
        return $this->maker;
    }

    public function setMaker(string $maker): self
    {
        $this->maker = $maker;

        return $this;
    }

    public function getStore(): ?string
    {
        return $this->store;
    }

    public function setStore(string $store): self
    {
        $this->store = $store;

        return $this;
    }

    public function getStock(): ?int
    {
        return $this->stock;
    }

    public function setStock(int $stock): self
    {
        $this->stock = $stock;

        return $this;
    }

    public function getDescripcion(): ?string
    {
        return $this->descripcion;
    }

    public function setDescripcion(string $descripcion): self
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    public function getPicture(): ?string
    {
        return $this->picture;
    }

    public function setPicture(string $picture): self
    {
        $this->picture = $picture;

        return $this;
    }

    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function setPrice(float $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getDiscount(): ?float
    {
        return $this->discount;
    }

    public function setDiscount(float $discount): self
    {
        $this->discount = $discount;

        return $this;
    }

    public function getSecondHand(): ?bool
    {
        return $this->secondHand;
    }

    public function setSecondHand(bool $secondHand): self
    {
        $this->secondHand = $secondHand;

        return $this;
    }

    public function getDimmensions(): ?string
    {
        return $this->dimmensions;
    }

    public function setDimmensions(?string $dimmensions): self
    {
        $this->dimmensions = $dimmensions;

        return $this;
    }

    public function getWeight(): ?string
    {
        return $this->weight;
    }

    public function setWeight(?string $weight): self
    {
        $this->weight = $weight;

        return $this;
    }

    public function getYear(): ?int
    {
        return $this->year;
    }

    public function setYear(?int $year): self
    {
        $this->year = $year;

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

    public function getIdStore(): ?Store
    {
        return $this->idStore;
    }

    public function setIdStore(?Store $idStore): self
    {
        $this->idStore = $idStore;

        return $this;
    }


}
