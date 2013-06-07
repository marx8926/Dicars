<?php

namespace Dicars\DataBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Dicars\DataBundle\Entity\VenZona
 *
 * @ORM\Table(name="ven_zona")
 * @ORM\Entity
 */
class VenZona
{
    /**
     * @var integer $nzonaId
     *
     * @ORM\Column(name="nZona_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $nzonaId;

    /**
     * @var string $czonadesc
     *
     * @ORM\Column(name="cZonaDesc", type="string", length=100, nullable=false)
     */
    private $czonadesc;

    /**
     * @var integer $nzonaest
     *
     * @ORM\Column(name="nZonaEst", type="integer", nullable=false)
     */
    private $nzonaest;

    /**
     * @var Ubigeo
     *
     * @ORM\ManyToOne(targetEntity="Ubigeo")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="nUbigeo_id", referencedColumnName="nUbigeo_id")
     * })
     */
    private $nubigeo;



    /**
     * Get nzonaId
     *
     * @return integer 
     */
    public function getNzonaId()
    {
        return $this->nzonaId;
    }

    /**
     * Set czonadesc
     *
     * @param string $czonadesc
     * @return VenZona
     */
    public function setCzonadesc($czonadesc)
    {
        $this->czonadesc = $czonadesc;
    
        return $this;
    }

    /**
     * Get czonadesc
     *
     * @return string 
     */
    public function getCzonadesc()
    {
        return $this->czonadesc;
    }

    /**
     * Set nzonaest
     *
     * @param integer $nzonaest
     * @return VenZona
     */
    public function setNzonaest($nzonaest)
    {
        $this->nzonaest = $nzonaest;
    
        return $this;
    }

    /**
     * Get nzonaest
     *
     * @return integer 
     */
    public function getNzonaest()
    {
        return $this->nzonaest;
    }

    /**
     * Set nubigeo
     *
     * @param Dicars\DataBundle\Entity\Ubigeo $nubigeo
     * @return VenZona
     */
    public function setNubigeo(\Dicars\DataBundle\Entity\Ubigeo $nubigeo = null)
    {
        $this->nubigeo = $nubigeo;
    
        return $this;
    }

    /**
     * Get nubigeo
     *
     * @return Dicars\DataBundle\Entity\Ubigeo 
     */
    public function getNubigeo()
    {
        return $this->nubigeo;
    }
}