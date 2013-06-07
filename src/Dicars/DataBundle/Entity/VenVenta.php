<?php

namespace Dicars\DataBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Dicars\DataBundle\Entity\VenVenta
 *
 * @ORM\Table(name="ven_venta")
 * @ORM\Entity
 */
class VenVenta
{
    /**
     * @var integer $nventaId
     *
     * @ORM\Column(name="nVenta_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $nventaId;

    /**
     * @var \DateTime $cventafecreg
     *
     * @ORM\Column(name="cVentaFecReg", type="datetime", nullable=false)
     */
    private $cventafecreg;

    /**
     * @var float $nventasubtotal
     *
     * @ORM\Column(name="nVentaSubTotal", type="decimal", nullable=false)
     */
    private $nventasubtotal;

    /**
     * @var string $cventaest
     *
     * @ORM\Column(name="cVentaEst", type="string", length=1, nullable=false)
     */
    private $cventaest;

    /**
     * @var float $nventadscto
     *
     * @ORM\Column(name="nVentaDscto", type="decimal", nullable=false)
     */
    private $nventadscto;

    /**
     * @var integer $nventatippag
     *
     * @ORM\Column(name="nVentaTipPag", type="integer", nullable=false)
     */
    private $nventatippag;

    /**
     * @var string $cventaobsv
     *
     * @ORM\Column(name="cVentaObsv", type="string", length=500, nullable=false)
     */
    private $cventaobsv;

    /**
     * @var float $nventatotapag
     *
     * @ORM\Column(name="nVentaTotApag", type="decimal", nullable=false)
     */
    private $nventatotapag;

    /**
     * @var float $nventatotamt
     *
     * @ORM\Column(name="nVentaTotAmt", type="decimal", nullable=false)
     */
    private $nventatotamt;

    /**
     * @var float $nventasaldo
     *
     * @ORM\Column(name="nVentaSaldo", type="decimal", nullable=false)
     */
    private $nventasaldo;

    /**
     * @var VenCliente
     *
     * @ORM\ManyToOne(targetEntity="VenCliente")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="nCliente_id", referencedColumnName="nCliente_id")
     * })
     */
    private $ncliente;

    /**
     * @var VenTipomoneda
     *
     * @ORM\ManyToOne(targetEntity="VenTipomoneda")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="nTipoMoneda", referencedColumnName="nTipoMoneda")
     * })
     */
    private $ntipomoneda;

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
     * @var VenTipoigv
     *
     * @ORM\ManyToOne(targetEntity="VenTipoigv")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="nTipoIGV", referencedColumnName="nTipoIGV")
     * })
     */
    private $ntipoigv;



    /**
     * Get nventaId
     *
     * @return integer 
     */
    public function getNventaId()
    {
        return $this->nventaId;
    }

    /**
     * Set cventafecreg
     *
     * @param \DateTime $cventafecreg
     * @return VenVenta
     */
    public function setCventafecreg($cventafecreg)
    {
        $this->cventafecreg = $cventafecreg;
    
        return $this;
    }

    /**
     * Get cventafecreg
     *
     * @return \DateTime 
     */
    public function getCventafecreg()
    {
        return $this->cventafecreg;
    }

    /**
     * Set nventasubtotal
     *
     * @param float $nventasubtotal
     * @return VenVenta
     */
    public function setNventasubtotal($nventasubtotal)
    {
        $this->nventasubtotal = $nventasubtotal;
    
        return $this;
    }

    /**
     * Get nventasubtotal
     *
     * @return float 
     */
    public function getNventasubtotal()
    {
        return $this->nventasubtotal;
    }

    /**
     * Set cventaest
     *
     * @param string $cventaest
     * @return VenVenta
     */
    public function setCventaest($cventaest)
    {
        $this->cventaest = $cventaest;
    
        return $this;
    }

    /**
     * Get cventaest
     *
     * @return string 
     */
    public function getCventaest()
    {
        return $this->cventaest;
    }

    /**
     * Set nventadscto
     *
     * @param float $nventadscto
     * @return VenVenta
     */
    public function setNventadscto($nventadscto)
    {
        $this->nventadscto = $nventadscto;
    
        return $this;
    }

    /**
     * Get nventadscto
     *
     * @return float 
     */
    public function getNventadscto()
    {
        return $this->nventadscto;
    }

    /**
     * Set nventatippag
     *
     * @param integer $nventatippag
     * @return VenVenta
     */
    public function setNventatippag($nventatippag)
    {
        $this->nventatippag = $nventatippag;
    
        return $this;
    }

    /**
     * Get nventatippag
     *
     * @return integer 
     */
    public function getNventatippag()
    {
        return $this->nventatippag;
    }

    /**
     * Set cventaobsv
     *
     * @param string $cventaobsv
     * @return VenVenta
     */
    public function setCventaobsv($cventaobsv)
    {
        $this->cventaobsv = $cventaobsv;
    
        return $this;
    }

    /**
     * Get cventaobsv
     *
     * @return string 
     */
    public function getCventaobsv()
    {
        return $this->cventaobsv;
    }

    /**
     * Set nventatotapag
     *
     * @param float $nventatotapag
     * @return VenVenta
     */
    public function setNventatotapag($nventatotapag)
    {
        $this->nventatotapag = $nventatotapag;
    
        return $this;
    }

    /**
     * Get nventatotapag
     *
     * @return float 
     */
    public function getNventatotapag()
    {
        return $this->nventatotapag;
    }

    /**
     * Set nventatotamt
     *
     * @param float $nventatotamt
     * @return VenVenta
     */
    public function setNventatotamt($nventatotamt)
    {
        $this->nventatotamt = $nventatotamt;
    
        return $this;
    }

    /**
     * Get nventatotamt
     *
     * @return float 
     */
    public function getNventatotamt()
    {
        return $this->nventatotamt;
    }

    /**
     * Set nventasaldo
     *
     * @param float $nventasaldo
     * @return VenVenta
     */
    public function setNventasaldo($nventasaldo)
    {
        $this->nventasaldo = $nventasaldo;
    
        return $this;
    }

    /**
     * Get nventasaldo
     *
     * @return float 
     */
    public function getNventasaldo()
    {
        return $this->nventasaldo;
    }

    /**
     * Set ncliente
     *
     * @param Dicars\DataBundle\Entity\VenCliente $ncliente
     * @return VenVenta
     */
    public function setNcliente(\Dicars\DataBundle\Entity\VenCliente $ncliente = null)
    {
        $this->ncliente = $ncliente;
    
        return $this;
    }

    /**
     * Get ncliente
     *
     * @return Dicars\DataBundle\Entity\VenCliente 
     */
    public function getNcliente()
    {
        return $this->ncliente;
    }

    /**
     * Set ntipomoneda
     *
     * @param Dicars\DataBundle\Entity\VenTipomoneda $ntipomoneda
     * @return VenVenta
     */
    public function setNtipomoneda(\Dicars\DataBundle\Entity\VenTipomoneda $ntipomoneda = null)
    {
        $this->ntipomoneda = $ntipomoneda;
    
        return $this;
    }

    /**
     * Get ntipomoneda
     *
     * @return Dicars\DataBundle\Entity\VenTipomoneda 
     */
    public function getNtipomoneda()
    {
        return $this->ntipomoneda;
    }

    /**
     * Set nlocal
     *
     * @param Dicars\DataBundle\Entity\Local $nlocal
     * @return VenVenta
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

    /**
     * Set ntipoigv
     *
     * @param Dicars\DataBundle\Entity\VenTipoigv $ntipoigv
     * @return VenVenta
     */
    public function setNtipoigv(\Dicars\DataBundle\Entity\VenTipoigv $ntipoigv = null)
    {
        $this->ntipoigv = $ntipoigv;
    
        return $this;
    }

    /**
     * Get ntipoigv
     *
     * @return Dicars\DataBundle\Entity\VenTipoigv 
     */
    public function getNtipoigv()
    {
        return $this->ntipoigv;
    }
}