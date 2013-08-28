<?php

namespace Dicars\DataBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * VenDetventa
 *
 * @ORM\Table(name="ven_detventa")
 * @ORM\Entity
 */
class VenDetventa
{
    /**
     * @var integer
     *
     * @ORM\Column(name="nDetVenta_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $ndetventaId;

    /**
     * @var string
     *
     * @ORM\Column(name="nDetVentaCant", type="decimal", nullable=false)
     */
    private $ndetventacant;

    /**
     * @var string
     *
     * @ORM\Column(name="nDetVentaPrecUnt", type="decimal", nullable=false)
     */
    private $ndetventaprecunt;

    /**
     * @var string
     *
     * @ORM\Column(name="nDetVentaDscto", type="decimal", nullable=false)
     */
    private $ndetventadscto;

    /**
     * @var string
     *
     * @ORM\Column(name="nDetVentaTot", type="decimal", nullable=false)
     */
    private $ndetventatot;

    /**
     * @var string
     *
     * @ORM\Column(name="cDetVentaDesc", type="string", length=45, nullable=false)
     */
    private $cdetventadesc;

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
     * @var \VenVenta
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
     * @param string $ndetventacant
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
     * @return string 
     */
    public function getNdetventacant()
    {
        return $this->ndetventacant;
    }

    /**
     * Set ndetventaprecunt
     *
     * @param string $ndetventaprecunt
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
     * @return string 
     */
    public function getNdetventaprecunt()
    {
        return $this->ndetventaprecunt;
    }

    /**
     * Set ndetventadscto
     *
     * @param string $ndetventadscto
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
     * @return string 
     */
    public function getNdetventadscto()
    {
        return $this->ndetventadscto;
    }

    /**
     * Set ndetventatot
     *
     * @param string $ndetventatot
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
     * @return string 
     */
    public function getNdetventatot()
    {
        return $this->ndetventatot;
    }

    /**
     * Set cdetventadesc
     *
     * @param string $cdetventadesc
     * @return VenDetventa
     */
    public function setCdetventadesc($cdetventadesc)
    {
        $this->cdetventadesc = $cdetventadesc;
    
        return $this;
    }

    /**
     * Get cdetventadesc
     *
     * @return string 
     */
    public function getCdetventadesc()
    {
        return $this->cdetventadesc;
    }

    /**
     * Set nproducto
     *
     * @param \Dicars\DataBundle\Entity\Producto $nproducto
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
     * @return \Dicars\DataBundle\Entity\Producto 
     */
    public function getNproducto()
    {
        return $this->nproducto;
    }

    /**
     * Set nventa
     *
     * @param \Dicars\DataBundle\Entity\VenVenta $nventa
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
     * @return \Dicars\DataBundle\Entity\VenVenta 
     */
    public function getNventa()
    {
        return $this->nventa;
    }
}