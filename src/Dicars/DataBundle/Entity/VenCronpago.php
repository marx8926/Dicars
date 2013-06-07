<?php

namespace Dicars\DataBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Dicars\DataBundle\Entity\VenCronpago
 *
 * @ORM\Table(name="ven_cronpago")
 * @ORM\Entity
 */
class VenCronpago
{
    /**
     * @var integer $ncronogramaId
     *
     * @ORM\Column(name="nCronograma_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $ncronogramaId;

    /**
     * @var integer $ncronpagonrocuota
     *
     * @ORM\Column(name="nCronPagoNroCuota", type="integer", nullable=false)
     */
    private $ncronpagonrocuota;

    /**
     * @var \DateTime $ncronpagofecreg
     *
     * @ORM\Column(name="nCronPagoFecReg", type="datetime", nullable=false)
     */
    private $ncronpagofecreg;

    /**
     * @var \DateTime $ncronpagofecpago
     *
     * @ORM\Column(name="nCronPagoFecPago", type="datetime", nullable=false)
     */
    private $ncronpagofecpago;

    /**
     * @var float $ncronpagomoncouapg
     *
     * @ORM\Column(name="nCronPagoMonCouApg", type="decimal", nullable=false)
     */
    private $ncronpagomoncouapg;

    /**
     * @var float $ncronpagomoncouapl
     *
     * @ORM\Column(name="nCronPagoMonCouApl", type="decimal", nullable=false)
     */
    private $ncronpagomoncouapl;

    /**
     * @var VenCredito
     *
     * @ORM\ManyToOne(targetEntity="VenCredito")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="nVenCredito_id", referencedColumnName="nVenCredito_id")
     * })
     */
    private $nvencredito;



    /**
     * Get ncronogramaId
     *
     * @return integer 
     */
    public function getNcronogramaId()
    {
        return $this->ncronogramaId;
    }

    /**
     * Set ncronpagonrocuota
     *
     * @param integer $ncronpagonrocuota
     * @return VenCronpago
     */
    public function setNcronpagonrocuota($ncronpagonrocuota)
    {
        $this->ncronpagonrocuota = $ncronpagonrocuota;
    
        return $this;
    }

    /**
     * Get ncronpagonrocuota
     *
     * @return integer 
     */
    public function getNcronpagonrocuota()
    {
        return $this->ncronpagonrocuota;
    }

    /**
     * Set ncronpagofecreg
     *
     * @param \DateTime $ncronpagofecreg
     * @return VenCronpago
     */
    public function setNcronpagofecreg($ncronpagofecreg)
    {
        $this->ncronpagofecreg = $ncronpagofecreg;
    
        return $this;
    }

    /**
     * Get ncronpagofecreg
     *
     * @return \DateTime 
     */
    public function getNcronpagofecreg()
    {
        return $this->ncronpagofecreg;
    }

    /**
     * Set ncronpagofecpago
     *
     * @param \DateTime $ncronpagofecpago
     * @return VenCronpago
     */
    public function setNcronpagofecpago($ncronpagofecpago)
    {
        $this->ncronpagofecpago = $ncronpagofecpago;
    
        return $this;
    }

    /**
     * Get ncronpagofecpago
     *
     * @return \DateTime 
     */
    public function getNcronpagofecpago()
    {
        return $this->ncronpagofecpago;
    }

    /**
     * Set ncronpagomoncouapg
     *
     * @param float $ncronpagomoncouapg
     * @return VenCronpago
     */
    public function setNcronpagomoncouapg($ncronpagomoncouapg)
    {
        $this->ncronpagomoncouapg = $ncronpagomoncouapg;
    
        return $this;
    }

    /**
     * Get ncronpagomoncouapg
     *
     * @return float 
     */
    public function getNcronpagomoncouapg()
    {
        return $this->ncronpagomoncouapg;
    }

    /**
     * Set ncronpagomoncouapl
     *
     * @param float $ncronpagomoncouapl
     * @return VenCronpago
     */
    public function setNcronpagomoncouapl($ncronpagomoncouapl)
    {
        $this->ncronpagomoncouapl = $ncronpagomoncouapl;
    
        return $this;
    }

    /**
     * Get ncronpagomoncouapl
     *
     * @return float 
     */
    public function getNcronpagomoncouapl()
    {
        return $this->ncronpagomoncouapl;
    }

    /**
     * Set nvencredito
     *
     * @param Dicars\DataBundle\Entity\VenCredito $nvencredito
     * @return VenCronpago
     */
    public function setNvencredito(\Dicars\DataBundle\Entity\VenCredito $nvencredito = null)
    {
        $this->nvencredito = $nvencredito;
    
        return $this;
    }

    /**
     * Get nvencredito
     *
     * @return Dicars\DataBundle\Entity\VenCredito 
     */
    public function getNvencredito()
    {
        return $this->nvencredito;
    }
}