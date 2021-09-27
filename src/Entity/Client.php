<?php

namespace App\Entity;

use App\Repository\ClientRepository;
use App\Util\TimeStampableEntity;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ClientRepository::class)
 */
class Client
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
    private $firstName;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $lastName;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    /**
     * @ORM\OneToMany(targetEntity=PointClient::class, mappedBy="client")
     */
    private $pointClients;

    /**
     * @ORM\OneToMany(targetEntity=Rent::class, mappedBy="client")
     */
    private $rent;

    public function __construct()
    {
        $this->pointClients = new ArrayCollection();
        $this->rent = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(string $firstName): self
    {
        $this->firstName = $firstName;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLastName(string $lastName): self
    {
        $this->lastName = $lastName;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * @return Collection|PointClient[]
     */
    public function getPointClients(): Collection
    {
        return $this->pointClients;
    }

    public function addPointClient(PointClient $pointClient): self
    {
        if (!$this->pointClients->contains($pointClient)) {
            $this->pointClients[] = $pointClient;
            $pointClient->setClient($this);
        }

        return $this;
    }

    public function removePointClient(PointClient $pointClient): self
    {
        if ($this->pointClients->removeElement($pointClient)) {
            // set the owning side to null (unless already changed)
            if ($pointClient->getClient() === $this) {
                $pointClient->setClient(null);
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


    /**
     * @return ArrayCollection
     */
    public function getRent(): ArrayCollection
    {
        return $this->rent;
    }

    /**
     * @param ArrayCollection $rent
     */
    public function setRent(ArrayCollection $rent): void
    {
        $this->rent = $rent;
    }

}
