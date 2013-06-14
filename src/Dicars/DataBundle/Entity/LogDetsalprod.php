<?php

namespace Dicars\DataBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * LogDetsalprod
 *
 * @ORM\Table(name="log_detsalprod")
 * @ORM\Entity
 */
class LogDetsalprod
{
    /**
     * @var integer
     *
     * @ORM\Column(name="nDetSalProd_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $ndetsalprodId;

    /**
     * @var integer
     *
     * @ORM\Column(name="DetSalProdCant", type="integer", nullable=false)
     */
    private $detsalprodcant;

    /**
     * @var string
     *
     * @ORM\Column(name="cDetSalProdEst", type="string", length=1, nullable=false)
     */
    private $cdetsalprodest;

    /**
     * @var \LogSalprod
     *
     * @ORM\ManyToOne(targetEntity="LogSalprod")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="nSalProd_id", referencedColumnName="nSalProd_id")
     * })
     */
    private $nsalprod;

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
     * Get ndetsalprodId
     *
     * @return integer 
     */
    public function getNdetsalprodId()
    {
        return $this->ndetsalprodId;
    }

    /**
     * Set detsalprodcant
     *
     * @param integer $detsalprodcant
     * @return LogDetsalprod
     */
    public function setDetsalprodcant($detsalprodcant)
    {
        $this->detsalprodcant = $detsalprodcant;
    
        return $this;
    }

    /**
     * Get detsalprodcant
     *
     * @return integer 
     */
    public function getDetsalprodcant()
    {
        return $this->detsalprodcant;
    }

    /**
     * Set cdetsalprodest
     *
     * @param string $cdetsalprodest
     * @return LogDetsalprod
     */
    public function setCdetsalprodest($cdetsalprodest)
    {
        $this->cdetsalprodest = $cdetsalprodest;
    
        return $this;
    }

    /**
     * Get cdetsalprodest
     *
     * @return string 
     */
    public function getCdetsalprodest()
    {
        return $this->cdetsalprodest;
    }

    /**
     * Set nsalprod
     *
     * @param \Dicars\DataBundle\Entity\LogSalprod $nsalprod
     * @return LogDetsalprod
     */
    public function setNsalprod(\Dicars\DataBundle\Entity\LogSalprod $nsalprod = null)
    {
        $this->nsalprod = $nsalprod;
    
        return $this;
    }

    /**
     * Get nsalprod
     *
     * @return \Dicars\DataBundle\Entity\LogSalprod 
     */
    public function getNsalprod()
    {
        return $this->nsalprod;
    }

    /**
     * Set nproducto
     *
     * @param \Dicars\DataBundle\Entity\Producto $nproducto
     * @return LogDetsalprod
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