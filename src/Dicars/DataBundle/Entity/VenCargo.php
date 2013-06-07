<?php

namespace Dicars\DataBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Dicars\DataBundle\Entity\VenCargo
 *
 * @ORM\Table(name="ven_cargo")
 * @ORM\Entity
 */
class VenCargo
{
    /**
     * @var integer $ncargoId
     *
     * @ORM\Column(name="nCargo_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $ncargoId;

    /**
     * @var string $ncargodesc
     *
     * @ORM\Column(name="nCargoDesc", type="string", length=100, nullable=false)
     */
    private $ncargodesc;



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
}