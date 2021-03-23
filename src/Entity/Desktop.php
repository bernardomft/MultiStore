<?php

namespace App\Entity;

use App\Repository\DesktopRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=DesktopRepository::class)
 */
class Desktop
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
    private $ramMemory;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $ramTechnology;

    /**
     * @ORM\Column(type="string", length=20, nullable=true)
     */
    private $RamFrequency;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $HardDisk;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $processorMaker;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $processorModel;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $processorVelocity;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $processorCore;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $processorCache;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $graphicMaker;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $graphicModel;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $graphicTechnology;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $graphicCapacity;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $graphicInterface;

    /**
     * @ORM\Column(type="integer")
     */
    private $usb2_0;

    /**
     * @ORM\Column(type="integer")
     */
    private $usb3_0;

    /**
     * @ORM\Column(type="integer")
     */
    private $hdmi;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $dvi;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $bluetooth;

    /**
     * @ORM\ManyToOne(targetEntity=Subcategory::class, inversedBy="desktops")
     * @ORM\JoinColumn(nullable=false)
     */
    private $idSubcategory;

    /**
     * @ORM\ManyToOne(targetEntity=Product::class, inversedBy="desktops")
     * @ORM\JoinColumn(nullable=false)
     */
    private $idProduct;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRamMemory(): ?string
    {
        return $this->ramMemory;
    }

    public function setRamMemory(string $ramMemory): self
    {
        $this->ramMemory = $ramMemory;

        return $this;
    }

    public function getRamTechnology(): ?string
    {
        return $this->ramTechnology;
    }

    public function setRamTechnology(string $ramTechnology): self
    {
        $this->ramTechnology = $ramTechnology;

        return $this;
    }

    public function getRamFrequency(): ?string
    {
        return $this->RamFrequency;
    }

    public function setRamFrequency(?string $RamFrequency): self
    {
        $this->RamFrequency = $RamFrequency;

        return $this;
    }

    public function getHardDisk(): ?string
    {
        return $this->HardDisk;
    }

    public function setHardDisk(string $HardDisk): self
    {
        $this->HardDisk = $HardDisk;

        return $this;
    }

    public function getProcessorMaker(): ?string
    {
        return $this->processorMaker;
    }

    public function setProcessorMaker(string $processorMaker): self
    {
        $this->processorMaker = $processorMaker;

        return $this;
    }

    public function getProcessorModel(): ?string
    {
        return $this->processorModel;
    }

    public function setProcessorModel(string $processorModel): self
    {
        $this->processorModel = $processorModel;

        return $this;
    }

    public function getProcessorVelocity(): ?string
    {
        return $this->processorVelocity;
    }

    public function setProcessorVelocity(string $processorVelocity): self
    {
        $this->processorVelocity = $processorVelocity;

        return $this;
    }

    public function getProcessorCore(): ?string
    {
        return $this->processorCore;
    }

    public function setProcessorCore(string $processorCore): self
    {
        $this->processorCore = $processorCore;

        return $this;
    }

    public function getProcessorCache(): ?string
    {
        return $this->processorCache;
    }

    public function setProcessorCache(string $processorCache): self
    {
        $this->processorCache = $processorCache;

        return $this;
    }

    public function getGraphicMaker(): ?string
    {
        return $this->graphicMaker;
    }

    public function setGraphicMaker(string $graphicMaker): self
    {
        $this->graphicMaker = $graphicMaker;

        return $this;
    }

    public function getGraphicModel(): ?string
    {
        return $this->graphicModel;
    }

    public function setGraphicModel(string $graphicModel): self
    {
        $this->graphicModel = $graphicModel;

        return $this;
    }

    public function getGraphicTechnology(): ?string
    {
        return $this->graphicTechnology;
    }

    public function setGraphicTechnology(string $graphicTechnology): self
    {
        $this->graphicTechnology = $graphicTechnology;

        return $this;
    }

    public function getGraphicCapacity(): ?string
    {
        return $this->graphicCapacity;
    }

    public function setGraphicCapacity(string $graphicCapacity): self
    {
        $this->graphicCapacity = $graphicCapacity;

        return $this;
    }

    public function getGraphicInterface(): ?string
    {
        return $this->graphicInterface;
    }

    public function setGraphicInterface(string $graphicInterface): self
    {
        $this->graphicInterface = $graphicInterface;

        return $this;
    }

    public function getUsb20(): ?int
    {
        return $this->usb2_0;
    }

    public function setUsb20(int $usb2_0): self
    {
        $this->usb2_0 = $usb2_0;

        return $this;
    }

    public function getUsb30(): ?int
    {
        return $this->usb3_0;
    }

    public function setUsb30(int $usb3_0): self
    {
        $this->usb3_0 = $usb3_0;

        return $this;
    }

    public function getHdmi(): ?int
    {
        return $this->hdmi;
    }

    public function setHdmi(int $hdmi): self
    {
        $this->hdmi = $hdmi;

        return $this;
    }

    public function getDvi(): ?int
    {
        return $this->dvi;
    }

    public function setDvi(?int $dvi): self
    {
        $this->dvi = $dvi;

        return $this;
    }

    public function getBluetooth(): ?int
    {
        return $this->bluetooth;
    }

    public function setBluetooth(?int $bluetooth): self
    {
        $this->bluetooth = $bluetooth;

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
