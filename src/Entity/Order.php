<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Order
 *
 * @ORM\Table(name="order", indexes={@ORM\Index(name="id_order_fk", columns={"id_user"}), @ORM\Index(name="id_order_store_fk", columns={"id_store"})})
 * @ORM\Entity
 */
class Order
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
     * @ORM\Column(name="address", type="string", length=80, nullable=false)
     */
    private $address;

    /**
     * @var float
     *
     * @ORM\Column(name="amount", type="float", precision=10, scale=0, nullable=false)
     */
    private $amount;

    /**
     * @var float
     *
     * @ORM\Column(name="shipping_costs", type="float", precision=10, scale=0, nullable=false)
     */
    private $shippingCosts;

    /**
     * @var string
     *
     * @ORM\Column(name="state", type="string", length=10, nullable=false)
     */
    private $state;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime", nullable=false)
     */
    private $date;

    /**
     * @var int
     *
     * @ORM\Column(name="id_order_product", type="integer", nullable=false)
     */
    private $idOrderProduct;

    /**
     * @var \User
     *
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_user", referencedColumnName="id")
     * })
     */
    private $idUser;

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

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(string $address): self
    {
        $this->address = $address;

        return $this;
    }

    public function getAmount(): ?float
    {
        return $this->amount;
    }

    public function setAmount(float $amount): self
    {
        $this->amount = $amount;

        return $this;
    }

    public function getShippingCosts(): ?float
    {
        return $this->shippingCosts;
    }

    public function setShippingCosts(float $shippingCosts): self
    {
        $this->shippingCosts = $shippingCosts;

        return $this;
    }

    public function getState(): ?string
    {
        return $this->state;
    }

    public function setState(string $state): self
    {
        $this->state = $state;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getIdOrderProduct(): ?int
    {
        return $this->idOrderProduct;
    }

    public function setIdOrderProduct(int $idOrderProduct): self
    {
        $this->idOrderProduct = $idOrderProduct;

        return $this;
    }

    public function getIdUser(): ?User
    {
        return $this->idUser;
    }

    public function setIdUser(?User $idUser): self
    {
        $this->idUser = $idUser;

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
