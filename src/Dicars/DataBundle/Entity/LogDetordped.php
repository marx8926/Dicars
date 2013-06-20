<?php

namespace Dicars\DataBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * LogDetordped
 *
 * @ORM\Table(name="log_detordped")
 * @ORM\Entity
 */
class LogDetordped
{
    /**
     * @var integer
     *
     * @ORM\Column(name="nDetOrdPed_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $ndetordpedId;

    /**
     * @var integer
     *
     * @ORM\Column(name="nDetOrdPedCant", type="integer", nullable=false)
     */
    private $ndetordpedcant;

    /**
     * @var string
     *
     * @ORM\Column(name="cDetOrdPedEst", type="string", length=1, nullable=false)
     */
    private $cdetordpedest;

    /**
     * @var integer
     *
     * @ORM\Column(name="nDetOrdPedCantAcept", type="integer", nullable=false)
     */
    private $ndetordpedcantacept;

    /**
     * @var \LogOrdped
     *
     * @ORM\ManyToOne(targetEntity="LogOrdped")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="nOrdPed_id", referencedColumnName="nOrdPed_id")
     * })
     */
    private $nordped;

    /**
     * @var \Producto
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
     * @param integer $ndetordpedcant
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
     * @return integer 
     */
    public function getNdetordpedcant()
    {
        return $this->ndetordpedcant;
    }

    /**
     * Set cdetordpedest
     *
     * @param string $cdetordpedest
     * @return LogDetordped
     */
    public function setCdetordpedest($cdetordpedest)
    {
        $this->cdetordpedest = $cdetordpedest;
    
        return $this;
    }

    /**
     * Get cdetordpedest
     *
     * @return string 
     */
    public function getCdetordpedest()
    {
        return $this->cdetordpedest;
    }

    /**
     * Set ndetordpedcantacept
     *
     * @param integer $ndetordpedcantacept
     * @return LogDetordped
     */
    public function setNdetordpedcantacept($ndetordpedcantacept)
    {
        $this->ndetordpedcantacept = $ndetordpedcantacept;
    
        return $this;
    }

    /**
     * Get ndetordpedcantacept
     *
     * @return integer 
     */
    public function getNdetordpedcantacept()
    {
        return $this->ndetordpedcantacept;
    }

    /**
     * Set nordped
     *
     * @param \Dicars\DataBundle\Entity\LogOrdped $nordped
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
     * @return \Dicars\DataBundle\Entity\LogOrdped 
     */
    public function getNordped()
    {
        return $this->nordped;
    }

    /**
     * Set nproducto
     *
     * @param \Dicars\DataBundle\Entity\Producto $nproducto
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
     * @return \Dicars\DataBundle\Entity\Producto 
     */
    public function getNproducto()
    {
        return $this->nproducto;
    }
}