<?php

namespace App\Entity;

use App\Repository\SubCategoryRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SubCategoryRepository::class)
 */
class SubCategory
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
     * @ORM\Column(type="string", length=100)
     */
    private $description;

    /**
     * @ORM\ManyToOne(targetEntity=Category::class, inversedBy="subCategories")
     * @ORM\JoinColumn(nullable=false)
     */
    private $idCategory;

    /**
     * @ORM\OneToMany(targetEntity=Desktop::class, mappedBy="idSubcategory")
     */
    private $desktops;

    /**
     * @ORM\OneToMany(targetEntity=Laptop::class, mappedBy="idSubcategory")
     */
    private $laptops;

    /**
     * @ORM\OneToMany(targetEntity=Mouse::class, mappedBy="idSubcategory")
     */
    private $Mouse;

    /**
     * @ORM\OneToMany(targetEntity=Keyboard::class, mappedBy="idSubcategory")
     */
    private $keyboards;

    /**
     * @ORM\OneToMany(targetEntity=Screen::class, mappedBy="idSubcategory")
     */
    private $screens;

    /**
     * @ORM\OneToMany(targetEntity=Headphones::class, mappedBy="idSubcategory")
     */
    private $headphones;

    /**
     * @ORM\OneToMany(targetEntity=Charger::class, mappedBy="idSubcategory")
     */
    private $chargers;

    /**
     * @ORM\OneToMany(targetEntity=DeviceCase::class, mappedBy="idSubcategory")
     */
    private $deviceCases;

    /**
     * @ORM\OneToMany(targetEntity=SmartWatch::class, mappedBy="idSubcategory")
     */
    private $smartWatches;

    /**
     * @ORM\OneToMany(targetEntity=Webcam::class, mappedBy="idSubcategory")
     */
    private $webcams;

    /**
     * @ORM\OneToMany(targetEntity=HardDisk::class, mappedBy="idSubcategory")
     */
    private $hardDisks;

    /**
     * @ORM\OneToMany(targetEntity=Box::class, mappedBy="idSubcategory")
     */
    private $boxes;

    /**
     * @ORM\OneToMany(targetEntity=RamMemory::class, mappedBy="idSubcategory")
     */
    private $ramMemories;

    /**
     * @ORM\OneToMany(targetEntity=Motherboard::class, mappedBy="idSubcategory")
     */
    private $motherboards;

    /**
     * @ORM\OneToMany(targetEntity=Processor::class, mappedBy="idsubcategory")
     */
    private $processors;

    /**
     * @ORM\OneToMany(targetEntity=PowerSupply::class, mappedBy="idSubcategory")
     */
    private $powerSupplies;

    /**
     * @ORM\OneToMany(targetEntity=GraphicCard::class, mappedBy="idSubcategory")
     */
    private $graphicCards;

    /**
     * @ORM\OneToMany(targetEntity=Refrigeration::class, mappedBy="idSubcategory")
     */
    private $refrigerations;

    public function __construct()
    {
        $this->desktops = new ArrayCollection();
        $this->laptops = new ArrayCollection();
        $this->Mouse = new ArrayCollection();
        $this->keyboards = new ArrayCollection();
        $this->screens = new ArrayCollection();
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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

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
            $desktop->setIdSubcategory($this);
        }

        return $this;
    }

    public function removeDesktop(Desktop $desktop): self
    {
        if ($this->desktops->removeElement($desktop)) {
            // set the owning side to null (unless already changed)
            if ($desktop->getIdSubcategory() === $this) {
                $desktop->setIdSubcategory(null);
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
            $laptop->setIdSubcategory($this);
        }

        return $this;
    }

    public function removeLaptop(Laptop $laptop): self
    {
        if ($this->laptops->removeElement($laptop)) {
            // set the owning side to null (unless already changed)
            if ($laptop->getIdSubcategory() === $this) {
                $laptop->setIdSubcategory(null);
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
            $mouse->setIdSubcategory($this);
        }

        return $this;
    }

    public function removeMouse(Mouse $mouse): self
    {
        if ($this->Mouse->removeElement($mouse)) {
            // set the owning side to null (unless already changed)
            if ($mouse->getIdSubcategory() === $this) {
                $mouse->setIdSubcategory(null);
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
            $keyboard->setIdSubcategory($this);
        }

        return $this;
    }

    public function removeKeyboard(Keyboard $keyboard): self
    {
        if ($this->keyboards->removeElement($keyboard)) {
            // set the owning side to null (unless already changed)
            if ($keyboard->getIdSubcategory() === $this) {
                $keyboard->setIdSubcategory(null);
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
            $screen->setIdSubcategory($this);
        }

        return $this;
    }

    public function removeScreen(Screen $screen): self
    {
        if ($this->screens->removeElement($screen)) {
            // set the owning side to null (unless already changed)
            if ($screen->getIdSubcategory() === $this) {
                $screen->setIdSubcategory(null);
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
            $headphone->setIdSubcategory($this);
        }

        return $this;
    }

    public function removeHeadphone(Headphones $headphone): self
    {
        if ($this->headphones->removeElement($headphone)) {
            // set the owning side to null (unless already changed)
            if ($headphone->getIdSubcategory() === $this) {
                $headphone->setIdSubcategory(null);
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
            $charger->setIdSubcategory($this);
        }

        return $this;
    }

    public function removeCharger(Charger $charger): self
    {
        if ($this->chargers->removeElement($charger)) {
            // set the owning side to null (unless already changed)
            if ($charger->getIdSubcategory() === $this) {
                $charger->setIdSubcategory(null);
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
            $deviceCase->setIdSubcategory($this);
        }

        return $this;
    }

    public function removeDeviceCase(DeviceCase $deviceCase): self
    {
        if ($this->deviceCases->removeElement($deviceCase)) {
            // set the owning side to null (unless already changed)
            if ($deviceCase->getIdSubcategory() === $this) {
                $deviceCase->setIdSubcategory(null);
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
            $smartWatch->setIdSubcategory($this);
        }

        return $this;
    }

    public function removeSmartWatch(SmartWatch $smartWatch): self
    {
        if ($this->smartWatches->removeElement($smartWatch)) {
            // set the owning side to null (unless already changed)
            if ($smartWatch->getIdSubcategory() === $this) {
                $smartWatch->setIdSubcategory(null);
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
            $webcam->setIdSubcategory($this);
        }

        return $this;
    }

    public function removeWebcam(Webcam $webcam): self
    {
        if ($this->webcams->removeElement($webcam)) {
            // set the owning side to null (unless already changed)
            if ($webcam->getIdSubcategory() === $this) {
                $webcam->setIdSubcategory(null);
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
            $hardDisk->setIdSubcategory($this);
        }

        return $this;
    }

    public function removeHardDisk(HardDisk $hardDisk): self
    {
        if ($this->hardDisks->removeElement($hardDisk)) {
            // set the owning side to null (unless already changed)
            if ($hardDisk->getIdSubcategory() === $this) {
                $hardDisk->setIdSubcategory(null);
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
            $box->setIdSubcategory($this);
        }

        return $this;
    }

    public function removeBox(Box $box): self
    {
        if ($this->boxes->removeElement($box)) {
            // set the owning side to null (unless already changed)
            if ($box->getIdSubcategory() === $this) {
                $box->setIdSubcategory(null);
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
            $ramMemory->setIdSubcategory($this);
        }

        return $this;
    }

    public function removeRamMemory(RamMemory $ramMemory): self
    {
        if ($this->ramMemories->removeElement($ramMemory)) {
            // set the owning side to null (unless already changed)
            if ($ramMemory->getIdSubcategory() === $this) {
                $ramMemory->setIdSubcategory(null);
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
            $motherboard->setIdSubcategory($this);
        }

        return $this;
    }

    public function removeMotherboard(Motherboard $motherboard): self
    {
        if ($this->motherboards->removeElement($motherboard)) {
            // set the owning side to null (unless already changed)
            if ($motherboard->getIdSubcategory() === $this) {
                $motherboard->setIdSubcategory(null);
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
            $processor->setIdsubcategory($this);
        }

        return $this;
    }

    public function removeProcessor(Processor $processor): self
    {
        if ($this->processors->removeElement($processor)) {
            // set the owning side to null (unless already changed)
            if ($processor->getIdsubcategory() === $this) {
                $processor->setIdsubcategory(null);
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
            $powerSupply->setIdSubcategory($this);
        }

        return $this;
    }

    public function removePowerSupply(PowerSupply $powerSupply): self
    {
        if ($this->powerSupplies->removeElement($powerSupply)) {
            // set the owning side to null (unless already changed)
            if ($powerSupply->getIdSubcategory() === $this) {
                $powerSupply->setIdSubcategory(null);
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
            $graphicCard->setIdSubcategory($this);
        }

        return $this;
    }

    public function removeGraphicCard(GraphicCard $graphicCard): self
    {
        if ($this->graphicCards->removeElement($graphicCard)) {
            // set the owning side to null (unless already changed)
            if ($graphicCard->getIdSubcategory() === $this) {
                $graphicCard->setIdSubcategory(null);
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
            $refrigeration->setIdSubcategory($this);
        }

        return $this;
    }

    public function removeRefrigeration(Refrigeration $refrigeration): self
    {
        if ($this->refrigerations->removeElement($refrigeration)) {
            // set the owning side to null (unless already changed)
            if ($refrigeration->getIdSubcategory() === $this) {
                $refrigeration->setIdSubcategory(null);
            }
        }

        return $this;
    }
}
