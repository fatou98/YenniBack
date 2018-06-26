<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\StructureRepository")
 */
class Structure
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
    private $nomStructure;
     /**
     * @ORM\ManyToOne(targetEntity="App\Entity\TypeStructure")
     * @ORM\JoinColumn(nullable=false)
     */
    private $TypeStructure;


    public function getId()
    {
        return $this->id;
    }

    public function getNomStructure(): ?string
    {
        return $this->nomStructure;
    }

    public function setNomStructure(string $nomStructure): self
    {
        $this->nomStructure = $nomStructure;

        return $this;
    }

    /**
     * Get the value of TypeStructure
     */ 
    public function getTypeStructure()
    {
        return $this->TypeStructure;
    }

    /**
     * Set the value of TypeStructure
     *
     * @return  self
     */ 
    public function setTypeStructure($TypeStructure)
    {
        $this->TypeStructure = $TypeStructure;

        return $this;
    }
}
