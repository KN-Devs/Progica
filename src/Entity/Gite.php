<?php

namespace App\Entity;

use App\Repository\GiteRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: GiteRepository::class)]
class Gite
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column]
    private ?float $surface = null;

    #[ORM\Column]
    private ?int $nb_chambres = null;

    #[ORM\Column]
    private ?int $nb_lits = null;

    #[ORM\Column(nullable: true)]
    private ?bool $accept_animaux = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 7, scale: 2, nullable: true)]
    private ?string $tarif_animaux = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $image = null;

    #[ORM\ManyToOne(inversedBy: 'gites')]
    private ?Ville $ville = null;

    #[ORM\ManyToOne(inversedBy: 'gites')]
    private ?Proprietaire $proprietaire = null;

    #[ORM\ManyToOne(inversedBy: 'gites')]
    private ?Contact $contact = null;

    #[ORM\ManyToOne(inversedBy: 'gites')]
    private ?Prix $prix = null;

    #[ORM\ManyToMany(targetEntity: EquipementInterieur::class, inversedBy: 'gites')]
    private Collection $equiper_int;

    #[ORM\ManyToMany(targetEntity: EquipementExterieur::class, inversedBy: 'gites')]
    private Collection $equiper_ext;

    #[ORM\ManyToMany(targetEntity: Service::class, inversedBy: 'gites')]
    private Collection $gite_has_service;

    public function __construct()
    {
        $this->equiper_int = new ArrayCollection();
        $this->equiper_ext = new ArrayCollection();
        $this->gite_has_service = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getSurface(): ?float
    {
        return $this->surface;
    }

    public function setSurface(float $surface): self
    {
        $this->surface = $surface;

        return $this;
    }

    public function getNbChambres(): ?int
    {
        return $this->nb_chambres;
    }

    public function setNbChambres(int $nb_chambres): self
    {
        $this->nb_chambres = $nb_chambres;

        return $this;
    }

    public function getNbLits(): ?int
    {
        return $this->nb_lits;
    }

    public function setNbLits(int $nb_lits): self
    {
        $this->nb_lits = $nb_lits;

        return $this;
    }

    public function isAcceptAnimaux(): ?bool
    {
        return $this->accept_animaux;
    }

    public function setAcceptAnimaux(?bool $accept_animaux): self
    {
        $this->accept_animaux = $accept_animaux;

        return $this;
    }

    public function getTarifAnimaux(): ?string
    {
        return $this->tarif_animaux;
    }

    public function setTarifAnimaux(?string $tarif_animaux): self
    {
        $this->tarif_animaux = $tarif_animaux;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function getVille(): ?Ville
    {
        return $this->ville;
    }

    public function setVille(?Ville $ville): self
    {
        $this->ville = $ville;

        return $this;
    }

    public function getProprietaire(): ?Proprietaire
    {
        return $this->proprietaire;
    }

    public function setProprietaire(?Proprietaire $proprietaire): self
    {
        $this->proprietaire = $proprietaire;

        return $this;
    }

    public function getContact(): ?Contact
    {
        return $this->contact;
    }

    public function setContact(?Contact $contact): self
    {
        $this->contact = $contact;

        return $this;
    }

    public function getPrix(): ?Prix
    {
        return $this->prix;
    }

    public function setPrix(?Prix $prix): self
    {
        $this->prix = $prix;

        return $this;
    }

    /**
     * @return Collection<int, EquipementInterieur>
     */
    public function getEquiperInt(): Collection
    {
        return $this->equiper_int;
    }

    public function addEquiperInt(EquipementInterieur $equiperInt): self
    {
        if (!$this->equiper_int->contains($equiperInt)) {
            $this->equiper_int->add($equiperInt);
        }

        return $this;
    }

    public function removeEquiperInt(EquipementInterieur $equiperInt): self
    {
        $this->equiper_int->removeElement($equiperInt);

        return $this;
    }

    /**
     * @return Collection<int, EquipementExterieur>
     */
    public function getEquiperExt(): Collection
    {
        return $this->equiper_ext;
    }

    public function addEquiperExt(EquipementExterieur $equiperExt): self
    {
        if (!$this->equiper_ext->contains($equiperExt)) {
            $this->equiper_ext->add($equiperExt);
        }

        return $this;
    }

    public function removeEquiperExt(EquipementExterieur $equiperExt): self
    {
        $this->equiper_ext->removeElement($equiperExt);

        return $this;
    }

    /**
     * @return Collection<int, Service>
     */
    public function getGiteHasService(): Collection
    {
        return $this->gite_has_service;
    }

    public function addGiteHasService(Service $giteHasService): self
    {
        if (!$this->gite_has_service->contains($giteHasService)) {
            $this->gite_has_service->add($giteHasService);
        }

        return $this;
    }

    public function removeGiteHasService(Service $giteHasService): self
    {
        $this->gite_has_service->removeElement($giteHasService);

        return $this;
    }
}
