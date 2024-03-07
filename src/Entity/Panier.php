<?php

namespace App\Entity;

use App\Repository\PanierRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PanierRepository::class)]
class Panier
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $dateCreation = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?Client $client = null;

    #[ORM\OneToMany(targetEntity: LineCommande::class, mappedBy: 'panier')]
    private Collection $lineCommandes;

    public function __construct()
    {
        $this->lineCommandes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateCreation(): ?\DateTimeInterface
    {
        return $this->dateCreation;
    }

    public function setDateCreation(\DateTimeInterface $dateCreation): static
    {
        $this->dateCreation = $dateCreation;

        return $this;
    }

    public function getClient(): ?Client
    {
        return $this->client;
    }

    public function setClient(Client $client): static
    {
        $this->client = $client;

        return $this;
    }

    /**
     * @return Collection<int, LineCommande>
     */
    public function getLineCommandes(): Collection
    {
        return $this->lineCommandes;
    }

    public function addLineCommande(LineCommande $lineCommande): static
    {
        if (!$this->lineCommandes->contains($lineCommande)) {
            $this->lineCommandes->add($lineCommande);
            $lineCommande->setPanier($this);
        }

        return $this;
    }

    public function removeLineCommande(LineCommande $lineCommande): static
    {
        if ($this->lineCommandes->removeElement($lineCommande)) {
            // set the owning side to null (unless already changed)
            if ($lineCommande->getPanier() === $this) {
                $lineCommande->setPanier(null);
            }
        }

        return $this;
    }
}
