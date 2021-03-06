<?php

namespace Dicars\DataBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Producto
 *
 * @ORM\Table(name="producto")
 * @ORM\Entity
 */
class Producto
{
    /**
     * @var integer
     *
     * @ORM\Column(name="nProducto_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $nproductoId;

    /**
     * @var string
     *
     * @ORM\Column(name="cProductoSerie", type="string", length=15, nullable=false)
     */
    private $cproductoserie;

    /**
     * @var string
     *
     * @ORM\Column(name="cProductoTalla", type="string", length=15, nullable=false)
     */
    private $cproductotalla;

    /**
     * @var integer
     *
     * @ORM\Column(name="nProductoTipo", type="integer", nullable=false)
     */
    private $nproductotipo;

    /**
     * @var string
     *
     * @ORM\Column(name="cProductoDesc", type="string", length=200, nullable=false)
     */
    private $cproductodesc;

    /**
     * @var string
     *
     * @ORM\Column(name="nProductoPContado", type="decimal", nullable=false)
     */
    private $nproductopcontado;

    /**
     * @var string
     *
     * @ORM\Column(name="nProductoPCredito", type="decimal", nullable=false)
     */
    private $nproductopcredito;

    /**
     * @var string
     *
     * @ORM\Column(name="nProductoPCosto", type="decimal", nullable=false)
     */
    private $nproductopcosto;

    /**
     * @var string
     *
     * @ORM\Column(name="cProductoCodBarra", type="string", length=12, nullable=false)
     */
    private $cproductocodbarra;

    /**
     * @var string
     *
     * @ORM\Column(name="cProductoImage", type="text", nullable=false)
     */
    private $cproductoimage;

    /**
     * @var integer
     *
     * @ORM\Column(name="nProductoStockMin", type="integer", nullable=false)
     */
    private $nproductostockmin;

    /**
     * @var integer
     *
     * @ORM\Column(name="nProductoStockMax", type="integer", nullable=false)
     */
    private $nproductostockmax;

    /**
     * @var integer
     *
     * @ORM\Column(name="nProductoStock", type="integer", nullable=false)
     */
    private $nproductostock;

    /**
     * @var string
     *
     * @ORM\Column(name="cProductoEst", type="string", length=1, nullable=false)
     */
    private $cproductoest;

    /**
     * @var string
     *
     * @ORM\Column(name="nProductoPorcUti", type="decimal", nullable=false)
     */
    private $nproductoporcuti;

    /**
     * @var string
     *
     * @ORM\Column(name="nProductoUtiBruta", type="decimal", nullable=false)
     */
    private $nproductoutibruta;

    /**
     * @var \VenCategoria
     *
     * @ORM\ManyToOne(targetEntity="VenCategoria")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="nCategoria_id", referencedColumnName="nCategoria_id")
     * })
     */
    private $ncategoria;

    /**
     * @var \VenMarca
     *
     * @ORM\ManyToOne(targetEntity="VenMarca")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="nProductoMarca", referencedColumnName="nMarca_id")
     * })
     */
    private $nproductomarca;



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
     * @param string $nproductopcontado
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
     * @return string 
     */
    public function getNproductopcontado()
    {
        return $this->nproductopcontado;
    }

    /**
     * Set nproductopcredito
     *
     * @param string $nproductopcredito
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
     * @return string 
     */
    public function getNproductopcredito()
    {
        return $this->nproductopcredito;
    }

    /**
     * Set nproductopcosto
     *
     * @param string $nproductopcosto
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
     * @return string 
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
     * Set cproductoimage
     *
     * @param string $cproductoimage
     * @return Producto
     */
    public function setCproductoimage($cproductoimage)
    {
        $this->cproductoimage = $cproductoimage;
    
        return $this;
    }

    /**
     * Get cproductoimage
     *
     * @return string 
     */
    public function getCproductoimage()
    {
        return $this->cproductoimage;
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
     * Set nproductostock
     *
     * @param integer $nproductostock
     * @return Producto
     */
    public function setNproductostock($nproductostock)
    {
        $this->nproductostock = $nproductostock;
    
        return $this;
    }

    /**
     * Get nproductostock
     *
     * @return integer 
     */
    public function getNproductostock()
    {
        return $this->nproductostock;
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
     * @param string $nproductoporcuti
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
     * @return string 
     */
    public function getNproductoporcuti()
    {
        return $this->nproductoporcuti;
    }

    /**
     * Set nproductoutibruta
     *
     * @param string $nproductoutibruta
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
     * @return string 
     */
    public function getNproductoutibruta()
    {
        return $this->nproductoutibruta;
    }

    /**
     * Set ncategoria
     *
     * @param \Dicars\DataBundle\Entity\VenCategoria $ncategoria
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
     * @return \Dicars\DataBundle\Entity\VenCategoria 
     */
    public function getNcategoria()
    {
        return $this->ncategoria;
    }

    /**
     * Set nproductomarca
     *
     * @param \Dicars\DataBundle\Entity\VenMarca $nproductomarca
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
     * @return \Dicars\DataBundle\Entity\VenMarca 
     */
    public function getNproductomarca()
    {
        return $this->nproductomarca;
    }
}