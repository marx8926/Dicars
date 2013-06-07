<?php

namespace Dicars\DataBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Dicars\DataBundle\Entity\LogDetordped
 *
 * @ORM\Table(name="log_detordped")
 * @ORM\Entity
 */
class LogDetordped
{
    /**
     * @var integer $ndetordpedId
     *
     * @ORM\Column(name="nDetOrdPed_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $ndetordpedId;

    /**
     * @var float $ndetordpedcant
     *
     * @ORM\Column(name="nDetOrdPedCant", type="decimal", nullable=false)
     */
    private $ndetordpedcant;

    /**
     * @var string $ndetordpedest
     *
     * @ORM\Column(name="nDetOrdPedEst", type="string", length=1, nullable=false)
     */
    private $ndetordpedest;

    /**
     * @var LogOrdped
     *
     * @ORM\ManyToOne(targetEntity="LogOrdped")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="nOrdPed_id", referencedColumnName="nOrdPed_id")
     * })
     */
    private $nordped;

    /**
     * @var Producto
     *
     * @ORM\ManyToOne(targetEntity="Producto")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="nProducto_id", referencedColumnName="nProducto_id")
     * })
     */
    private $nproducto;



    /**
     * Get ndetordpedId
     *
     * @return integer 
     */
    public function getNdetordpedId()
    {
        return $this->ndetordpedId;
    }

    /**
     * Set ndetordpedcant
     *
     * @param float $ndetordpedcant
     * @return LogDetordped
     */
    public function setNdetordpedcant($ndetordpedcant)
    {
        $this->ndetordpedcant = $ndetordpedcant;
    
        return $this;
    }

    /**
     * Get ndetordpedcant
     *
     * @return float 
     */
    public function getNdetordpedcant()
    {
        return $this->ndetordpedcant;
    }

    /**
     * Set ndetordpedest
     *
     * @param string $ndetordpedest
     * @return LogDetordped
     */
    public function setNdetordpedest($ndetordpedest)
    {
        $this->ndetordpedest = $ndetordpedest;
    
        return $this;
    }

    /**
     * Get ndetordpedest
     *
     * @return string 
     */
    public function getNdetordpedest()
    {
        return $this->ndetordpedest;
    }

    /**
     * Set nordped
     *
     * @param Dicars\DataBundle\Entity\LogOrdped $nordped
     * @return LogDetordped
     */
    public function setNordped(\Dicars\DataBundle\Entity\LogOrdped $nordped = null)
    {
        $this->nordped = $nordped;
    
        return $this;
    }

    /**
     * Get nordped
     *
     * @return Dicars\DataBundle\Entity\LogOrdped 
     */
    public function getNordped()
    {
        return $this->nordped;
    }

    /**
     * Set nproducto
     *
     * @param Dicars\DataBundle\Entity\Producto $nproducto
     * @return LogDetordped
     */
    public function setNproducto(\Dicars\DataBundle\Entity\Producto $nproducto = null)
    {
        $this->nproducto = $nproducto;
    
        return $this;
    }

    /**
     * Get nproducto
     *
     * @return Dicars\DataBundle\Entity\Producto 
     */
    public function getNproducto()
    {
        return $this->nproducto;
    }
}