<?php

namespace Dicars\DataBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Dicars\DataBundle\Entity\LogDetingprod
 *
 * @ORM\Table(name="log_detingprod")
 * @ORM\Entity
 */
class LogDetingprod
{
    /**
     * @var integer $ndetingprodId
     *
     * @ORM\Column(name="nDetIngProd_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $ndetingprodId;

    /**
     * @var integer $ndetingprodcant
     *
     * @ORM\Column(name="nDetIngProdCant", type="integer", nullable=false)
     */
    private $ndetingprodcant;

    /**
     * @var float $ndetingprodprecunt
     *
     * @ORM\Column(name="nDetIngProdPrecUnt", type="decimal", nullable=false)
     */
    private $ndetingprodprecunt;

    /**
     * @var float $ndetingprodtot
     *
     * @ORM\Column(name="nDetIngProdTot", type="decimal", nullable=false)
     */
    private $ndetingprodtot;

    /**
     * @var LogIngprod
     *
     * @ORM\ManyToOne(targetEntity="LogIngprod")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="nIngProd_id", referencedColumnName="nIngProd_id")
     * })
     */
    private $ningprod;

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
     * Get ndetingprodId
     *
     * @return integer 
     */
    public function getNdetingprodId()
    {
        return $this->ndetingprodId;
    }

    /**
     * Set ndetingprodcant
     *
     * @param integer $ndetingprodcant
     * @return LogDetingprod
     */
    public function setNdetingprodcant($ndetingprodcant)
    {
        $this->ndetingprodcant = $ndetingprodcant;
    
        return $this;
    }

    /**
     * Get ndetingprodcant
     *
     * @return integer 
     */
    public function getNdetingprodcant()
    {
        return $this->ndetingprodcant;
    }

    /**
     * Set ndetingprodprecunt
     *
     * @param float $ndetingprodprecunt
     * @return LogDetingprod
     */
    public function setNdetingprodprecunt($ndetingprodprecunt)
    {
        $this->ndetingprodprecunt = $ndetingprodprecunt;
    
        return $this;
    }

    /**
     * Get ndetingprodprecunt
     *
     * @return float 
     */
    public function getNdetingprodprecunt()
    {
        return $this->ndetingprodprecunt;
    }

    /**
     * Set ndetingprodtot
     *
     * @param float $ndetingprodtot
     * @return LogDetingprod
     */
    public function setNdetingprodtot($ndetingprodtot)
    {
        $this->ndetingprodtot = $ndetingprodtot;
    
        return $this;
    }

    /**
     * Get ndetingprodtot
     *
     * @return float 
     */
    public function getNdetingprodtot()
    {
        return $this->ndetingprodtot;
    }

    /**
     * Set ningprod
     *
     * @param Dicars\DataBundle\Entity\LogIngprod $ningprod
     * @return LogDetingprod
     */
    public function setNingprod(\Dicars\DataBundle\Entity\LogIngprod $ningprod = null)
    {
        $this->ningprod = $ningprod;
    
        return $this;
    }

    /**
     * Get ningprod
     *
     * @return Dicars\DataBundle\Entity\LogIngprod 
     */
    public function getNingprod()
    {
        return $this->ningprod;
    }

    /**
     * Set nproducto
     *
     * @param Dicars\DataBundle\Entity\Producto $nproducto
     * @return LogDetingprod
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