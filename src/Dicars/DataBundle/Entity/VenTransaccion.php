<?php

namespace Dicars\DataBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * VenTransaccion
 *
 * @ORM\Table(name="ven_transaccion")
 * @ORM\Entity
 */
class VenTransaccion
{
    /**
     * @var integer
     *
     * @ORM\Column(name="nTransaccion_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $ntransaccionId;

    /**
     * @var string
     *
     * @ORM\Column(name="cTransaccionDesc", type="string", length=200, nullable=false)
     */
    private $ctransacciondesc;

    /**
     * @var string
     *
     * @ORM\Column(name="nTransaccionMont", type="decimal", nullable=false)
     */
    private $ntransaccionmont;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dTransaccionFecReg", type="datetime", nullable=false)
     */
    private $dtransaccionfecreg;

    /**
     * @var integer
     *
     * @ORM\Column(name="nTransaccionTipPag", type="integer", nullable=false)
     */
    private $ntransacciontippag;

    /**
     * @var \VenPersonal
     *
     * @ORM\ManyToOne(targetEntity="VenPersonal")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="nPersonal_id", referencedColumnName="nPersonal_id")
     * })
     */
    private $npersonal;

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
     * Get ntransaccionId
     *
     * @return integer 
     */
    public function getNtransaccionId()
    {
        return $this->ntransaccionId;
    }

    /**
     * Set ctransacciondesc
     *
     * @param string $ctransacciondesc
     * @return VenTransaccion
     */
    public function setCtransacciondesc($ctransacciondesc)
    {
        $this->ctransacciondesc = $ctransacciondesc;
    
        return $this;
    }

    /**
     * Get ctransacciondesc
     *
     * @return string 
     */
    public function getCtransacciondesc()
    {
        return $this->ctransacciondesc;
    }

    /**
     * Set ntransaccionmont
     *
     * @param string $ntransaccionmont
     * @return VenTransaccion
     */
    public function setNtransaccionmont($ntransaccionmont)
    {
        $this->ntransaccionmont = $ntransaccionmont;
    
        return $this;
    }

    /**
     * Get ntransaccionmont
     *
     * @return string 
     */
    public function getNtransaccionmont()
    {
        return $this->ntransaccionmont;
    }

    /**
     * Set dtransaccionfecreg
     *
     * @param \DateTime $dtransaccionfecreg
     * @return VenTransaccion
     */
    public function setDtransaccionfecreg($dtransaccionfecreg)
    {
        $this->dtransaccionfecreg = $dtransaccionfecreg;
    
        return $this;
    }

    /**
     * Get dtransaccionfecreg
     *
     * @return \DateTime 
     */
    public function getDtransaccionfecreg()
    {
        return $this->dtransaccionfecreg;
    }

    /**
     * Set ntransacciontippag
     *
     * @param integer $ntransacciontippag
     * @return VenTransaccion
     */
    public function setNtransacciontippag($ntransacciontippag)
    {
        $this->ntransacciontippag = $ntransacciontippag;
    
        return $this;
    }

    /**
     * Get ntransacciontippag
     *
     * @return integer 
     */
    public function getNtransacciontippag()
    {
        return $this->ntransacciontippag;
    }

    /**
     * Set npersonal
     *
     * @param \Dicars\DataBundle\Entity\VenPersonal $npersonal
     * @return VenTransaccion
     */
    public function setNpersonal(\Dicars\DataBundle\Entity\VenPersonal $npersonal = null)
    {
        $this->npersonal = $npersonal;
    
        return $this;
    }

    /**
     * Get npersonal
     *
     * @return \Dicars\DataBundle\Entity\VenPersonal 
     */
    public function getNpersonal()
    {
        return $this->npersonal;
    }

    /**
     * Set nventa
     *
     * @param \Dicars\DataBundle\Entity\VenVenta $nventa
     * @return VenTransaccion
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