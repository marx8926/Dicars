<?php

namespace Dicars\DataBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Dicars\DataBundle\Entity\VenTipomoneda
 *
 * @ORM\Table(name="ven_tipomoneda")
 * @ORM\Entity
 */
class VenTipomoneda
{
    /**
     * @var integer $ntipomoneda
     *
     * @ORM\Column(name="nTipoMoneda", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $ntipomoneda;

    /**
     * @var string $ctipomonedadesc
     *
     * @ORM\Column(name="cTipoMonedaDesc", type="string", length=30, nullable=false)
     */
    private $ctipomonedadesc;

    /**
     * @var float $ntipomonedacambio
     *
     * @ORM\Column(name="nTipoMonedaCambio", type="decimal", nullable=false)
     */
    private $ntipomonedacambio;

    /**
     * @var integer $ntipomonedaactivo
     *
     * @ORM\Column(name="nTipoMonedaActivo", type="integer", nullable=false)
     */
    private $ntipomonedaactivo;



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
     * Set ntipomonedacambio
     *
     * @param float $ntipomonedacambio
     * @return VenTipomoneda
     */
    public function setNtipomonedacambio($ntipomonedacambio)
    {
        $this->ntipomonedacambio = $ntipomonedacambio;
    
        return $this;
    }

    /**
     * Get ntipomonedacambio
     *
     * @return float 
     */
    public function getNtipomonedacambio()
    {
        return $this->ntipomonedacambio;
    }

    /**
     * Set ntipomonedaactivo
     *
     * @param integer $ntipomonedaactivo
     * @return VenTipomoneda
     */
    public function setNtipomonedaactivo($ntipomonedaactivo)
    {
        $this->ntipomonedaactivo = $ntipomonedaactivo;
    
        return $this;
    }

    /**
     * Get ntipomonedaactivo
     *
     * @return integer 
     */
    public function getNtipomonedaactivo()
    {
        return $this->ntipomonedaactivo;
    }
}