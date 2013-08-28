<?php

namespace Dicars\DataBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * VenCredito
 *
 * @ORM\Table(name="ven_credito")
 * @ORM\Entity
 */
class VenCredito
{
    /**
     * @var integer
     *
     * @ORM\Column(name="nVenCredito_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $nvencreditoId;

    /**
     * @var integer
     *
     * @ORM\Column(name="nCreditoFormaPag", type="integer", nullable=false)
     */
    private $ncreditoformapag;

    /**
     * @var integer
     *
     * @ORM\Column(name="nVenCreditoNCuota", type="integer", nullable=false)
     */
    private $nvencreditoncuota;

    /**
     * @var string
     *
     * @ORM\Column(name="nVenCreditoMontInicial", type="decimal", nullable=false)
     */
    private $nvencreditomontinicial;

    /**
     * @var integer
     *
     * @ORM\Column(name="nVenCreditoPPag", type="integer", nullable=false)
     */
    private $nvencreditoppag;

    /**
     * @var string
     *
     * @ORM\Column(name="cCreditoEst", type="string", length=1, nullable=false)
     */
    private $ccreditoest;

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
     * Get nvencreditoId
     *
     * @return integer 
     */
    public function getNvencreditoId()
    {
        return $this->nvencreditoId;
    }

    /**
     * Set ncreditoformapag
     *
     * @param integer $ncreditoformapag
     * @return VenCredito
     */
    public function setNcreditoformapag($ncreditoformapag)
    {
        $this->ncreditoformapag = $ncreditoformapag;
    
        return $this;
    }

    /**
     * Get ncreditoformapag
     *
     * @return integer 
     */
    public function getNcreditoformapag()
    {
        return $this->ncreditoformapag;
    }

    /**
     * Set nvencreditoncuota
     *
     * @param integer $nvencreditoncuota
     * @return VenCredito
     */
    public function setNvencreditoncuota($nvencreditoncuota)
    {
        $this->nvencreditoncuota = $nvencreditoncuota;
    
        return $this;
    }

    /**
     * Get nvencreditoncuota
     *
     * @return integer 
     */
    public function getNvencreditoncuota()
    {
        return $this->nvencreditoncuota;
    }

    /**
     * Set nvencreditomontinicial
     *
     * @param string $nvencreditomontinicial
     * @return VenCredito
     */
    public function setNvencreditomontinicial($nvencreditomontinicial)
    {
        $this->nvencreditomontinicial = $nvencreditomontinicial;
    
        return $this;
    }

    /**
     * Get nvencreditomontinicial
     *
     * @return string 
     */
    public function getNvencreditomontinicial()
    {
        return $this->nvencreditomontinicial;
    }

    /**
     * Set nvencreditoppag
     *
     * @param integer $nvencreditoppag
     * @return VenCredito
     */
    public function setNvencreditoppag($nvencreditoppag)
    {
        $this->nvencreditoppag = $nvencreditoppag;
    
        return $this;
    }

    /**
     * Get nvencreditoppag
     *
     * @return integer 
     */
    public function getNvencreditoppag()
    {
        return $this->nvencreditoppag;
    }

    /**
     * Set ccreditoest
     *
     * @param string $ccreditoest
     * @return VenCredito
     */
    public function setCcreditoest($ccreditoest)
    {
        $this->ccreditoest = $ccreditoest;
    
        return $this;
    }

    /**
     * Get ccreditoest
     *
     * @return string 
     */
    public function getCcreditoest()
    {
        return $this->ccreditoest;
    }

    /**
     * Set nventa
     *
     * @param \Dicars\DataBundle\Entity\VenVenta $nventa
     * @return VenCredito
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