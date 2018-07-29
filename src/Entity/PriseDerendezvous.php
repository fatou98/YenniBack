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
     * @ORM\Column(type="string", length=10)
     */
    private $heure;

    /**
     * @ORM\Column(type="date")
     */
    private $daterv;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $motif;
     
    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Specialite")
     * @ORM\JoinColumn(nullable=false)
     */
    private $specialite;
    
 /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Structure")
     * @ORM\JoinColumn(nullable=false)
     */
    private $structure;
     /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Client")
     * @ORM\JoinColumn(nullable=false)
     */
    private $client;

    
    public function getId()
    {
        return $this->id;
    }  
    public function getSpecialite(): ?string
    {
        return $this->specialite;
    }

    public function setSpecialite($specialite): self
    {
        $this->specialite = $specialite;

        return $this;
    }

    public function getDaterv(): ?\DateTimeInterface
    {
        return $this->daterv;
    }

    public function setDaterv($daterv): self
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
     * Get the value of heure
     */ 
    public function getHeure()
    {
        return $this->heure;
    }

    /**
     * Set the value of heure
     *
     * @return  self
     */ 
    public function setHeure($heure)
    {
        $this->heure = $heure;

        return $this;
    }

    /**
     * Get the value of structure
     */ 
    public function getStructure()
    {
        return $this->structure;
    }

    /**
     * Set the value of structure
     *
     * @return  self
     */ 
    public function setStructure($structure)
    {
        $this->structure = $structure;

        return $this;
    }

    /**
     * Get the value of client
     */ 
    public function getClient()
    {
        return $this->client;
    }

    /**
     * Set the value of client
     *
     * @return  self
     */ 
    public function setClient($client)
    {
        $this->client = $client;

        return $this;
    }
}
