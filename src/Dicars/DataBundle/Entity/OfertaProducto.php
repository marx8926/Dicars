<?php

namespace Dicars\DataBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * OfertaProducto
 *
 * @ORM\Table(name="oferta_producto")
 * @ORM\Entity
 */
class OfertaProducto
{
    /**
     * @var integer
     *
     * @ORM\Column(name="nOfertaProducto_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $nofertaproductoId;

    /**
     * @var string
     *
     * @ORM\Column(name="nOfertaProductoPorc", type="decimal", nullable=true)
     */
    private $nofertaproductoporc;

    /**
     * @var string
     *
     * @ORM\Column(name="cOfertaProductoEst", type="string", length=1, nullable=true)
     */
    private $cofertaproductoest;

    /**
     * @var \Oferta
     *
     * @ORM\ManyToOne(targetEntity="Oferta")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="nOferta_id", referencedColumnName="nOferta_id")
     * })
     */
    private $noferta;

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
     * Get nofertaproductoId
     *
     * @return integer 
     */
    public function getNofertaproductoId()
    {
        return $this->nofertaproductoId;
    }

    /**
     * Set nofertaproductoporc
     *
     * @param string $nofertaproductoporc
     * @return OfertaProducto
     */
    public function setNofertaproductoporc($nofertaproductoporc)
    {
        $this->nofertaproductoporc = $nofertaproductoporc;
    
        return $this;
    }

    /**
     * Get nofertaproductoporc
     *
     * @return string 
     */
    public function getNofertaproductoporc()
    {
        return $this->nofertaproductoporc;
    }

    /**
     * Set cofertaproductoest
     *
     * @param string $cofertaproductoest
     * @return OfertaProducto
     */
    public function setCofertaproductoest($cofertaproductoest)
    {
        $this->cofertaproductoest = $cofertaproductoest;
    
        return $this;
    }

    /**
     * Get cofertaproductoest
     *
     * @return string 
     */
    public function getCofertaproductoest()
    {
        return $this->cofertaproductoest;
    }

    /**
     * Set noferta
     *
     * @param \Dicars\DataBundle\Entity\Oferta $noferta
     * @return OfertaProducto
     */
    public function setNoferta(\Dicars\DataBundle\Entity\Oferta $noferta = null)
    {
        $this->noferta = $noferta;
    
        return $this;
    }

    /**
     * Get noferta
     *
     * @return \Dicars\DataBundle\Entity\Oferta 
     */
    public function getNoferta()
    {
        return $this->noferta;
    }

    /**
     * Set nproducto
     *
     * @param \Dicars\DataBundle\Entity\Producto $nproducto
     * @return OfertaProducto
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