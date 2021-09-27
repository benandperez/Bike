<?php

namespace App\Entity;

use App\Repository\TypeMembershipRepository;
use App\Util\TimeStampableEntity;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TypeMembershipRepository::class)
 */
class TypeMembership
{

    use TimeStampableEntity;

    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $cost;

    /**
     * @ORM\OneToMany(targetEntity=BikeType::class, mappedBy="typeMembership")
     */
    private $bikeTypes;

    public function __construct()
    {
        $this->bikeTypes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getCost(): ?string
    {
        return $this->cost;
    }

    public function setCost(string $cost): self
    {
        $this->cost = $cost;

        return $this;
    }

    /**
     * @return Collection|BikeType[]
     */
    public function getBikeTypes(): Collection
    {
        return $this->bikeTypes;
    }

    public function addBikeType(BikeType $bikeType): self
    {
        if (!$this->bikeTypes->contains($bikeType)) {
            $this->bikeTypes[] = $bikeType;
            $bikeType->setTypeMembership($this);
        }

        return $this;
    }

    public function removeBikeType(BikeType $bikeType): self
    {
        if ($this->bikeTypes->removeElement($bikeType)) {
            // set the owning side to null (unless already changed)
            if ($bikeType->getTypeMembership() === $this) {
                $bikeType->setTypeMembership(null);
            }
        }

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getCreatedAt(): \DateTime
    {
        return $this->createdAt;
    }

    /**
     * @param \DateTime $createdAt
     */
    public function setCreatedAt(\DateTime $createdAt): void
    {
        $this->createdAt = $createdAt;
    }

    /**
     * @return \DateTime
     */
    public function getUpdatedAt(): \DateTime
    {
        return $this->updatedAt;
    }

    /**
     * @param \DateTime $updatedAt
     */
    public function setUpdatedAt(\DateTime $updatedAt): void
    {
        $this->updatedAt = $updatedAt;
    }
}
