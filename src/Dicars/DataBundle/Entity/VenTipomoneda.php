<?php

namespace Dicars\DataBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * VenTipomoneda
 *
 * @ORM\Table(name="ven_tipomoneda")
 * @ORM\Entity
 */
class VenTipomoneda
{
    /**
     * @var integer
     *
     * @ORM\Column(name="nTipoMoneda", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $ntipomoneda;

    /**
     * @var string
     *
     * @ORM\Column(name="cTipoMonedaDesc", type="string", length=30, nullable=false)
     */
    private $ctipomonedadesc;

    /**
     * @var string
     *
     * @ORM\Column(name="nTipoMonedaMont", type="decimal", nullable=false)
     */
    private $ntipomonedamont;

    /**
     * @var integer
     *
     * @ORM\Column(name="nTipoMonedaEst", type="integer", nullable=false)
     */
    private $ntipomonedaest;



    /**
     * Get ntipomoneda
     *
     * @return integer 
     */
    public function getNtipomoneda()
    {
        return $this->ntipomoneda;
    }

    /**
     * Set ctipomonedadesc
     *
     * @param string $ctipomonedadesc
     * @return VenTipomoneda
     */
    public function setCtipomonedadesc($ctipomonedadesc)
    {
        $this->ctipomonedadesc = $ctipomonedadesc;
    
        return $this;
    }

    /**
     * Get ctipomonedadesc
     *
     * @return string 
     */
    public function getCtipomonedadesc()
    {
        return $this->ctipomonedadesc;
    }

    /**
     * Set ntipomonedamont
     *
     * @param string $ntipomonedamont
     * @return VenTipomoneda
     */
    public function setNtipomonedamont($ntipomonedamont)
    {
        $this->ntipomonedamont = $ntipomonedamont;
    
        return $this;
    }

    /**
     * Get ntipomonedamont
     *
     * @return string 
     */
    public function getNtipomonedamont()
    {
        return $this->ntipomonedamont;
    }

    /**
     * Set ntipomonedaest
     *
     * @param integer $ntipomonedaest
     * @return VenTipomoneda
     */
    public function setNtipomonedaest($ntipomonedaest)
    {
        $this->ntipomonedaest = $ntipomonedaest;
    
        return $this;
    }

    /**
     * Get ntipomonedaest
     *
     * @return integer 
     */
    public function getNtipomonedaest()
    {
        return $this->ntipomonedaest;
    }
}