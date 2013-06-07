<?php

namespace Dicars\DataBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Dicars\DataBundle\Entity\Producto
 *
 * @ORM\Table(name="producto")
 * @ORM\Entity
 */
class Producto
{
    /**
     * @var integer $nproductoId
     *
     * @ORM\Column(name="nProducto_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $nproductoId;

    /**
     * @var string $cproductoserie
     *
     * @ORM\Column(name="cProductoSerie", type="string", length=15, nullable=false)
     */
    private $cproductoserie;

    /**
     * @var string $cproductotalla
     *
     * @ORM\Column(name="cProductoTalla", type="string", length=15, nullable=false)
     */
    private $cproductotalla;

    /**
     * @var integer $nproductotipo
     *
     * @ORM\Column(name="nProductoTipo", type="integer", nullable=false)
     */
    private $nproductotipo;

    /**
     * @var string $cproductodesc
     *
     * @ORM\Column(name="cProductoDesc", type="text", nullable=false)
     */
    private $cproductodesc;

    /**
     * @var float $nproductopcontado
     *
     * @ORM\Column(name="nProductoPContado", type="decimal", nullable=false)
     */
    private $nproductopcontado;

    /**
     * @var float $nproductopcredito
     *
     * @ORM\Column(name="nProductoPCredito", type="decimal", nullable=false)
     */
    private $nproductopcredito;

    /**
     * @var float $nproductopcosto
     *
     * @ORM\Column(name="nProductoPCosto", type="decimal", nullable=false)
     */
    private $nproductopcosto;

    /**
     * @var string $cproductocodbarra
     *
     * @ORM\Column(name="cProductoCodBarra", type="text", nullable=false)
     */
    private $cproductocodbarra;

    /**
     * @var string $cproductoarchivo
     *
     * @ORM\Column(name="cProductoArchivo", type="text", nullable=false)
     */
    private $cproductoarchivo;

    /**
     * @var integer $nproductostockmin
     *
     * @ORM\Column(name="nProductoStockMin", type="integer", nullable=false)
     */
    private $nproductostockmin;

    /**
     * @var integer $nproductostockmax
     *
     * @ORM\Column(name="nProductoStockMax", type="integer", nullable=false)
     */
    private $nproductostockmax;

    /**
     * @var integer $nproductosotck
     *
     * @ORM\Column(name="nProductoSotck", type="integer", nullable=false)
     */
    private $nproductosotck;

    /**
     * @var string $cproductoest
     *
     * @ORM\Column(name="cProductoEst", type="string", length=1, nullable=false)
     */
    private $cproductoest;

    /**
     * @var float $nproductoporcuti
     *
     * @ORM\Column(name="nProductoPorcUti", type="decimal", nullable=false)
     */
    private $nproductoporcuti;

    /**
     * @var float $nproductoutibruta
     *
     * @ORM\Column(name="nProductoUtiBruta", type="decimal", nullable=false)
     */
    private $nproductoutibruta;

    /**
     * @var VenMarca
     *
     * @ORM\ManyToOne(targetEntity="VenMarca")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="nProductoMarca", referencedColumnName="nMarca_id")
     * })
     */
    private $nproductomarca;

    /**
     * @var VenCategoria
     *
     * @ORM\ManyToOne(targetEntity="VenCategoria")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="nCategoria_id", referencedColumnName="nCategoria_id")
     * })
     */
    private $ncategoria;



    /**
     * Get nproductoId
     *
     * @return integer 
     */
    public function getNproductoId()
    {
        return $this->nproductoId;
    }

    /**
     * Set cproductoserie
     *
     * @param string $cproductoserie
     * @return Producto
     */
    public function setCproductoserie($cproductoserie)
    {
        $this->cproductoserie = $cproductoserie;
    
        return $this;
    }

    /**
     * Get cproductoserie
     *
     * @return string 
     */
    public function getCproductoserie()
    {
        return $this->cproductoserie;
    }

    /**
     * Set cproductotalla
     *
     * @param string $cproductotalla
     * @return Producto
     */
    public function setCproductotalla($cproductotalla)
    {
        $this->cproductotalla = $cproductotalla;
    
        return $this;
    }

    /**
     * Get cproductotalla
     *
     * @return string 
     */
    public function getCproductotalla()
    {
        return $this->cproductotalla;
    }

    /**
     * Set nproductotipo
     *
     * @param integer $nproductotipo
     * @return Producto
     */
    public function setNproductotipo($nproductotipo)
    {
        $this->nproductotipo = $nproductotipo;
    
        return $this;
    }

    /**
     * Get nproductotipo
     *
     * @return integer 
     */
    public function getNproductotipo()
    {
        return $this->nproductotipo;
    }

    /**
     * Set cproductodesc
     *
     * @param string $cproductodesc
     * @return Producto
     */
    public function setCproductodesc($cproductodesc)
    {
        $this->cproductodesc = $cproductodesc;
    
        return $this;
    }

    /**
     * Get cproductodesc
     *
     * @return string 
     */
    public function getCproductodesc()
    {
        return $this->cproductodesc;
    }

    /**
     * Set nproductopcontado
     *
     * @param float $nproductopcontado
     * @return Producto
     */
    public function setNproductopcontado($nproductopcontado)
    {
        $this->nproductopcontado = $nproductopcontado;
    
        return $this;
    }

    /**
     * Get nproductopcontado
     *
     * @return float 
     */
    public function getNproductopcontado()
    {
        return $this->nproductopcontado;
    }

    /**
     * Set nproductopcredito
     *
     * @param float $nproductopcredito
     * @return Producto
     */
    public function setNproductopcredito($nproductopcredito)
    {
        $this->nproductopcredito = $nproductopcredito;
    
        return $this;
    }

    /**
     * Get nproductopcredito
     *
     * @return float 
     */
    public function getNproductopcredito()
    {
        return $this->nproductopcredito;
    }

    /**
     * Set nproductopcosto
     *
     * @param float $nproductopcosto
     * @return Producto
     */
    public function setNproductopcosto($nproductopcosto)
    {
        $this->nproductopcosto = $nproductopcosto;
    
        return $this;
    }

    /**
     * Get nproductopcosto
     *
     * @return float 
     */
    public function getNproductopcosto()
    {
        return $this->nproductopcosto;
    }

    /**
     * Set cproductocodbarra
     *
     * @param string $cproductocodbarra
     * @return Producto
     */
    public function setCproductocodbarra($cproductocodbarra)
    {
        $this->cproductocodbarra = $cproductocodbarra;
    
        return $this;
    }

    /**
     * Get cproductocodbarra
     *
     * @return string 
     */
    public function getCproductocodbarra()
    {
        return $this->cproductocodbarra;
    }

    /**
     * Set cproductoarchivo
     *
     * @param string $cproductoarchivo
     * @return Producto
     */
    public function setCproductoarchivo($cproductoarchivo)
    {
        $this->cproductoarchivo = $cproductoarchivo;
    
        return $this;
    }

    /**
     * Get cproductoarchivo
     *
     * @return string 
     */
    public function getCproductoarchivo()
    {
        return $this->cproductoarchivo;
    }

    /**
     * Set nproductostockmin
     *
     * @param integer $nproductostockmin
     * @return Producto
     */
    public function setNproductostockmin($nproductostockmin)
    {
        $this->nproductostockmin = $nproductostockmin;
    
        return $this;
    }

    /**
     * Get nproductostockmin
     *
     * @return integer 
     */
    public function getNproductostockmin()
    {
        return $this->nproductostockmin;
    }

    /**
     * Set nproductostockmax
     *
     * @param integer $nproductostockmax
     * @return Producto
     */
    public function setNproductostockmax($nproductostockmax)
    {
        $this->nproductostockmax = $nproductostockmax;
    
        return $this;
    }

    /**
     * Get nproductostockmax
     *
     * @return integer 
     */
    public function getNproductostockmax()
    {
        return $this->nproductostockmax;
    }

    /**
     * Set nproductosotck
     *
     * @param integer $nproductosotck
     * @return Producto
     */
    public function setNproductosotck($nproductosotck)
    {
        $this->nproductosotck = $nproductosotck;
    
        return $this;
    }

    /**
     * Get nproductosotck
     *
     * @return integer 
     */
    public function getNproductosotck()
    {
        return $this->nproductosotck;
    }

    /**
     * Set cproductoest
     *
     * @param string $cproductoest
     * @return Producto
     */
    public function setCproductoest($cproductoest)
    {
        $this->cproductoest = $cproductoest;
    
        return $this;
    }

    /**
     * Get cproductoest
     *
     * @return string 
     */
    public function getCproductoest()
    {
        return $this->cproductoest;
    }

    /**
     * Set nproductoporcuti
     *
     * @param float $nproductoporcuti
     * @return Producto
     */
    public function setNproductoporcuti($nproductoporcuti)
    {
        $this->nproductoporcuti = $nproductoporcuti;
    
        return $this;
    }

    /**
     * Get nproductoporcuti
     *
     * @return float 
     */
    public function getNproductoporcuti()
    {
        return $this->nproductoporcuti;
    }

    /**
     * Set nproductoutibruta
     *
     * @param float $nproductoutibruta
     * @return Producto
     */
    public function setNproductoutibruta($nproductoutibruta)
    {
        $this->nproductoutibruta = $nproductoutibruta;
    
        return $this;
    }

    /**
     * Get nproductoutibruta
     *
     * @return float 
     */
    public function getNproductoutibruta()
    {
        return $this->nproductoutibruta;
    }

    /**
     * Set nproductomarca
     *
     * @param Dicars\DataBundle\Entity\VenMarca $nproductomarca
     * @return Producto
     */
    public function setNproductomarca(\Dicars\DataBundle\Entity\VenMarca $nproductomarca = null)
    {
        $this->nproductomarca = $nproductomarca;
    
        return $this;
    }

    /**
     * Get nproductomarca
     *
     * @return Dicars\DataBundle\Entity\VenMarca 
     */
    public function getNproductomarca()
    {
        return $this->nproductomarca;
    }

    /**
     * Set ncategoria
     *
     * @param Dicars\DataBundle\Entity\VenCategoria $ncategoria
     * @return Producto
     */
    public function setNcategoria(\Dicars\DataBundle\Entity\VenCategoria $ncategoria = null)
    {
        $this->ncategoria = $ncategoria;
    
        return $this;
    }

    /**
     * Get ncategoria
     *
     * @return Dicars\DataBundle\Entity\VenCategoria 
     */
    public function getNcategoria()
    {
        return $this->ncategoria;
    }
}