<?php

namespace Dicars\DataBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Constante
 *
 * @ORM\Table(name="constante")
 * @ORM\Entity
 */
class Constante
{
    /**
     * @var integer
     *
     * @ORM\Column(name="nConstante_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $nconstanteId;

    /**
     * @var integer
     *
     * @ORM\Column(name="nConstanteClase", type="integer", nullable=false)
     */
    private $nconstanteclase;

    /**
     * @var string
     *
     * @ORM\Column(name="cConstanteDesc", type="string", length=100, nullable=false)
     */
    private $cconstantedesc;

    /**
     * @var integer
     *
     * @ORM\Column(name="cConstanteValor", type="integer", nullable=false)
     */
    private $cconstantevalor;



    /**
     * Get nconstanteId
     *
     * @return integer 
     */
    public function getNconstanteId()
    {
        return $this->nconstanteId;
    }

    /**
     * Set nconstanteclase
     *
     * @param integer $nconstanteclase
     * @return Constante
     */
    public function setNconstanteclase($nconstanteclase)
    {
        $this->nconstanteclase = $nconstanteclase;
    
        return $this;
    }

    /**
     * Get nconstanteclase
     *
     * @return integer 
     */
    public function getNconstanteclase()
    {
        return $this->nconstanteclase;
    }

    /**
     * Set cconstantedesc
     *
     * @param string $cconstantedesc
     * @return Constante
     */
    public function setCconstantedesc($cconstantedesc)
    {
        $this->cconstantedesc = $cconstantedesc;
    
        return $this;
    }

    /**
     * Get cconstantedesc
     *
     * @return string 
     */
    public function getCconstantedesc()
    {
        return $this->cconstantedesc;
    }

    /**
     * Set cconstantevalor
     *
     * @param integer $cconstantevalor
     * @return Constante
     */
    public function setCconstantevalor($cconstantevalor)
    {
        $this->cconstantevalor = $cconstantevalor;
    
        return $this;
    }

    /**
     * Get cconstantevalor
     *
     * @return integer 
     */
    public function getCconstantevalor()
    {
        return $this->cconstantevalor;
    }
}