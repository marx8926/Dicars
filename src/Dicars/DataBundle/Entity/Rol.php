<?php

namespace Dicars\DataBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\Role\RoleInterface;

/**
 * Rol
 *
 * @ORM\Table(name="rol")
 * @ORM\Entity
 */
class Rol implements RoleInterface
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=45, nullable=true)
     */
    protected $nombre;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Usuario", mappedBy="idRol")
     */
    protected $idUsuario;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idUsuario = new \Doctrine\Common\Collections\ArrayCollection();
    }
    

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     * @return Rol
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    
        return $this;
    }

    /**
     * Get nombre
     *
     * @return string 
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Add idUsuario
     *
     * @param \Dicars\DataBundle\Entity\Usuario $idUsuario
     * @return Rol
     */
    public function addIdUsuario(\Dicars\DataBundle\Entity\Usuario $idUsuario)
    {
        $this->idUsuario[] = $idUsuario;
    
        return $this;
    }

    /**
     * Remove idUsuario
     *
     * @param \Dicars\DataBundle\Entity\Usuario $idUsuario
     */
    public function removeIdUsuario(\Dicars\DataBundle\Entity\Usuario $idUsuario)
    {
        $this->idUsuario->removeElement($idUsuario);
    }

    /**
     * Get idUsuario
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getIdUsuario()
    {
        return $this->idUsuario;
    }

    public function getRole() {
        return $this->nombre;
    }
    public function __toString()
    {
    	return $this->nombre;
    }
}