<?php

namespace Dicars\DataBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * LogKardex
 *
 * @ORM\Table(name="log_kardex")
 * @ORM\Entity
 */
class LogKardex
{
    /**
     * @var integer
     *
     * @ORM\Column(name="nKardex_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $nkardexId;

    /**
     * @var string
     *
     * @ORM\Column(name="cKardexSerie", type="string", length=4, nullable=true)
     */
    private $ckardexserie;

    /**
     * @var string
     *
     * @ORM\Column(name="cKardexNro", type="string", length=8, nullable=true)
     */
    private $ckardexnro;

    /**
     * @var integer
     *
     * @ORM\Column(name="nKardexTipoIng", type="integer", nullable=false)
     */
    private $nkardextipoing;

    /**
     * @var string
     *
     * @ORM\Column(name="nKardexPrecUnt", type="decimal", nullable=true)
     */
    private $nkardexprecunt;

    /**
     * @var integer
     *
     * @ORM\Column(name="nKardexCant", type="integer", nullable=true)
     */
    private $nkardexcant;

    /**
     * @var string
     *
     * @ORM\Column(name="nKardexTot", type="decimal", nullable=true)
     */
    private $nkardextot;

    /**
     * @var integer
     *
     * @ORM\Column(name="nKardexSaldoCant", type="integer", nullable=false)
     */
    private $nkardexsaldocant;

    /**
     * @var string
     *
     * @ORM\Column(name="nKardexSaldoPrecUnt", type="decimal", nullable=false)
     */
    private $nkardexsaldoprecunt;

    /**
     * @var string
     *
     * @ORM\Column(name="nKardexSaldoTot", type="decimal", nullable=false)
     */
    private $nkardexsaldotot;

    /**
     * @var \Local
     *
     * @ORM\ManyToOne(targetEntity="Local")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="nLocal_id", referencedColumnName="nLocal_id")
     * })
     */
    private $nlocal;

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
     * Set nkardextipoing
     *
     * @param integer $nkardextipoing
     * @return LogKardex
     */
    public function setNkardextipoing($nkardextipoing)
    {
        $this->nkardextipoing = $nkardextipoing;
    
        return $this;
    }

    /**
     * Get nkardextipoing
     *
     * @return integer 
     */
    public function getNkardextipoing()
    {
        return $this->nkardextipoing;
    }

    /**
     * Set nkardexprecunt
     *
     * @param string $nkardexprecunt
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
     * @return string 
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
     * @param string $nkardextot
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
     * @return string 
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
     * @param string $nkardexsaldoprecunt
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
     * @return string 
     */
    public function getNkardexsaldoprecunt()
    {
        return $this->nkardexsaldoprecunt;
    }

    /**
     * Set nkardexsaldotot
     *
     * @param string $nkardexsaldotot
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
     * @return string 
     */
    public function getNkardexsaldotot()
    {
        return $this->nkardexsaldotot;
    }

    /**
     * Set nlocal
     *
     * @param \Dicars\DataBundle\Entity\Local $nlocal
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
     * @return \Dicars\DataBundle\Entity\Local 
     */
    public function getNlocal()
    {
        return $this->nlocal;
    }

    /**
     * Set nproducto
     *
     * @param \Dicars\DataBundle\Entity\Producto $nproducto
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
     * @return \Dicars\DataBundle\Entity\Producto 
     */
    public function getNproducto()
    {
        return $this->nproducto;
    }
}