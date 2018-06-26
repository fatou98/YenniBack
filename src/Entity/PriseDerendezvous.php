<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PriseDerendezvousRepository")
 */
class PriseDerendezvous
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $nomComplet;

    /**
     * @ORM\Column(type="integer")
     */
    private $telephone;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $adresseMail;

    /**
     * @ORM\Column(type="date")
     */
    private $datenaiss;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $specialite;

    /**
     * @ORM\Column(type="datetime")
     */
    private $daterv;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $motif;
     /**
     * @ORM\Column(type="string", length=50)
     */
    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\SpecialiteStucture")
     * @ORM\JoinColumn(nullable=false)
     */
    private $SpecialiteStucture;

    public function getId()
    {
        return $this->id;
    }

    public function getNomComplet(): ?string
    {
        return $this->nomComplet;
    }

    public function setNomComplet(string $nomComplet): self
    {
        $this->nomComplet = $nomComplet;

        return $this;
    }

    public function getTelephone(): ?int
    {
        return $this->telephone;
    }

    public function setTelephone(int $telephone): self
    {
        $this->telephone = $telephone;

        return $this;
    }

    public function getAdresseMail(): ?string
    {
        return $this->adresseMail;
    }

    public function setAdresseMail(string $adresseMail): self
    {
        $this->adresseMail = $adresseMail;

        return $this;
    }

    public function getDatenaiss(): ?\DateTimeInterface
    {
        return $this->datenaiss;
    }

    public function setDatenaiss(\DateTimeInterface $datenaiss): self
    {
        $this->datenaiss = $datenaiss;

        return $this;
    }

    public function getSpecialite(): ?string
    {
        return $this->specialite;
    }

    public function setSpecialite(string $specialite): self
    {
        $this->specialite = $specialite;

        return $this;
    }

    public function getDaterv(): ?\DateTimeInterface
    {
        return $this->daterv;
    }

    public function setDaterv(\DateTimeInterface $daterv): self
    {
        $this->daterv = $daterv;

        return $this;
    }

    public function getMotif(): ?string
    {
        return $this->motif;
    }

    public function setMotif(string $motif): self
    {
        $this->motif = $motif;

        return $this;
    }

    /**
     * Get the value of SpecialiteStucture
     */ 
    public function getSpecialiteStucture()
    {
        return $this->SpecialiteStucture;
    }

    /**
     * Set the value of SpecialiteStucture
     *
     * @return  self
     */ 
    public function setSpecialiteStucture($SpecialiteStucture)
    {
        $this->SpecialiteStucture = $SpecialiteStucture;

        return $this;
    }
}