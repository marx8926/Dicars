<?php

namespace Dicars\DataBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * LogDetcompra
 *
 * @ORM\Table(name="log_detcompra")
 * @ORM\Entity
 */
class LogDetcompra
{
    /**
     * @var integer
     *
     * @ORM\Column(name="nDetCompra_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $ndetcompraId;

    /**
     * @var integer
     *
     * @ORM\Column(name="nDetCompraCant", type="integer", nullable=false)
     */
    private $ndetcompracant;

    /**
     * @var string
     *
     * @ORM\Column(name="nDetCompraPrecUnt", type="decimal", nullable=false)
     */
    private $ndetcompraprecunt;

    /**
     * @var string
     *
     * @ORM\Column(name="nDetCompraImporte", type="decimal", nullable=false)
     */
    private $ndetcompraimporte;

    /**
     * @var integer
     *
     * @ORM\Column(name="nDetOrdOrdPed", type="integer", nullable=false)
     */
    private $ndetordordped;

    /**
     * @var string
     *
     * @ORM\Column(name="cDetCompraEst", type="string", length=1, nullable=false)
     */
    private $cdetcompraest;

    /**
     * @var \LogOrdcom
     *
     * @ORM\ManyToOne(targetEntity="LogOrdcom")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="nOrdenCompra_id", referencedColumnName="nOrdenCom_id")
     * })
     */
    private $nordencompra;

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
     * Get ndetcompraId
     *
     * @return integer 
     */
    public function getNdetcompraId()
    {
        return $this->ndetcompraId;
    }

    /**
     * Set ndetcompracant
     *
     * @param integer $ndetcompracant
     * @return LogDetcompra
     */
    public function setNdetcompracant($ndetcompracant)
    {
        $this->ndetcompracant = $ndetcompracant;
    
        return $this;
    }

    /**
     * Get ndetcompracant
     *
     * @return integer 
     */
    public function getNdetcompracant()
    {
        return $this->ndetcompracant;
    }

    /**
     * Set ndetcompraprecunt
     *
     * @param string $ndetcompraprecunt
     * @return LogDetcompra
     */
    public function setNdetcompraprecunt($ndetcompraprecunt)
    {
        $this->ndetcompraprecunt = $ndetcompraprecunt;
    
        return $this;
    }

    /**
     * Get ndetcompraprecunt
     *
     * @return string 
     */
    public function getNdetcompraprecunt()
    {
        return $this->ndetcompraprecunt;
    }

    /**
     * Set ndetcompraimporte
     *
     * @param string $ndetcompraimporte
     * @return LogDetcompra
     */
    public function setNdetcompraimporte($ndetcompraimporte)
    {
        $this->ndetcompraimporte = $ndetcompraimporte;
    
        return $this;
    }

    /**
     * Get ndetcompraimporte
     *
     * @return string 
     */
    public function getNdetcompraimporte()
    {
        return $this->ndetcompraimporte;
    }

    /**
     * Set ndetordordped
     *
     * @param integer $ndetordordped
     * @return LogDetcompra
     */
    public function setNdetordordped($ndetordordped)
    {
        $this->ndetordordped = $ndetordordped;
    
        return $this;
    }

    /**
     * Get ndetordordped
     *
     * @return integer 
     */
    public function getNdetordordped()
    {
        return $this->ndetordordped;
    }

    /**
     * Set cdetcompraest
     *
     * @param string $cdetcompraest
     * @return LogDetcompra
     */
    public function setCdetcompraest($cdetcompraest)
    {
        $this->cdetcompraest = $cdetcompraest;
    
        return $this;
    }

    /**
     * Get cdetcompraest
     *
     * @return string 
     */
    public function getCdetcompraest()
    {
        return $this->cdetcompraest;
    }

    /**
     * Set nordencompra
     *
     * @param \Dicars\DataBundle\Entity\LogOrdcom $nordencompra
     * @return LogDetcompra
     */
    public function setNordencompra(\Dicars\DataBundle\Entity\LogOrdcom $nordencompra = null)
    {
        $this->nordencompra = $nordencompra;
    
        return $this;
    }

    /**
     * Get nordencompra
     *
     * @return \Dicars\DataBundle\Entity\LogOrdcom 
     */
    public function getNordencompra()
    {
        return $this->nordencompra;
    }

    /**
     * Set nproducto
     *
     * @param \Dicars\DataBundle\Entity\Producto $nproducto
     * @return LogDetcompra
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