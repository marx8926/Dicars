<?php

namespace Dicars\DataBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\Encoder\MessageDigestPasswordEncoder;
use \Serializable;

/**
 * Usuario
 *
 * @ORM\Table(name="usuario")
 * @ORM\Entity
 */
class Usuario implements UserInterface, \Serializable
{
    /**
     * @var integer
     *
     * @ORM\Column(name="nUsuario_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    protected $nusuarioId;

    /**
     * @var string
     *
     * @ORM\Column(name="cUsuarioID", type="string", length=255, nullable=false)
     */
    protected $cusuarioid;

    /**
     * @var string
     *
     * @ORM\Column(name="cUsuarioClave", type="string", length=255, nullable=false)
     */
    protected $cusuarioclave;

    /**
     * @var string
     *
     * @ORM\Column(name="cUsuarioEst", type="string", length=1, nullable=false)
     */
    protected $cusuarioest;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="cUsuarioFecReg", type="datetime", nullable=false)
     */
    protected $cusuariofecreg;

    /**
     * @var string
     *
     * @ORM\Column(name="salt", type="string", length=255, nullable=true)
     */
    protected $salt;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Rol", inversedBy="idUsuario")
     * @ORM\JoinTable(name="many_usuario_rol",
     *   joinColumns={
     *     @ORM\JoinColumn(name="id_usuario", referencedColumnName="nUsuario_id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="id_rol", referencedColumnName="id")
     *   }
     * )
     */
    protected $idRol;

    /**
     * @var \VenPersonal
     *
     * @ORM\ManyToOne(targetEntity="VenPersonal")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="nPersonal_id", referencedColumnName="nPersonal_id")
     * })
     */
    protected $npersonal;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idRol = new \Doctrine\Common\Collections\ArrayCollection();
        $this->salt = md5(time());
    }
    

    /**
     * Get nusuarioId
     *
     * @return integer 
     */
    public function getNusuarioId()
    {
        return $this->nusuarioId;
    }

    /**
     * Set cusuarioid
     *
     * @param string $cusuarioid
     * @return Usuario
     */
    public function setCusuarioid($cusuarioid)
    {
        $this->cusuarioid = $cusuarioid;
    
        return $this;
    }

    /**
     * Get cusuarioid
     *
     * @return string 
     */
    public function getCusuarioid()
    {
        return $this->cusuarioid;
    }

    /**
     * Set cusuarioclave
     *
     * @param string $cusuarioclave
     * @return Usuario
     */
    public function setCusuarioclave($cusuarioclave)
    {
       $encoder = new MessageDigestPasswordEncoder('sha512', true, 10);
        $passw = $encoder->encodePassword($cusuarioclave, $this->getSalt());
              
        $this->cusuarioclave = $passw;
    
        return $this;
    }

    /**
     * Get cusuarioclave
     *
     * @return string 
     */
    public function getCusuarioclave()
    {
        return $this->cusuarioclave;
    }

    /**
     * Set cusuarioest
     *
     * @param string $cusuarioest
     * @return Usuario
     */
    public function setCusuarioest($cusuarioest)
    {
        $this->cusuarioest = $cusuarioest;
    
        return $this;
    }

    /**
     * Get cusuarioest
     *
     * @return string 
     */
    public function getCusuarioest()
    {
        return $this->cusuarioest;
    }

    /**
     * Set cusuariofecreg
     *
     * @param \DateTime $cusuariofecreg
     * @return Usuario
     */
    public function setCusuariofecreg($cusuariofecreg)
    {
        $this->cusuariofecreg = $cusuariofecreg;
    
        return $this;
    }

    /**
     * Get cusuariofecreg
     *
     * @return \DateTime 
     */
    public function getCusuariofecreg()
    {
        return $this->cusuariofecreg;
    }

    /**
     * Set salt
     *
     * @param string $salt
     * @return Usuario
     */
    public function setSalt($salt)
    {
        $this->salt = $salt;
    
        return $this;
    }

    /**
     * Get salt
     *
     * @return string 
     */
    public function getSalt()
    {
        return $this->salt;
    }

    /**
     * Add idRol
     *
     * @param \Dicars\DataBundle\Entity\Rol $idRol
     * @return Usuario
     */
    public function addIdRol(\Dicars\DataBundle\Entity\Rol $idRol)
    {
        $this->idRol[] = $idRol;
    
        return $this;
    }

    /**
     * Remove idRol
     *
     * @param \Dicars\DataBundle\Entity\Rol $idRol
     */
    public function removeIdRol(\Dicars\DataBundle\Entity\Rol $idRol)
    {
        $this->idRol->removeElement($idRol);
    }

    /**
     * Get idRol
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getIdRol()
    {
        return $this->idRol;
    }

    /**
     * Set npersonal
     *
     * @param \Dicars\DataBundle\Entity\VenPersonal $npersonal
     * @return Usuario
     */
    public function setNpersonal(\Dicars\DataBundle\Entity\VenPersonal $npersonal = null)
    {
        $this->npersonal = $npersonal;
    
        return $this;
    }

    /**
     * Get npersonal
     *
     * @return \Dicars\DataBundle\Entity\VenPersonal 
     */
    public function getNpersonal()
    {
        return $this->npersonal;
    }

    public function eraseCredentials() {
        
    }

    public function getPassword() {
        return $this->getCusuarioclave();
    }

    public function getRoles() {
        return $this->getIdRol()->toArray();
    }

    public function getUsername() {
        return $this->getCusuarioid();
    }

    public function serialize() {
        return serialize(array($this->nusuarioId,  $this->cusuarioclave, $this->cusuarioid));
    }

    public function unserialize($serialized) {
        list($this->nusuarioId, $this->cusuarioclave, $this->cusuarioid) = unserialize($serialized);
    }
}