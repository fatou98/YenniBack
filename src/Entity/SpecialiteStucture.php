<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\SpecialiteStuctureRepository")
 */
class SpecialiteStucture
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
    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Specialite")
     * @ORM\JoinColumn(nullable=false)
     */
    private $Specialite;
    /**
     * @ORM\Column(type="string", length=50)
     */
    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Structure")
     * @ORM\JoinColumn(nullable=false)
     */
    private $Structure;



    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of Specialite
     */ 
    public function getSpecialite()
    {
        return $this->Specialite;
    }

    /**
     * Set the value of Specialite
     *
     * @return  self
     */ 
    public function setSpecialite($Specialite)
    {
        $this->Specialite = $Specialite;

        return $this;
    }

    /**
     * Get the value of Structure
     */ 
    public function getStructure()
    {
        return $this->Structure;
    }

    /**
     * Set the value of Structure
     *
     * @return  self
     */ 
    public function setStructure($Structure)
    {
        $this->Structure = $Structure;

        return $this;
    }
}
