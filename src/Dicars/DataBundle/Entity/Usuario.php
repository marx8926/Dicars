<?php

namespace Dicars\DataBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Usuario
 *
 * @ORM\Table(name="usuario")
 * @ORM\Entity
 */
class Usuario
{
    /**
     * @var integer
     *
     * @ORM\Column(name="nUsuario_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $nusuarioId;

    /**
     * @var string
     *
     * @ORM\Column(name="cUsuarioID", type="string", length=20, nullable=false)
     */
    private $cusuarioid;

    /**
     * @var string
     *
     * @ORM\Column(name="cUsuarioClave", type="text", nullable=false)
     */
    private $cusuarioclave;

    /**
     * @var string
     *
     * @ORM\Column(name="cUsuarioEst", type="string", length=1, nullable=false)
     */
    private $cusuarioest;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="cUsuarioFecReg", type="datetime", nullable=false)
     */
    private $cusuariofecreg;

    /**
     * @var \VenPersonal
     *
     * @ORM\ManyToOne(targetEntity="VenPersonal")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="nPersonal_id", referencedColumnName="nPersonal_id")
     * })
     */
    private $npersonal;



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
        $this->cusuarioclave = $cusuarioclave;
    
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
}