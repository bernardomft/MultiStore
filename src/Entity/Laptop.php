<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Laptop
 *
 * @ORM\Table(name="laptop", indexes={@ORM\Index(name="id_sub_cat_laptop_fk", columns={"id_subcategory"}), @ORM\Index(name="id_product_laptop_fk", columns={"id_porduct"})})
 * @ORM\Entity
 */
class Laptop
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
     * @ORM\Column(name="ram_memory", type="string", length=20, nullable=false)
     */
    private $ramMemory;

    /**
     * @var string
     *
     * @ORM\Column(name="ram_technology", type="string", length=20, nullable=false)
     */
    private $ramTechnology;

    /**
     * @var string
     *
     * @ORM\Column(name="ram_frequency", type="string", length=20, nullable=false)
     */
    private $ramFrequency;

    /**
     * @var string
     *
     * @ORM\Column(name="hard_disk", type="string", length=20, nullable=false)
     */
    private $hardDisk;

    /**
     * @var string
     *
     * @ORM\Column(name="hard_disk_technology", type="string", length=20, nullable=false)
     */
    private $hardDiskTechnology;

    /**
     * @var string
     *
     * @ORM\Column(name="processor_maker", type="string", length=20, nullable=false)
     */
    private $processorMaker;

    /**
     * @var string
     *
     * @ORM\Column(name="processor_model", type="string", length=20, nullable=false)
     */
    private $processorModel;

    /**
     * @var string
     *
     * @ORM\Column(name="processor_velocity", type="string", length=20, nullable=false)
     */
    private $processorVelocity;

    /**
     * @var string
     *
     * @ORM\Column(name="processor_core", type="string", length=20, nullable=false)
     */
    private $processorCore;

    /**
     * @var string
     *
     * @ORM\Column(name="processor_cache", type="string", length=20, nullable=false)
     */
    private $processorCache;

    /**
     * @var string
     *
     * @ORM\Column(name="graphic_maker", type="string", length=20, nullable=false)
     */
    private $graphicMaker;

    /**
     * @var string
     *
     * @ORM\Column(name="graphic_model", type="string", length=20, nullable=false)
     */
    private $graphicModel;

    /**
     * @var string
     *
     * @ORM\Column(name="graphic_technology", type="string", length=20, nullable=false)
     */
    private $graphicTechnology;

    /**
     * @var string
     *
     * @ORM\Column(name="graphic_capacity", type="string", length=20, nullable=false)
     */
    private $graphicCapacity;

    /**
     * @var string
     *
     * @ORM\Column(name="graphic_interface", type="string", length=20, nullable=false)
     */
    private $graphicInterface;

    /**
     * @var int|null
     *
     * @ORM\Column(name="usb_2_0", type="integer", nullable=true)
     */
    private $usb20;

    /**
     * @var int|null
     *
     * @ORM\Column(name="usb_3_0", type="integer", nullable=true)
     */
    private $usb30;

    /**
     * @var int|null
     *
     * @ORM\Column(name="hdmi", type="integer", nullable=true)
     */
    private $hdmi;

    /**
     * @var int|null
     *
     * @ORM\Column(name="dvi", type="integer", nullable=true)
     */
    private $dvi;

    /**
     * @var int|null
     *
     * @ORM\Column(name="bluetooht", type="integer", nullable=true)
     */
    private $bluetooht;

    /**
     * @var string|null
     *
     * @ORM\Column(name="bluetooht_version", type="string", length=5, nullable=true)
     */
    private $bluetoohtVersion;

    /**
     * @var string|null
     *
     * @ORM\Column(name="screen_resolution", type="string", length=30, nullable=true)
     */
    private $screenResolution;

    /**
     * @var string|null
     *
     * @ORM\Column(name="screen_size", type="string", length=30, nullable=true)
     */
    private $screenSize;

    /**
     * @var string|null
     *
     * @ORM\Column(name="screen_frequency", type="string", length=30, nullable=true)
     */
    private $screenFrequency;

    /**
     * @var string|null
     *
     * @ORM\Column(name="baterry_capacity", type="string", length=30, nullable=true)
     */
    private $baterryCapacity;

    /**
     * @var string|null
     *
     * @ORM\Column(name="baterry_charge_time", type="string", length=30, nullable=true)
     */
    private $baterryChargeTime;

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
        return $this->ramFrequency;
    }

    public function setRamFrequency(string $ramFrequency): self
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
        return $this->usb20;
    }

    public function setUsb20(?int $usb20): self
    {
        $this->usb20 = $usb20;

        return $this;
    }

    public function getUsb30(): ?int
    {
        return $this->usb30;
    }

    public function setUsb30(?int $usb30): self
    {
        $this->usb30 = $usb30;

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
        return $this->bluetoohtVersion;
    }

    public function setBluetoohtVersion(?string $bluetoohtVersion): self
    {
        $this->bluetoohtVersion = $bluetoohtVersion;

        return $this;
    }

    public function getScreenResolution(): ?string
    {
        return $this->screenResolution;
    }

    public function setScreenResolution(?string $screenResolution): self
    {
        $this->screenResolution = $screenResolution;

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

    public function getScreenFrequency(): ?string
    {
        return $this->screenFrequency;
    }

    public function setScreenFrequency(?string $screenFrequency): self
    {
        $this->screenFrequency = $screenFrequency;

        return $this;
    }

    public function getBaterryCapacity(): ?string
    {
        return $this->baterryCapacity;
    }

    public function setBaterryCapacity(?string $baterryCapacity): self
    {
        $this->baterryCapacity = $baterryCapacity;

        return $this;
    }

    public function getBaterryChargeTime(): ?string
    {
        return $this->baterryChargeTime;
    }

    public function setBaterryChargeTime(?string $baterryChargeTime): self
    {
        $this->baterryChargeTime = $baterryChargeTime;

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
