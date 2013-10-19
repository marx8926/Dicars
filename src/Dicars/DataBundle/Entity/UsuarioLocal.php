<?php

namespace Dicars\DataBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * UsuarioLocal
 *
 * @ORM\Table(name="usuario_local")
 * @ORM\Entity
 */
class UsuarioLocal
{
    /**
     * @var integer
     *
     * @ORM\Column(name="nUsuarioLocal_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $nusuariolocalId;

    /**
     * @var string
     *
     * @ORM\Column(name="cUsuarioLocalEstado", type="string", length=1, nullable=false)
     */
    private $cusuariolocalestado;

    /**
     * @var \Local
     *
     * @ORM\ManyToOne(targetEntity="Local")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="nLocal_id", referencedColumnName="nLocal_id")
     * })
     */
    private $nlocal;

    /**
     * @var \DicarsUser
     *
     * @ORM\ManyToOne(targetEntity="DicarsUser")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="nUsuario_id", referencedColumnName="id")
     * })
     */
    private $nusuario;



    /**
     * Get nusuariolocalId
     *
     * @return integer 
     */
    public function getNusuariolocalId()
    {
        return $this->nusuariolocalId;
    }

    /**
     * Set cusuariolocalestado
     *
     * @param string $cusuariolocalestado
     * @return UsuarioLocal
     */
    public function setCusuariolocalestado($cusuariolocalestado)
    {
        $this->cusuariolocalestado = $cusuariolocalestado;
    
        return $this;
    }

    /**
     * Get cusuariolocalestado
     *
     * @return string 
     */
    public function getCusuariolocalestado()
    {
        return $this->cusuariolocalestado;
    }

    /**
     * Set nlocal
     *
     * @param \Dicars\DataBundle\Entity\Local $nlocal
     * @return UsuarioLocal
     */
    public function setNlocal(\Dicars\DataBundle\Entity\Local $nlocal = null)
    {
        $this->nlocal = $nlocal;
    
        return $this;
    }

    /**
     * Get nlocal
     *
     * @return \Dicars\DataBundle\Entity\Local 
     */
    public function getNlocal()
    {
        return $this->nlocal;
    }

    /**
     * Set nusuario
     *
     * @param \Dicars\DataBundle\Entity\DicarsUser $nusuario
     * @return UsuarioLocal
     */
    public function setNusuario(\Dicars\DataBundle\Entity\DicarsUser $nusuario = null)
    {
        $this->nusuario = $nusuario;
    
        return $this;
    }

    /**
     * Get nusuario
     *
     * @return \Dicars\DataBundle\Entity\DicarsUser 
     */
    public function getNusuario()
    {
        return $this->nusuario;
    }
}