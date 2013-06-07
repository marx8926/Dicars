<?php

namespace Dicars\DataBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Dicars\DataBundle\Entity\VenCategoria
 *
 * @ORM\Table(name="ven_categoria")
 * @ORM\Entity
 */
class VenCategoria
{
    /**
     * @var integer $ncategoriaId
     *
     * @ORM\Column(name="nCategoria_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $ncategoriaId;

    /**
     * @var string $ccategorianom
     *
     * @ORM\Column(name="cCategoriaNom", type="string", length=100, nullable=false)
     */
    private $ccategorianom;

    /**
     * @var string $ccategoriadesc
     *
     * @ORM\Column(name="cCategoriaDesc", type="string", length=150, nullable=false)
     */
    private $ccategoriadesc;

    /**
     * @var string $ccategoriaest
     *
     * @ORM\Column(name="cCategoriaEst", type="string", length=1, nullable=false)
     */
    private $ccategoriaest;



    /**
     * Get ncategoriaId
     *
     * @return integer 
     */
    public function getNcategoriaId()
    {
        return $this->ncategoriaId;
    }

    /**
     * Set ccategorianom
     *
     * @param string $ccategorianom
     * @return VenCategoria
     */
    public function setCcategorianom($ccategorianom)
    {
        $this->ccategorianom = $ccategorianom;
    
        return $this;
    }

    /**
     * Get ccategorianom
     *
     * @return string 
     */
    public function getCcategorianom()
    {
        return $this->ccategorianom;
    }

    /**
     * Set ccategoriadesc
     *
     * @param string $ccategoriadesc
     * @return VenCategoria
     */
    public function setCcategoriadesc($ccategoriadesc)
    {
        $this->ccategoriadesc = $ccategoriadesc;
    
        return $this;
    }

    /**
     * Get ccategoriadesc
     *
     * @return string 
     */
    public function getCcategoriadesc()
    {
        return $this->ccategoriadesc;
    }

    /**
     * Set ccategoriaest
     *
     * @param string $ccategoriaest
     * @return VenCategoria
     */
    public function setCcategoriaest($ccategoriaest)
    {
        $this->ccategoriaest = $ccategoriaest;
    
        return $this;
    }

    /**
     * Get ccategoriaest
     *
     * @return string 
     */
    public function getCcategoriaest()
    {
        return $this->ccategoriaest;
    }
}