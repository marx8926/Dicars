<?php

namespace Dicars\DataBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Dicars\DataBundle\Entity\LogDocordcom
 *
 * @ORM\Table(name="log_docordcom")
 * @ORM\Entity
 */
class LogDocordcom
{
    /**
     * @var integer $ndocordcomId
     *
     * @ORM\Column(name="nDocOrdCom_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $ndocordcomId;

    /**
     * @var integer $ndocordcomformpag
     *
     * @ORM\Column(name="nDocOrdComFormPag", type="integer", nullable=false)
     */
    private $ndocordcomformpag;

    /**
     * @var string $ndocordcomserie
     *
     * @ORM\Column(name="nDocOrdComSerie", type="string", length=4, nullable=false)
     */
    private $ndocordcomserie;

    /**
     * @var string $ndocordcomnro
     *
     * @ORM\Column(name="nDocOrdComNro", type="string", length=8, nullable=false)
     */
    private $ndocordcomnro;

    /**
     * @var string $cdocordcomest
     *
     * @ORM\Column(name="cDocOrdComEst", type="string", length=1, nullable=false)
     */
    private $cdocordcomest;

    /**
     * @var integer $ndocordcommodpag
     *
     * @ORM\Column(name="nDocOrdComModPag", type="integer", nullable=false)
     */
    private $ndocordcommodpag;

    /**
     * @var \DateTime $ndocordcomfecreg
     *
     * @ORM\Column(name="nDocOrdComFecReg", type="datetime", nullable=false)
     */
    private $ndocordcomfecreg;

    /**
     * @var \DateTime $ddocordcomfecpag
     *
     * @ORM\Column(name="dDocOrdComFecPag", type="datetime", nullable=false)
     */
    private $ddocordcomfecpag;

    /**
     * @var LogOrdcom
     *
     * @ORM\ManyToOne(targetEntity="LogOrdcom")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="nOrdenCompra_id", referencedColumnName="nOrdenCom_id")
     * })
     */
    private $nordencompra;



    /**
     * Get ndocordcomId
     *
     * @return integer 
     */
    public function getNdocordcomId()
    {
        return $this->ndocordcomId;
    }

    /**
     * Set ndocordcomformpag
     *
     * @param integer $ndocordcomformpag
     * @return LogDocordcom
     */
    public function setNdocordcomformpag($ndocordcomformpag)
    {
        $this->ndocordcomformpag = $ndocordcomformpag;
    
        return $this;
    }

    /**
     * Get ndocordcomformpag
     *
     * @return integer 
     */
    public function getNdocordcomformpag()
    {
        return $this->ndocordcomformpag;
    }

    /**
     * Set ndocordcomserie
     *
     * @param string $ndocordcomserie
     * @return LogDocordcom
     */
    public function setNdocordcomserie($ndocordcomserie)
    {
        $this->ndocordcomserie = $ndocordcomserie;
    
        return $this;
    }

    /**
     * Get ndocordcomserie
     *
     * @return string 
     */
    public function getNdocordcomserie()
    {
        return $this->ndocordcomserie;
    }

    /**
     * Set ndocordcomnro
     *
     * @param string $ndocordcomnro
     * @return LogDocordcom
     */
    public function setNdocordcomnro($ndocordcomnro)
    {
        $this->ndocordcomnro = $ndocordcomnro;
    
        return $this;
    }

    /**
     * Get ndocordcomnro
     *
     * @return string 
     */
    public function getNdocordcomnro()
    {
        return $this->ndocordcomnro;
    }

    /**
     * Set cdocordcomest
     *
     * @param string $cdocordcomest
     * @return LogDocordcom
     */
    public function setCdocordcomest($cdocordcomest)
    {
        $this->cdocordcomest = $cdocordcomest;
    
        return $this;
    }

    /**
     * Get cdocordcomest
     *
     * @return string 
     */
    public function getCdocordcomest()
    {
        return $this->cdocordcomest;
    }

    /**
     * Set ndocordcommodpag
     *
     * @param integer $ndocordcommodpag
     * @return LogDocordcom
     */
    public function setNdocordcommodpag($ndocordcommodpag)
    {
        $this->ndocordcommodpag = $ndocordcommodpag;
    
        return $this;
    }

    /**
     * Get ndocordcommodpag
     *
     * @return integer 
     */
    public function getNdocordcommodpag()
    {
        return $this->ndocordcommodpag;
    }

    /**
     * Set ndocordcomfecreg
     *
     * @param \DateTime $ndocordcomfecreg
     * @return LogDocordcom
     */
    public function setNdocordcomfecreg($ndocordcomfecreg)
    {
        $this->ndocordcomfecreg = $ndocordcomfecreg;
    
        return $this;
    }

    /**
     * Get ndocordcomfecreg
     *
     * @return \DateTime 
     */
    public function getNdocordcomfecreg()
    {
        return $this->ndocordcomfecreg;
    }

    /**
     * Set ddocordcomfecpag
     *
     * @param \DateTime $ddocordcomfecpag
     * @return LogDocordcom
     */
    public function setDdocordcomfecpag($ddocordcomfecpag)
    {
        $this->ddocordcomfecpag = $ddocordcomfecpag;
    
        return $this;
    }

    /**
     * Get ddocordcomfecpag
     *
     * @return \DateTime 
     */
    public function getDdocordcomfecpag()
    {
        return $this->ddocordcomfecpag;
    }

    /**
     * Set nordencompra
     *
     * @param Dicars\DataBundle\Entity\LogOrdcom $nordencompra
     * @return LogDocordcom
     */
    public function setNordencompra(\Dicars\DataBundle\Entity\LogOrdcom $nordencompra = null)
    {
        $this->nordencompra = $nordencompra;
    
        return $this;
    }

    /**
     * Get nordencompra
     *
     * @return Dicars\DataBundle\Entity\LogOrdcom 
     */
    public function getNordencompra()
    {
        return $this->nordencompra;
    }
}