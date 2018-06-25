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


}
