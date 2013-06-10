<?php

namespace Dicars\DataBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Dicars\DataBundle\Entity\VenDetventa
 *
 * @ORM\Table(name="ven_detventa")
 * @ORM\Entity
 */
class VenDetventa
{
    /**
     * @var integer $ndetventaId
     *
     * @ORM\Column(name="nDetVenta_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $ndetventaId;

    /**
     * @var float $ndetventacant
     *
     * @ORM\Column(name="nDetVentaCant", type="decimal", nullable=false)
     */
    private $ndetventacant;

    /**
     * @var float $ndetventaprecunt
     *
     * @ORM\Column(name="nDetVentaPrecUnt", type="decimal", nullable=false)
     */
    private $ndetventaprecunt;

    /**
     * @var float $ndetventadscto
     *
     * @ORM\Column(name="nDetVentaDscto", type="decimal", nullable=false)
     */
    private $ndetventadscto;

    /**
     * @var float $ndetventatot
     *
     * @ORM\Column(name="nDetVentaTot", type="decimal", nullable=false)
     */
    private $ndetventatot;

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
     * @var VenVenta
     *
     * @ORM\ManyToOne(targetEntity="VenVenta")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="nVenta_id", referencedColumnName="nVenta_id")
     * })
     */
    private $nventa;



    /**
     * Get ndetventaId
     *
     * @return integer 
     */
    public function getNdetventaId()
    {
        return $this->ndetventaId;
    }

    /**
     * Set ndetventacant
     *
     * @param float $ndetventacant
     * @return VenDetventa
     */
    public function setNdetventacant($ndetventacant)
    {
        $this->ndetventacant = $ndetventacant;
    
        return $this;
    }

    /**
     * Get ndetventacant
     *
     * @return float 
     */
    public function getNdetventacant()
    {
        return $this->ndetventacant;
    }

    /**
     * Set ndetventaprecunt
     *
     * @param float $ndetventaprecunt
     * @return VenDetventa
     */
    public function setNdetventaprecunt($ndetventaprecunt)
    {
        $this->ndetventaprecunt = $ndetventaprecunt;
    
        return $this;
    }

    /**
     * Get ndetventaprecunt
     *
     * @return float 
     */
    public function getNdetventaprecunt()
    {
        return $this->ndetventaprecunt;
    }

    /**
     * Set ndetventadscto
     *
     * @param float $ndetventadscto
     * @return VenDetventa
     */
    public function setNdetventadscto($ndetventadscto)
    {
        $this->ndetventadscto = $ndetventadscto;
    
        return $this;
    }

    /**
     * Get ndetventadscto
     *
     * @return float 
     */
    public function getNdetventadscto()
    {
        return $this->ndetventadscto;
    }

    /**
     * Set ndetventatot
     *
     * @param float $ndetventatot
     * @return VenDetventa
     */
    public function setNdetventatot($ndetventatot)
    {
        $this->ndetventatot = $ndetventatot;
    
        return $this;
    }

    /**
     * Get ndetventatot
     *
     * @return float 
     */
    public function getNdetventatot()
    {
        return $this->ndetventatot;
    }

    /**
     * Set nproducto
     *
     * @param Dicars\DataBundle\Entity\Producto $nproducto
     * @return VenDetventa
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

    /**
     * Set nventa
     *
     * @param Dicars\DataBundle\Entity\VenVenta $nventa
     * @return VenDetventa
     */
    public function setNventa(\Dicars\DataBundle\Entity\VenVenta $nventa = null)
    {
        $this->nventa = $nventa;
    
        return $this;
    }

    /**
     * Get nventa
     *
     * @return Dicars\DataBundle\Entity\VenVenta 
     */
    public function getNventa()
    {
        return $this->nventa;
    }
}