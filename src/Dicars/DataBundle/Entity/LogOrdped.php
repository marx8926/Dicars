<?php

namespace Dicars\DataBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * LogOrdped
 *
 * @ORM\Table(name="log_ordped")
 * @ORM\Entity
 */
class LogOrdped
{
    /**
     * @var integer
     *
     * @ORM\Column(name="nOrdPed_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $nordpedId;

    /**
     * @var string
     *
     * @ORM\Column(name="cOrdPedSerie", type="string", length=4, nullable=false)
     */
    private $cordpedserie;

    /**
     * @var string
     *
     * @ORM\Column(name="cOrdPedNro", type="string", length=8, nullable=false)
     */
    private $cordpednro;

    /**
     * @var string
     *
     * @ORM\Column(name="cOrdPedEnvEmail", type="string", length=1, nullable=false)
     */
    private $cordpedenvemail;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dOrdPedFecReg", type="datetime", nullable=false)
     */
    private $dordpedfecreg;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dOrdePedFecEnt", type="datetime", nullable=false)
     */
    private $dordepedfecent;

    /**
     * @var string
     *
     * @ORM\Column(name="cOrdPedObsv", type="string", length=500, nullable=false)
     */
    private $cordpedobsv;

    /**
     * @var string
     *
     * @ORM\Column(name="cOrdPedEst", type="string", length=1, nullable=false)
     */
    private $cordpedest;

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
     * @var \Local
     *
     * @ORM\ManyToOne(targetEntity="Local")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="nLocal_id", referencedColumnName="nLocal_id")
     * })
     */
    private $nlocal;



    /**
     * Get nordpedId
     *
     * @return integer 
     */
    public function getNordpedId()
    {
        return $this->nordpedId;
    }

    /**
     * Set cordpedserie
     *
     * @param string $cordpedserie
     * @return LogOrdped
     */
    public function setCordpedserie($cordpedserie)
    {
        $this->cordpedserie = $cordpedserie;
    
        return $this;
    }

    /**
     * Get cordpedserie
     *
     * @return string 
     */
    public function getCordpedserie()
    {
        return $this->cordpedserie;
    }

    /**
     * Set cordpednro
     *
     * @param string $cordpednro
     * @return LogOrdped
     */
    public function setCordpednro($cordpednro)
    {
        $this->cordpednro = $cordpednro;
    
        return $this;
    }

    /**
     * Get cordpednro
     *
     * @return string 
     */
    public function getCordpednro()
    {
        return $this->cordpednro;
    }

    /**
     * Set cordpedenvemail
     *
     * @param string $cordpedenvemail
     * @return LogOrdped
     */
    public function setCordpedenvemail($cordpedenvemail)
    {
        $this->cordpedenvemail = $cordpedenvemail;
    
        return $this;
    }

    /**
     * Get cordpedenvemail
     *
     * @return string 
     */
    public function getCordpedenvemail()
    {
        return $this->cordpedenvemail;
    }

    /**
     * Set dordpedfecreg
     *
     * @param \DateTime $dordpedfecreg
     * @return LogOrdped
     */
    public function setDordpedfecreg($dordpedfecreg)
    {
        $this->dordpedfecreg = $dordpedfecreg;
    
        return $this;
    }

    /**
     * Get dordpedfecreg
     *
     * @return \DateTime 
     */
    public function getDordpedfecreg()
    {
        return $this->dordpedfecreg;
    }

    /**
     * Set dordepedfecent
     *
     * @param \DateTime $dordepedfecent
     * @return LogOrdped
     */
    public function setDordepedfecent($dordepedfecent)
    {
        $this->dordepedfecent = $dordepedfecent;
    
        return $this;
    }

    /**
     * Get dordepedfecent
     *
     * @return \DateTime 
     */
    public function getDordepedfecent()
    {
        return $this->dordepedfecent;
    }

    /**
     * Set cordpedobsv
     *
     * @param string $cordpedobsv
     * @return LogOrdped
     */
    public function setCordpedobsv($cordpedobsv)
    {
        $this->cordpedobsv = $cordpedobsv;
    
        return $this;
    }

    /**
     * Get cordpedobsv
     *
     * @return string 
     */
    public function getCordpedobsv()
    {
        return $this->cordpedobsv;
    }

    /**
     * Set cordpedest
     *
     * @param string $cordpedest
     * @return LogOrdped
     */
    public function setCordpedest($cordpedest)
    {
        $this->cordpedest = $cordpedest;
    
        return $this;
    }

    /**
     * Get cordpedest
     *
     * @return string 
     */
    public function getCordpedest()
    {
        return $this->cordpedest;
    }

    /**
     * Set npersonal
     *
     * @param \Dicars\DataBundle\Entity\VenPersonal $npersonal
     * @return LogOrdped
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
     * Set nlocal
     *
     * @param \Dicars\DataBundle\Entity\Local $nlocal
     * @return LogOrdped
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
}