<?php
namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\AdvancedUserInterface;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Table(name="client")
 * @UniqueEntity(fields="email")
 * @ORM\Entity()
 */
class Client implements AdvancedUserInterface, \Serializable {

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100, unique=true)
     * @Assert\NotBlank()
     */
    private $email;
 /**
     * @ORM\Column(type="string", length=30, unique=false)
     * @Assert\NotBlank()
     */
    private $nomcomplet;
 /**
     * @ORM\Column(type="integer", length=50, unique=true)
     * @Assert\NotBlank()
     */
    private $Numpiece;
/**
     * @ORM\Column(type="string", length=255, unique=false)
     * @Assert\NotBlank()
     */
    private $adresse;
 /**
     * @ORM\Column(type="integer", length=50, unique=true)
     * @Assert\NotBlank()
     */
    private $Tel;

    /**
     * @Assert\NotBlank()
     * @Assert\Length(max=250)
     */
    private $plainPassword;

    /**
     * The below length depends on the "algorithm" you use for encoding
     * the password, but this works well with bcrypt.
     *
     * @ORM\Column(type="string", length=64)
     */
    private $password;

    /**
     * @ORM\Column(name="is_active", type="boolean")
     */
    private $isActive;

    /**
     * @ORM\Column(name="roles", type="array")
     */
    private $roles = array();

    public function __construct() {
        $this->isActive = true;
        // may not be needed, see section on salt below
        // $this->salt = md5(uniqid('', true));
    }

    public function getUsername() {
        return $this->email;
    }

    public function getSalt() {
        // you *may* need a real salt depending on your encoder
        // see section on salt below
        return null;
    }

    public function getPassword() {
        return $this->password;
    }

    function setPassword($password) {
        $this->password = $password;
    }

    public function getRoles() {
        if (empty($this->roles)) {
            return ['ROLE_USER'];
        }
        return $this->roles;
    }

    function addRole($role) {
        $this->roles[] = $role;
    }

    public function eraseCredentials() {
        
    }

    /** @see \Serializable::serialize() */
    public function serialize() {
        return serialize(array(
            $this->id,
            $this->email,
            $this->password,
            $this->isActive,
                // see section on salt below
                // $this->salt,
        ));
    }

    /** @see \Serializable::unserialize() */
    public function unserialize($serialized) {
        list (
                $this->id,
                $this->email,
                $this->password,
                $this->isActive,
                // see section on salt below
                // $this->salt
                ) = unserialize($serialized);
    }

    public function isAccountNonExpired() {
        return true;
    }

    public function isAccountNonLocked() {
        return true;
    }

    public function isCredentialsNonExpired() {
        return true;
    }

    public function isEnabled() {
        return $this->isActive;
    }

    function getId() {
        return $this->id;
    }

    function getEmail() {
        return $this->email;
    }

  

    function getIsActive() {
        return $this->isActive;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    public function getPlainPassword()
    {
        return $this->plainPassword;
    }

    public function setPlainPassword($password)
    {
        $this->plainPassword = $password;
    }


    function setIsActive($isActive) {
        $this->isActive = $isActive;
    }


    /**
     * Get the value of Nomcomplet
     */ 
    public function getNomcomplet()
    {
        return $this->nomcomplet;
    }

    /**
     * Set the value of Nomcomplet
     *
     * @return  self
     */ 
    public function setNomcomplet($nomcomplet)
    {
        $this->nomcomplet = $nomcomplet;

        return $this;
    }

    /**
     * Get the value of Numpiece
     */ 
    public function getNumpiece()
    {
        return $this->Numpiece;
    }

    /**
     * Set the value of Numpiece
     *
     * @return  self
     */ 
    public function setNumpiece($Numpiece)
    {
        $this->Numpiece = $Numpiece;

        return $this;
    }

    /**
     * Get the value of adresse
     */ 
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * Set the value of adresse
     *
     * @return  self
     */ 
    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;

        return $this;
    }

    /**
     * Get the value of Tel
     */ 
    public function getTel()
    {
        return $this->Tel;
    }

    /**
     * Set the value of Tel
     *
     * @return  self
     */ 
    public function setTel($Tel)
    {
        $this->Tel = $Tel;

        return $this;
    }
}