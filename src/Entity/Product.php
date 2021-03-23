<?php

namespace App\Entity;

use App\Repository\ProductRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ProductRepository::class)
 */
class Product
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
    private $name;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $model;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $mark;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $maker;

    /**
     * @ORM\Column(type="integer")
     */
    private $stock;

    /**
     * @ORM\Column(type="string", length=300)
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=200)
     */
    private $picture;

    /**
     * @ORM\Column(type="float")
     */
    private $price;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $disscount;

    /**
     * @ORM\Column(type="boolean")
     */
    private $secondHand;

    /**
     * @ORM\Column(type="string", length=30, nullable=true)
     */
    private $dimensions;

    /**
     * @ORM\Column(type="string", length=30, nullable=true)
     */
    private $weight;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $year;

    /**
     * @ORM\ManyToOne(targetEntity=Store::class, inversedBy="products")
     * @ORM\JoinColumn(nullable=false)
     */
    private $idStore;

    /**
     * @ORM\ManyToOne(targetEntity=Category::class, inversedBy="products")
     * @ORM\JoinColumn(nullable=false)
     */
    private $idCategory;

    /**
     * @ORM\OneToMany(targetEntity=Desktop::class, mappedBy="idProduct")
     */
    private $desktops;

    /**
     * @ORM\OneToMany(targetEntity=Laptop::class, mappedBy="idProduct")
     */
    private $laptops;

    /**
     * @ORM\OneToMany(targetEntity=Mouse::class, mappedBy="idProduct")
     */
    private $Mouse;

    /**
     * @ORM\OneToMany(targetEntity=Keyboard::class, mappedBy="idProduct")
     */
    private $keyboards;

    /**
     * @ORM\OneToMany(targetEntity=Screen::class, mappedBy="idProduct")
     */
    private $screens;

    /**
     * @ORM\OneToMany(targetEntity=Smartphone::class, mappedBy="idProduct")
     */
    private $smartphones;

    /**
     * @ORM\OneToMany(targetEntity=Tablet::class, mappedBy="idProduct")
     */
    private $tablets;

    /**
     * @ORM\OneToMany(targetEntity=Headphones::class, mappedBy="idProduct")
     */
    private $headphones;

    /**
     * @ORM\OneToMany(targetEntity=Charger::class, mappedBy="idProduct")
     */
    private $chargers;

    /**
     * @ORM\OneToMany(targetEntity=DeviceCase::class, mappedBy="idProduct")
     */
    private $deviceCases;

    /**
     * @ORM\OneToMany(targetEntity=SmartWatch::class, mappedBy="idProduct")
     */
    private $smartWatches;

    /**
     * @ORM\OneToMany(targetEntity=Webcam::class, mappedBy="idProduct")
     */
    private $webcams;

    /**
     * @ORM\OneToMany(targetEntity=HardDisk::class, mappedBy="idProduct")
     */
    private $hardDisks;

    /**
     * @ORM\OneToMany(targetEntity=Box::class, mappedBy="idProduct")
     */
    private $boxes;

    /**
     * @ORM\OneToMany(targetEntity=RamMemory::class, mappedBy="idProduct")
     */
    private $ramMemories;

    /**
     * @ORM\OneToMany(targetEntity=Motherboard::class, mappedBy="idProduct")
     */
    private $motherboards;

    /**
     * @ORM\OneToMany(targetEntity=Processor::class, mappedBy="idProduct")
     */
    private $processors;

    /**
     * @ORM\OneToMany(targetEntity=PowerSupply::class, mappedBy="idProduct")
     */
    private $powerSupplies;

    /**
     * @ORM\OneToMany(targetEntity=GraphicCard::class, mappedBy="idProduct")
     */
    private $graphicCards;

    /**
     * @ORM\OneToMany(targetEntity=Refrigeration::class, mappedBy="idProduct")
     */
    private $refrigerations;

    public function __construct()
    {
        $this->desktops = new ArrayCollection();
        $this->laptops = new ArrayCollection();
        $this->Mouse = new ArrayCollection();
        $this->keyboards = new ArrayCollection();
        $this->screens = new ArrayCollection();
        $this->smartphones = new ArrayCollection();
        $this->tablets = new ArrayCollection();
        $this->headphones = new ArrayCollection();
        $this->chargers = new ArrayCollection();
        $this->deviceCases = new ArrayCollection();
        $this->smartWatches = new ArrayCollection();
        $this->webcams = new ArrayCollection();
        $this->hardDisks = new ArrayCollection();
        $this->boxes = new ArrayCollection();
        $this->ramMemories = new ArrayCollection();
        $this->motherboards = new ArrayCollection();
        $this->processors = new ArrayCollection();
        $this->powerSupplies = new ArrayCollection();
        $this->graphicCards = new ArrayCollection();
        $this->refrigerations = new ArrayCollection();
    }

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

    public function getStock(): ?int
    {
        return $this->stock;
    }

    public function setStock(int $stock): self
    {
        $this->stock = $stock;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

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

    public function getDisscount(): ?float
    {
        return $this->disscount;
    }

    public function setDisscount(?float $disscount): self
    {
        $this->disscount = $disscount;

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

    public function getDimensions(): ?string
    {
        return $this->dimensions;
    }

    public function setDimensions(?string $dimensions): self
    {
        $this->dimensions = $dimensions;

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

    public function getIdStore(): ?Store
    {
        return $this->idStore;
    }

    public function setIdStore(?Store $idStore): self
    {
        $this->idStore = $idStore;

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

    /**
     * @return Collection|Desktop[]
     */
    public function getDesktops(): Collection
    {
        return $this->desktops;
    }

    public function addDesktop(Desktop $desktop): self
    {
        if (!$this->desktops->contains($desktop)) {
            $this->desktops[] = $desktop;
            $desktop->setIdProduct($this);
        }

        return $this;
    }

    public function removeDesktop(Desktop $desktop): self
    {
        if ($this->desktops->removeElement($desktop)) {
            // set the owning side to null (unless already changed)
            if ($desktop->getIdProduct() === $this) {
                $desktop->setIdProduct(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Laptop[]
     */
    public function getLaptops(): Collection
    {
        return $this->laptops;
    }

    public function addLaptop(Laptop $laptop): self
    {
        if (!$this->laptops->contains($laptop)) {
            $this->laptops[] = $laptop;
            $laptop->setIdProduct($this);
        }

        return $this;
    }

    public function removeLaptop(Laptop $laptop): self
    {
        if ($this->laptops->removeElement($laptop)) {
            // set the owning side to null (unless already changed)
            if ($laptop->getIdProduct() === $this) {
                $laptop->setIdProduct(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Mouse[]
     */
    public function getMouse(): Collection
    {
        return $this->Mouse;
    }

    public function addMouse(Mouse $mouse): self
    {
        if (!$this->Mouse->contains($mouse)) {
            $this->Mouse[] = $mouse;
            $mouse->setIdProduct($this);
        }

        return $this;
    }

    public function removeMouse(Mouse $mouse): self
    {
        if ($this->Mouse->removeElement($mouse)) {
            // set the owning side to null (unless already changed)
            if ($mouse->getIdProduct() === $this) {
                $mouse->setIdProduct(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Keyboard[]
     */
    public function getKeyboards(): Collection
    {
        return $this->keyboards;
    }

    public function addKeyboard(Keyboard $keyboard): self
    {
        if (!$this->keyboards->contains($keyboard)) {
            $this->keyboards[] = $keyboard;
            $keyboard->setIdProduct($this);
        }

        return $this;
    }

    public function removeKeyboard(Keyboard $keyboard): self
    {
        if ($this->keyboards->removeElement($keyboard)) {
            // set the owning side to null (unless already changed)
            if ($keyboard->getIdProduct() === $this) {
                $keyboard->setIdProduct(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Screen[]
     */
    public function getScreens(): Collection
    {
        return $this->screens;
    }

    public function addScreen(Screen $screen): self
    {
        if (!$this->screens->contains($screen)) {
            $this->screens[] = $screen;
            $screen->setIdProduct($this);
        }

        return $this;
    }

    public function removeScreen(Screen $screen): self
    {
        if ($this->screens->removeElement($screen)) {
            // set the owning side to null (unless already changed)
            if ($screen->getIdProduct() === $this) {
                $screen->setIdProduct(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Smartphone[]
     */
    public function getSmartphones(): Collection
    {
        return $this->smartphones;
    }

    public function addSmartphone(Smartphone $smartphone): self
    {
        if (!$this->smartphones->contains($smartphone)) {
            $this->smartphones[] = $smartphone;
            $smartphone->setIdProduct($this);
        }

        return $this;
    }

    public function removeSmartphone(Smartphone $smartphone): self
    {
        if ($this->smartphones->removeElement($smartphone)) {
            // set the owning side to null (unless already changed)
            if ($smartphone->getIdProduct() === $this) {
                $smartphone->setIdProduct(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Tablet[]
     */
    public function getTablets(): Collection
    {
        return $this->tablets;
    }

    public function addTablet(Tablet $tablet): self
    {
        if (!$this->tablets->contains($tablet)) {
            $this->tablets[] = $tablet;
            $tablet->setIdProduct($this);
        }

        return $this;
    }

    public function removeTablet(Tablet $tablet): self
    {
        if ($this->tablets->removeElement($tablet)) {
            // set the owning side to null (unless already changed)
            if ($tablet->getIdProduct() === $this) {
                $tablet->setIdProduct(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Headphones[]
     */
    public function getHeadphones(): Collection
    {
        return $this->headphones;
    }

    public function addHeadphone(Headphones $headphone): self
    {
        if (!$this->headphones->contains($headphone)) {
            $this->headphones[] = $headphone;
            $headphone->setIdProduct($this);
        }

        return $this;
    }

    public function removeHeadphone(Headphones $headphone): self
    {
        if ($this->headphones->removeElement($headphone)) {
            // set the owning side to null (unless already changed)
            if ($headphone->getIdProduct() === $this) {
                $headphone->setIdProduct(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Charger[]
     */
    public function getChargers(): Collection
    {
        return $this->chargers;
    }

    public function addCharger(Charger $charger): self
    {
        if (!$this->chargers->contains($charger)) {
            $this->chargers[] = $charger;
            $charger->setIdProduct($this);
        }

        return $this;
    }

    public function removeCharger(Charger $charger): self
    {
        if ($this->chargers->removeElement($charger)) {
            // set the owning side to null (unless already changed)
            if ($charger->getIdProduct() === $this) {
                $charger->setIdProduct(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|DeviceCase[]
     */
    public function getDeviceCases(): Collection
    {
        return $this->deviceCases;
    }

    public function addDeviceCase(DeviceCase $deviceCase): self
    {
        if (!$this->deviceCases->contains($deviceCase)) {
            $this->deviceCases[] = $deviceCase;
            $deviceCase->setIdProduct($this);
        }

        return $this;
    }

    public function removeDeviceCase(DeviceCase $deviceCase): self
    {
        if ($this->deviceCases->removeElement($deviceCase)) {
            // set the owning side to null (unless already changed)
            if ($deviceCase->getIdProduct() === $this) {
                $deviceCase->setIdProduct(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|SmartWatch[]
     */
    public function getSmartWatches(): Collection
    {
        return $this->smartWatches;
    }

    public function addSmartWatch(SmartWatch $smartWatch): self
    {
        if (!$this->smartWatches->contains($smartWatch)) {
            $this->smartWatches[] = $smartWatch;
            $smartWatch->setIdProduct($this);
        }

        return $this;
    }

    public function removeSmartWatch(SmartWatch $smartWatch): self
    {
        if ($this->smartWatches->removeElement($smartWatch)) {
            // set the owning side to null (unless already changed)
            if ($smartWatch->getIdProduct() === $this) {
                $smartWatch->setIdProduct(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Webcam[]
     */
    public function getWebcams(): Collection
    {
        return $this->webcams;
    }

    public function addWebcam(Webcam $webcam): self
    {
        if (!$this->webcams->contains($webcam)) {
            $this->webcams[] = $webcam;
            $webcam->setIdProduct($this);
        }

        return $this;
    }

    public function removeWebcam(Webcam $webcam): self
    {
        if ($this->webcams->removeElement($webcam)) {
            // set the owning side to null (unless already changed)
            if ($webcam->getIdProduct() === $this) {
                $webcam->setIdProduct(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|HardDisk[]
     */
    public function getHardDisks(): Collection
    {
        return $this->hardDisks;
    }

    public function addHardDisk(HardDisk $hardDisk): self
    {
        if (!$this->hardDisks->contains($hardDisk)) {
            $this->hardDisks[] = $hardDisk;
            $hardDisk->setIdProduct($this);
        }

        return $this;
    }

    public function removeHardDisk(HardDisk $hardDisk): self
    {
        if ($this->hardDisks->removeElement($hardDisk)) {
            // set the owning side to null (unless already changed)
            if ($hardDisk->getIdProduct() === $this) {
                $hardDisk->setIdProduct(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Box[]
     */
    public function getBoxes(): Collection
    {
        return $this->boxes;
    }

    public function addBox(Box $box): self
    {
        if (!$this->boxes->contains($box)) {
            $this->boxes[] = $box;
            $box->setIdProduct($this);
        }

        return $this;
    }

    public function removeBox(Box $box): self
    {
        if ($this->boxes->removeElement($box)) {
            // set the owning side to null (unless already changed)
            if ($box->getIdProduct() === $this) {
                $box->setIdProduct(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|RamMemory[]
     */
    public function getRamMemories(): Collection
    {
        return $this->ramMemories;
    }

    public function addRamMemory(RamMemory $ramMemory): self
    {
        if (!$this->ramMemories->contains($ramMemory)) {
            $this->ramMemories[] = $ramMemory;
            $ramMemory->setIdProduct($this);
        }

        return $this;
    }

    public function removeRamMemory(RamMemory $ramMemory): self
    {
        if ($this->ramMemories->removeElement($ramMemory)) {
            // set the owning side to null (unless already changed)
            if ($ramMemory->getIdProduct() === $this) {
                $ramMemory->setIdProduct(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Motherboard[]
     */
    public function getMotherboards(): Collection
    {
        return $this->motherboards;
    }

    public function addMotherboard(Motherboard $motherboard): self
    {
        if (!$this->motherboards->contains($motherboard)) {
            $this->motherboards[] = $motherboard;
            $motherboard->setIdProduct($this);
        }

        return $this;
    }

    public function removeMotherboard(Motherboard $motherboard): self
    {
        if ($this->motherboards->removeElement($motherboard)) {
            // set the owning side to null (unless already changed)
            if ($motherboard->getIdProduct() === $this) {
                $motherboard->setIdProduct(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Processor[]
     */
    public function getProcessors(): Collection
    {
        return $this->processors;
    }

    public function addProcessor(Processor $processor): self
    {
        if (!$this->processors->contains($processor)) {
            $this->processors[] = $processor;
            $processor->setIdProduct($this);
        }

        return $this;
    }

    public function removeProcessor(Processor $processor): self
    {
        if ($this->processors->removeElement($processor)) {
            // set the owning side to null (unless already changed)
            if ($processor->getIdProduct() === $this) {
                $processor->setIdProduct(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|PowerSupply[]
     */
    public function getPowerSupplies(): Collection
    {
        return $this->powerSupplies;
    }

    public function addPowerSupply(PowerSupply $powerSupply): self
    {
        if (!$this->powerSupplies->contains($powerSupply)) {
            $this->powerSupplies[] = $powerSupply;
            $powerSupply->setIdProduct($this);
        }

        return $this;
    }

    public function removePowerSupply(PowerSupply $powerSupply): self
    {
        if ($this->powerSupplies->removeElement($powerSupply)) {
            // set the owning side to null (unless already changed)
            if ($powerSupply->getIdProduct() === $this) {
                $powerSupply->setIdProduct(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|GraphicCard[]
     */
    public function getGraphicCards(): Collection
    {
        return $this->graphicCards;
    }

    public function addGraphicCard(GraphicCard $graphicCard): self
    {
        if (!$this->graphicCards->contains($graphicCard)) {
            $this->graphicCards[] = $graphicCard;
            $graphicCard->setIdProduct($this);
        }

        return $this;
    }

    public function removeGraphicCard(GraphicCard $graphicCard): self
    {
        if ($this->graphicCards->removeElement($graphicCard)) {
            // set the owning side to null (unless already changed)
            if ($graphicCard->getIdProduct() === $this) {
                $graphicCard->setIdProduct(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Refrigeration[]
     */
    public function getRefrigerations(): Collection
    {
        return $this->refrigerations;
    }

    public function addRefrigeration(Refrigeration $refrigeration): self
    {
        if (!$this->refrigerations->contains($refrigeration)) {
            $this->refrigerations[] = $refrigeration;
            $refrigeration->setIdProduct($this);
        }

        return $this;
    }

    public function removeRefrigeration(Refrigeration $refrigeration): self
    {
        if ($this->refrigerations->removeElement($refrigeration)) {
            // set the owning side to null (unless already changed)
            if ($refrigeration->getIdProduct() === $this) {
                $refrigeration->setIdProduct(null);
            }
        }

        return $this;
    }
}
