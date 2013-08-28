<?php

namespace Dicars\DataBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * VenVenta
 *
 * @ORM\Table(name="ven_venta")
 * @ORM\Entity
 */
class VenVenta
{
    /**
     * @var integer
     *
     * @ORM\Column(name="nVenta_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $nventaId;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="cVentaFecReg", type="datetime", nullable=false)
     */
    private $cventafecreg;

    /**
     * @var string
     *
     * @ORM\Column(name="nVentaSubTotal", type="decimal", nullable=false)
     */
    private $nventasubtotal;

    /**
     * @var string
     *
     * @ORM\Column(name="cVentaEst", type="string", length=1, nullable=false)
     */
    private $cventaest;

    /**
     * @var string
     *
     * @ORM\Column(name="nVentaDscto", type="decimal", nullable=false)
     */
    private $nventadscto;

    /**
     * @var integer
     *
     * @ORM\Column(name="nVentaTipPag", type="integer", nullable=false)
     */
    private $nventatippag;

    /**
     * @var string
     *
     * @ORM\Column(name="cVentaObsv", type="string", length=500, nullable=false)
     */
    private $cventaobsv;

    /**
     * @var string
     *
     * @ORM\Column(name="nVentaTotApag", type="decimal", nullable=false)
     */
    private $nventatotapag;

    /**
     * @var string
     *
     * @ORM\Column(name="nVentaTotAmt", type="decimal", nullable=false)
     */
    private $nventatotamt;

    /**
     * @var string
     *
     * @ORM\Column(name="nVentaSaldo", type="decimal", nullable=false)
     */
    private $nventasaldo;

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
     * @var \Local
     *
     * @ORM\ManyToOne(targetEntity="Local")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="nLocal_id", referencedColumnName="nLocal_id")
     * })
     */
    private $nlocal;

    /**
     * @var \VenTipoigv
     *
     * @ORM\ManyToOne(targetEntity="VenTipoigv")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="nTipoIGV", referencedColumnName="nTipoIGV")
     * })
     */
    private $ntipoigv;

    /**
     * @var \VenTipomoneda
     *
     * @ORM\ManyToOne(targetEntity="VenTipomoneda")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="nTipoMoneda", referencedColumnName="nTipoMoneda")
     * })
     */
    private $ntipomoneda;



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
     * @param string $nventasubtotal
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
     * @return string 
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
     * @param string $nventadscto
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
     * @return string 
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
     * @param string $nventatotapag
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
     * @return string 
     */
    public function getNventatotapag()
    {
        return $this->nventatotapag;
    }

    /**
     * Set nventatotamt
     *
     * @param string $nventatotamt
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
     * @return string 
     */
    public function getNventatotamt()
    {
        return $this->nventatotamt;
    }

    /**
     * Set nventasaldo
     *
     * @param string $nventasaldo
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
     * @return string 
     */
    public function getNventasaldo()
    {
        return $this->nventasaldo;
    }

    /**
     * Set ncliente
     *
     * @param \Dicars\DataBundle\Entity\VenCliente $ncliente
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
     * @return \Dicars\DataBundle\Entity\VenCliente 
     */
    public function getNcliente()
    {
        return $this->ncliente;
    }

    /**
     * Set nlocal
     *
     * @param \Dicars\DataBundle\Entity\Local $nlocal
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
     * @return \Dicars\DataBundle\Entity\Local 
     */
    public function getNlocal()
    {
        return $this->nlocal;
    }

    /**
     * Set ntipoigv
     *
     * @param \Dicars\DataBundle\Entity\VenTipoigv $ntipoigv
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
     * @return \Dicars\DataBundle\Entity\VenTipoigv 
     */
    public function getNtipoigv()
    {
        return $this->ntipoigv;
    }

    /**
     * Set ntipomoneda
     *
     * @param \Dicars\DataBundle\Entity\VenTipomoneda $ntipomoneda
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
     * @return \Dicars\DataBundle\Entity\VenTipomoneda 
     */
    public function getNtipomoneda()
    {
        return $this->ntipomoneda;
    }
}