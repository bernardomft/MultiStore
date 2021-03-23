<?php

namespace App\Entity;

use App\Repository\LaptopRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=LaptopRepository::class)
 */
class Laptop
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
    private $ramTechology;

    /**
     * @ORM\Column(type="string", length=20, nullable=true)
     */
    private $ramFrequency;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $hardDisk;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $hardDiskTechnology;

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
     * @ORM\Column(type="integer", nullable=true)
     */
    private $usb3_0;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $hdmi;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $dvi;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $bluetooht;

    /**
     * @ORM\Column(type="string", length=5, nullable=true)
     */
    private $bluetooht_version;

    /**
     * @ORM\Column(type="string", length=30, nullable=true)
     */
    private $screenSize;

    /**
     * @ORM\Column(type="string", length=30)
     */
    private $screenResolution;

    /**
     * @ORM\Column(type="string", length=30, nullable=true)
     */
    private $screenFrequency;

    /**
     * @ORM\Column(type="string", length=30, nullable=true)
     */
    private $batteryCapacity;

    /**
     * @ORM\Column(type="string", length=30, nullable=true)
     */
    private $batteryChargeTime;

    /**
     * @ORM\ManyToOne(targetEntity=SubCategory::class, inversedBy="laptops")
     * @ORM\JoinColumn(nullable=false)
     */
    private $idSubcategory;

    /**
     * @ORM\ManyToOne(targetEntity=Product::class, inversedBy="laptops")
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

    public function getRamTechology(): ?string
    {
        return $this->ramTechology;
    }

    public function setRamTechology(string $ramTechology): self
    {
        $this->ramTechology = $ramTechology;

        return $this;
    }

    public function getRamFrequency(): ?string
    {
        return $this->ramFrequency;
    }

    public function setRamFrequency(?string $ramFrequency): self
    {
        $this->ramFrequency = $ramFrequency;

        return $this;
    }

    public function getHardDisk(): ?string
    {
        return $this->hardDisk;
    }

    public function setHardDisk(string $hardDisk): self
    {
        $this->hardDisk = $hardDisk;

        return $this;
    }

    public function getHardDiskTechnology(): ?string
    {
        return $this->hardDiskTechnology;
    }

    public function setHardDiskTechnology(string $hardDiskTechnology): self
    {
        $this->hardDiskTechnology = $hardDiskTechnology;

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

    public function setUsb30(?int $usb3_0): self
    {
        $this->usb3_0 = $usb3_0;

        return $this;
    }

    public function getHdmi(): ?int
    {
        return $this->hdmi;
    }

    public function setHdmi(?int $hdmi): self
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

    public function getBluetooht(): ?int
    {
        return $this->bluetooht;
    }

    public function setBluetooht(?int $bluetooht): self
    {
        $this->bluetooht = $bluetooht;

        return $this;
    }

    public function getBluetoohtVersion(): ?string
    {
        return $this->bluetooht_version;
    }

    public function setBluetoohtVersion(?string $bluetooht_version): self
    {
        $this->bluetooht_version = $bluetooht_version;

        return $this;
    }

    public function getScreenSize(): ?string
    {
        return $this->screenSize;
    }

    public function setScreenSize(?string $screenSize): self
    {
        $this->screenSize = $screenSize;

        return $this;
    }

    public function getScreenResolution(): ?string
    {
        return $this->screenResolution;
    }

    public function setScreenResolution(string $screenResolution): self
    {
        $this->screenResolution = $screenResolution;

        return $this;
    }

    public function getScreenFrequency(): ?string
    {
        return $this->screenFrequency;
    }

    public function setScreenFrequency(?string $screenFrequency): self
    {
        $this->screenFrequency = $screenFrequency;

        return $this;
    }

    public function getBatteryCapacity(): ?string
    {
        return $this->batteryCapacity;
    }

    public function setBatteryCapacity(?string $batteryCapacity): self
    {
        $this->batteryCapacity = $batteryCapacity;

        return $this;
    }

    public function getBatteryChargeTime(): ?string
    {
        return $this->batteryChargeTime;
    }

    public function setBatteryChargeTime(?string $batteryChargeTime): self
    {
        $this->batteryChargeTime = $batteryChargeTime;

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
