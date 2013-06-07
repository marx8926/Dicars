<?php

namespace Dicars\DataBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Dicars\DataBundle\Entity\VenMarca
 *
 * @ORM\Table(name="ven_marca")
 * @ORM\Entity
 */
class VenMarca
{
    /**
     * @var integer $nmarcaId
     *
     * @ORM\Column(name="nMarca_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $nmarcaId;

    /**
     * @var string $cmarcadesc
     *
     * @ORM\Column(name="cMarcaDesc", type="string", length=100, nullable=false)
     */
    private $cmarcadesc;

    /**
     * @var string $cmarcaest
     *
     * @ORM\Column(name="cMarcaEst", type="string", length=1, nullable=false)
     */
    private $cmarcaest;



    /**
     * Get nmarcaId
     *
     * @return integer 
     */
    public function getNmarcaId()
    {
        return $this->nmarcaId;
    }

    /**
     * Set cmarcadesc
     *
     * @param string $cmarcadesc
     * @return VenMarca
     */
    public function setCmarcadesc($cmarcadesc)
    {
        $this->cmarcadesc = $cmarcadesc;
    
        return $this;
    }

    /**
     * Get cmarcadesc
     *
     * @return string 
     */
    public function getCmarcadesc()
    {
        return $this->cmarcadesc;
    }

    /**
     * Set cmarcaest
     *
     * @param string $cmarcaest
     * @return VenMarca
     */
    public function setCmarcaest($cmarcaest)
    {
        $this->cmarcaest = $cmarcaest;
    
        return $this;
    }

    /**
     * Get cmarcaest
     *
     * @return string 
     */
    public function getCmarcaest()
    {
        return $this->cmarcaest;
    }
}