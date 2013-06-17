<?php

namespace Dicars\DataBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * VenCargo
 *
 * @ORM\Table(name="ven_cargo")
 * @ORM\Entity
 */
class VenCargo
{
    /**
     * @var integer
     *
     * @ORM\Column(name="nCargo_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $ncargoId;

    /**
     * @var string
     *
     * @ORM\Column(name="nCargoDesc", type="string", length=100, nullable=false)
     */
    private $ncargodesc;

    /**
     * @var string
     *
     * @ORM\Column(name="cCargocoEst", type="string", length=1, nullable=false)
     */
    private $ccargocoest;



    /**
     * Get ncargoId
     *
     * @return integer 
     */
    public function getNcargoId()
    {
        return $this->ncargoId;
    }

    /**
     * Set ncargodesc
     *
     * @param string $ncargodesc
     * @return VenCargo
     */
    public function setNcargodesc($ncargodesc)
    {
        $this->ncargodesc = $ncargodesc;
    
        return $this;
    }

    /**
     * Get ncargodesc
     *
     * @return string 
     */
    public function getNcargodesc()
    {
        return $this->ncargodesc;
    }

    /**
     * Set ccargocoest
     *
     * @param string $ccargocoest
     * @return VenCargo
     */
    public function setCcargocoest($ccargocoest)
    {
        $this->ccargocoest = $ccargocoest;
    
        return $this;
    }

    /**
     * Get ccargocoest
     *
     * @return string 
     */
    public function getCcargocoest()
    {
        return $this->ccargocoest;
    }
}