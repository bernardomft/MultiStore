<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Store
 *
 * @ORM\Table(name="store")
 * @ORM\Entity
 */
class Store
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
     * @ORM\Column(name="username", type="string", length=15, nullable=false)
     */
    private $username;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=60, nullable=false)
     */
    private $password;

    /**
     * @var string
     *
     * @ORM\Column(name="nif", type="string", length=9, nullable=false)
     */
    private $nif;

    /**
     * @var string
     *
     * @ORM\Column(name="address", type="string", length=80, nullable=false)
     */
    private $address;

    /**
     * @var float
     *
     * @ORM\Column(name="balance", type="float", precision=10, scale=0, nullable=false)
     */
    private $balance;

    /**
     * @var string
     *
     * @ORM\Column(name="descripcion", type="string", length=300, nullable=false)
     */
    private $descripcion;

    /**
     * @var string
     *
     * @ORM\Column(name="web_page", type="string", length=50, nullable=false)
     */
    private $webPage;

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

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getNif(): ?string
    {
        return $this->nif;
    }

    public function setNif(string $nif): self
    {
        $this->nif = $nif;

        return $this;
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

    public function getBalance(): ?float
    {
        return $this->balance;
    }

    public function setBalance(float $balance): self
    {
        $this->balance = $balance;

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

    public function getWebPage(): ?string
    {
        return $this->webPage;
    }

    public function setWebPage(string $webPage): self
    {
        $this->webPage = $webPage;

        return $this;
    }


}
