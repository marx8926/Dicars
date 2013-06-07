<?php

namespace Dicars\DataBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Dicars\DataBundle\Entity\LogKardex
 *
 * @ORM\Table(name="log_kardex")
 * @ORM\Entity
 */
class LogKardex
{
    /**
     * @var integer $nkardexId
     *
     * @ORM\Column(name="nKardex_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $nkardexId;

    /**
     * @var string $ckardexserie
     *
     * @ORM\Column(name="cKardexSerie", type="string", length=4, nullable=true)
     */
    private $ckardexserie;

    /**
     * @var string $ckardexnro
     *
     * @ORM\Column(name="cKardexNro", type="string", length=8, nullable=true)
     */
    private $ckardexnro;

    /**
     * @var string $ckardextipoing
     *
     * @ORM\Column(name="cKardexTipoIng", type="string", length=1, nullable=false)
     */
    private $ckardextipoing;

    /**
     * @var float $nkardexprecunt
     *
     * @ORM\Column(name="nKardexPrecUnt", type="decimal", nullable=true)
     */
    private $nkardexprecunt;

    /**
     * @var integer $nkardexcant
     *
     * @ORM\Column(name="nKardexCant", type="integer", nullable=true)
     */
    private $nkardexcant;

    /**
     * @var float $nkardextot
     *
     * @ORM\Column(name="nKardexTot", type="decimal", nullable=true)
     */
    private $nkardextot;

    /**
     * @var integer $nkardexsaldocant
     *
     * @ORM\Column(name="nKardexSaldoCant", type="integer", nullable=false)
     */
    private $nkardexsaldocant;

    /**
     * @var float $nkardexsaldoprecunt
     *
     * @ORM\Column(name="nKardexSaldoPrecUnt", type="decimal", nullable=false)
     */
    private $nkardexsaldoprecunt;

    /**
     * @var float $nkardexsaldotot
     *
     * @ORM\Column(name="nKardexSaldoTot", type="decimal", nullable=false)
     */
    private $nkardexsaldotot;

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
     * @var Local
     *
     * @ORM\ManyToOne(targetEntity="Local")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="nLocal_id", referencedColumnName="nLocal_id")
     * })
     */
    private $nlocal;



    /**
     * Get nkardexId
     *
     * @return integer 
     */
    public function getNkardexId()
    {
        return $this->nkardexId;
    }

    /**
     * Set ckardexserie
     *
     * @param string $ckardexserie
     * @return LogKardex
     */
    public function setCkardexserie($ckardexserie)
    {
        $this->ckardexserie = $ckardexserie;
    
        return $this;
    }

    /**
     * Get ckardexserie
     *
     * @return string 
     */
    public function getCkardexserie()
    {
        return $this->ckardexserie;
    }

    /**
     * Set ckardexnro
     *
     * @param string $ckardexnro
     * @return LogKardex
     */
    public function setCkardexnro($ckardexnro)
    {
        $this->ckardexnro = $ckardexnro;
    
        return $this;
    }

    /**
     * Get ckardexnro
     *
     * @return string 
     */
    public function getCkardexnro()
    {
        return $this->ckardexnro;
    }

    /**
     * Set ckardextipoing
     *
     * @param string $ckardextipoing
     * @return LogKardex
     */
    public function setCkardextipoing($ckardextipoing)
    {
        $this->ckardextipoing = $ckardextipoing;
    
        return $this;
    }

    /**
     * Get ckardextipoing
     *
     * @return string 
     */
    public function getCkardextipoing()
    {
        return $this->ckardextipoing;
    }

    /**
     * Set nkardexprecunt
     *
     * @param float $nkardexprecunt
     * @return LogKardex
     */
    public function setNkardexprecunt($nkardexprecunt)
    {
        $this->nkardexprecunt = $nkardexprecunt;
    
        return $this;
    }

    /**
     * Get nkardexprecunt
     *
     * @return float 
     */
    public function getNkardexprecunt()
    {
        return $this->nkardexprecunt;
    }

    /**
     * Set nkardexcant
     *
     * @param integer $nkardexcant
     * @return LogKardex
     */
    public function setNkardexcant($nkardexcant)
    {
        $this->nkardexcant = $nkardexcant;
    
        return $this;
    }

    /**
     * Get nkardexcant
     *
     * @return integer 
     */
    public function getNkardexcant()
    {
        return $this->nkardexcant;
    }

    /**
     * Set nkardextot
     *
     * @param float $nkardextot
     * @return LogKardex
     */
    public function setNkardextot($nkardextot)
    {
        $this->nkardextot = $nkardextot;
    
        return $this;
    }

    /**
     * Get nkardextot
     *
     * @return float 
     */
    public function getNkardextot()
    {
        return $this->nkardextot;
    }

    /**
     * Set nkardexsaldocant
     *
     * @param integer $nkardexsaldocant
     * @return LogKardex
     */
    public function setNkardexsaldocant($nkardexsaldocant)
    {
        $this->nkardexsaldocant = $nkardexsaldocant;
    
        return $this;
    }

    /**
     * Get nkardexsaldocant
     *
     * @return integer 
     */
    public function getNkardexsaldocant()
    {
        return $this->nkardexsaldocant;
    }

    /**
     * Set nkardexsaldoprecunt
     *
     * @param float $nkardexsaldoprecunt
     * @return LogKardex
     */
    public function setNkardexsaldoprecunt($nkardexsaldoprecunt)
    {
        $this->nkardexsaldoprecunt = $nkardexsaldoprecunt;
    
        return $this;
    }

    /**
     * Get nkardexsaldoprecunt
     *
     * @return float 
     */
    public function getNkardexsaldoprecunt()
    {
        return $this->nkardexsaldoprecunt;
    }

    /**
     * Set nkardexsaldotot
     *
     * @param float $nkardexsaldotot
     * @return LogKardex
     */
    public function setNkardexsaldotot($nkardexsaldotot)
    {
        $this->nkardexsaldotot = $nkardexsaldotot;
    
        return $this;
    }

    /**
     * Get nkardexsaldotot
     *
     * @return float 
     */
    public function getNkardexsaldotot()
    {
        return $this->nkardexsaldotot;
    }

    /**
     * Set nproducto
     *
     * @param Dicars\DataBundle\Entity\Producto $nproducto
     * @return LogKardex
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
     * Set nlocal
     *
     * @param Dicars\DataBundle\Entity\Local $nlocal
     * @return LogKardex
     */
    public function setNlocal(\Dicars\DataBundle\Entity\Local $nlocal = null)
    {
        $this->nlocal = $nlocal;
    
        return $this;
    }

    /**
     * Get nlocal
     *
     * @return Dicars\DataBundle\Entity\Local 
     */
    public function getNlocal()
    {
        return $this->nlocal;
    }
}