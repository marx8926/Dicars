<?php

namespace Dicars\DataBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * VenTarjcredito
 *
 * @ORM\Table(name="ven_tarjcredito")
 * @ORM\Entity
 */
class VenTarjcredito
{
    /**
     * @var integer
     *
     * @ORM\Column(name="nTarjCredito_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $ntarjcreditoId;

    /**
     * @var float
     *
     * @ORM\Column(name="nTarjCreditoLinea", type="decimal", nullable=false)
     */
    private $ntarjcreditolinea;

    /**
     * @var string
     *
     * @ORM\Column(name="nTarjCreditoNroInt", type="string", length=500, nullable=false)
     */
    private $ntarjcreditonroint;

    /**
     * @var float
     *
     * @ORM\Column(name="nTarjCreditoConsumo", type="decimal", nullable=false)
     */
    private $ntarjcreditoconsumo;

    /**
     * @var string
     *
     * @ORM\Column(name="cTarjCreditoEst", type="string", length=1, nullable=false)
     */
    private $ctarjcreditoest;

    /**
     * @var integer
     *
     * @ORM\Column(name="nTarjCreditoTipo", type="integer", nullable=false)
     */
    private $ntarjcreditotipo;

    /**
     * @var string
     *
     * @ORM\Column(name="cTarjCreditoDesc", type="string", length=500, nullable=false)
     */
    private $ctarjcreditodesc;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dTarjCreditoFecReg", type="datetime", nullable=false)
     */
    private $dtarjcreditofecreg;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dTarjCreditoFecVenc", type="datetime", nullable=false)
     */
    private $dtarjcreditofecvenc;

    /**
     * @var string
     *
     * @ORM\Column(name="nTarjCreditoNroExt", type="string", length=500, nullable=false)
     */
    private $ntarjcreditonroext;

    /**
     * @var \VenCliente
     *
     * @ORM\ManyToOne(targetEntity="VenCliente")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="nCliente_id", referencedColumnName="nCliente_id")
     * })
     */
    private $ncliente;



    /**
     * Get ntarjcreditoId
     *
     * @return integer 
     */
    public function getNtarjcreditoId()
    {
        return $this->ntarjcreditoId;
    }

    /**
     * Set ntarjcreditolinea
     *
     * @param float $ntarjcreditolinea
     * @return VenTarjcredito
     */
    public function setNtarjcreditolinea($ntarjcreditolinea)
    {
        $this->ntarjcreditolinea = $ntarjcreditolinea;
    
        return $this;
    }

    /**
     * Get ntarjcreditolinea
     *
     * @return float 
     */
    public function getNtarjcreditolinea()
    {
        return $this->ntarjcreditolinea;
    }

    /**
     * Set ntarjcreditonroint
     *
     * @param string $ntarjcreditonroint
     * @return VenTarjcredito
     */
    public function setNtarjcreditonroint($ntarjcreditonroint)
    {
        $this->ntarjcreditonroint = $ntarjcreditonroint;
    
        return $this;
    }

    /**
     * Get ntarjcreditonroint
     *
     * @return string 
     */
    public function getNtarjcreditonroint()
    {
        return $this->ntarjcreditonroint;
    }

    /**
     * Set ntarjcreditoconsumo
     *
     * @param float $ntarjcreditoconsumo
     * @return VenTarjcredito
     */
    public function setNtarjcreditoconsumo($ntarjcreditoconsumo)
    {
        $this->ntarjcreditoconsumo = $ntarjcreditoconsumo;
    
        return $this;
    }

    /**
     * Get ntarjcreditoconsumo
     *
     * @return float 
     */
    public function getNtarjcreditoconsumo()
    {
        return $this->ntarjcreditoconsumo;
    }

    /**
     * Set ctarjcreditoest
     *
     * @param string $ctarjcreditoest
     * @return VenTarjcredito
     */
    public function setCtarjcreditoest($ctarjcreditoest)
    {
        $this->ctarjcreditoest = $ctarjcreditoest;
    
        return $this;
    }

    /**
     * Get ctarjcreditoest
     *
     * @return string 
     */
    public function getCtarjcreditoest()
    {
        return $this->ctarjcreditoest;
    }

    /**
     * Set ntarjcreditotipo
     *
     * @param integer $ntarjcreditotipo
     * @return VenTarjcredito
     */
    public function setNtarjcreditotipo($ntarjcreditotipo)
    {
        $this->ntarjcreditotipo = $ntarjcreditotipo;
    
        return $this;
    }

    /**
     * Get ntarjcreditotipo
     *
     * @return integer 
     */
    public function getNtarjcreditotipo()
    {
        return $this->ntarjcreditotipo;
    }

    /**
     * Set ctarjcreditodesc
     *
     * @param string $ctarjcreditodesc
     * @return VenTarjcredito
     */
    public function setCtarjcreditodesc($ctarjcreditodesc)
    {
        $this->ctarjcreditodesc = $ctarjcreditodesc;
    
        return $this;
    }

    /**
     * Get ctarjcreditodesc
     *
     * @return string 
     */
    public function getCtarjcreditodesc()
    {
        return $this->ctarjcreditodesc;
    }

    /**
     * Set dtarjcreditofecreg
     *
     * @param \DateTime $dtarjcreditofecreg
     * @return VenTarjcredito
     */
    public function setDtarjcreditofecreg($dtarjcreditofecreg)
    {
        $this->dtarjcreditofecreg = $dtarjcreditofecreg;
    
        return $this;
    }

    /**
     * Get dtarjcreditofecreg
     *
     * @return \DateTime 
     */
    public function getDtarjcreditofecreg()
    {
        return $this->dtarjcreditofecreg;
    }

    /**
     * Set dtarjcreditofecvenc
     *
     * @param \DateTime $dtarjcreditofecvenc
     * @return VenTarjcredito
     */
    public function setDtarjcreditofecvenc($dtarjcreditofecvenc)
    {
        $this->dtarjcreditofecvenc = $dtarjcreditofecvenc;
    
        return $this;
    }

    /**
     * Get dtarjcreditofecvenc
     *
     * @return \DateTime 
     */
    public function getDtarjcreditofecvenc()
    {
        return $this->dtarjcreditofecvenc;
    }

    /**
     * Set ntarjcreditonroext
     *
     * @param string $ntarjcreditonroext
     * @return VenTarjcredito
     */
    public function setNtarjcreditonroext($ntarjcreditonroext)
    {
        $this->ntarjcreditonroext = $ntarjcreditonroext;
    
        return $this;
    }

    /**
     * Get ntarjcreditonroext
     *
     * @return string 
     */
    public function getNtarjcreditonroext()
    {
        return $this->ntarjcreditonroext;
    }

    /**
     * Set ncliente
     *
     * @param \Dicars\DataBundle\Entity\VenCliente $ncliente
     * @return VenTarjcredito
     */
    public function setNcliente(\Dicars\DataBundle\Entity\VenCliente $ncliente = null)
    {
        $this->ncliente = $ncliente;
    
        return $this;
    }

    /**
     * Get ncliente
     *
     * @return \Dicars\DataBundle\Entity\VenCliente 
     */
    public function getNcliente()
    {
        return $this->ncliente;
    }
}