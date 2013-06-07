<?php

namespace Dicars\DataBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Dicars\DataBundle\Entity\VenPersonal
 *
 * @ORM\Table(name="ven_personal")
 * @ORM\Entity
 */
class VenPersonal
{
    /**
     * @var integer $npersonalId
     *
     * @ORM\Column(name="nPersonal_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $npersonalId;

    /**
     * @var string $cpersonaldni
     *
     * @ORM\Column(name="cPersonalDNI", type="string", length=8, nullable=false)
     */
    private $cpersonaldni;

    /**
     * @var string $cpersonalnom
     *
     * @ORM\Column(name="cPersonalNom", type="string", length=50, nullable=false)
     */
    private $cpersonalnom;

    /**
     * @var string $cpersonalape
     *
     * @ORM\Column(name="cPersonalApe", type="string", length=50, nullable=false)
     */
    private $cpersonalape;

    /**
     * @var string $cpersonaltelf
     *
     * @ORM\Column(name="cPersonalTelf", type="string", length=12, nullable=false)
     */
    private $cpersonaltelf;

    /**
     * @var string $cpersonalemail
     *
     * @ORM\Column(name="cPersonalEmail", type="string", length=100, nullable=false)
     */
    private $cpersonalemail;

    /**
     * @var \DateTime $dpersonalfec
     *
     * @ORM\Column(name="dPersonalFec", type="datetime", nullable=false)
     */
    private $dpersonalfec;

    /**
     * @var string $cpersonalsexo
     *
     * @ORM\Column(name="cPersonalSexo", type="string", length=1, nullable=false)
     */
    private $cpersonalsexo;

    /**
     * @var string $cpersonalest
     *
     * @ORM\Column(name="cPersonalEst", type="string", length=1, nullable=false)
     */
    private $cpersonalest;

    /**
     * @var string $cpersonaledad
     *
     * @ORM\Column(name="cPersonalEdad", type="string", length=3, nullable=false)
     */
    private $cpersonaledad;

    /**
     * @var VenCargo
     *
     * @ORM\ManyToOne(targetEntity="VenCargo")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="nCargo_id", referencedColumnName="nCargo_id")
     * })
     */
    private $ncargo;



    /**
     * Get npersonalId
     *
     * @return integer 
     */
    public function getNpersonalId()
    {
        return $this->npersonalId;
    }

    /**
     * Set cpersonaldni
     *
     * @param string $cpersonaldni
     * @return VenPersonal
     */
    public function setCpersonaldni($cpersonaldni)
    {
        $this->cpersonaldni = $cpersonaldni;
    
        return $this;
    }

    /**
     * Get cpersonaldni
     *
     * @return string 
     */
    public function getCpersonaldni()
    {
        return $this->cpersonaldni;
    }

    /**
     * Set cpersonalnom
     *
     * @param string $cpersonalnom
     * @return VenPersonal
     */
    public function setCpersonalnom($cpersonalnom)
    {
        $this->cpersonalnom = $cpersonalnom;
    
        return $this;
    }

    /**
     * Get cpersonalnom
     *
     * @return string 
     */
    public function getCpersonalnom()
    {
        return $this->cpersonalnom;
    }

    /**
     * Set cpersonalape
     *
     * @param string $cpersonalape
     * @return VenPersonal
     */
    public function setCpersonalape($cpersonalape)
    {
        $this->cpersonalape = $cpersonalape;
    
        return $this;
    }

    /**
     * Get cpersonalape
     *
     * @return string 
     */
    public function getCpersonalape()
    {
        return $this->cpersonalape;
    }

    /**
     * Set cpersonaltelf
     *
     * @param string $cpersonaltelf
     * @return VenPersonal
     */
    public function setCpersonaltelf($cpersonaltelf)
    {
        $this->cpersonaltelf = $cpersonaltelf;
    
        return $this;
    }

    /**
     * Get cpersonaltelf
     *
     * @return string 
     */
    public function getCpersonaltelf()
    {
        return $this->cpersonaltelf;
    }

    /**
     * Set cpersonalemail
     *
     * @param string $cpersonalemail
     * @return VenPersonal
     */
    public function setCpersonalemail($cpersonalemail)
    {
        $this->cpersonalemail = $cpersonalemail;
    
        return $this;
    }

    /**
     * Get cpersonalemail
     *
     * @return string 
     */
    public function getCpersonalemail()
    {
        return $this->cpersonalemail;
    }

    /**
     * Set dpersonalfec
     *
     * @param \DateTime $dpersonalfec
     * @return VenPersonal
     */
    public function setDpersonalfec($dpersonalfec)
    {
        $this->dpersonalfec = $dpersonalfec;
    
        return $this;
    }

    /**
     * Get dpersonalfec
     *
     * @return \DateTime 
     */
    public function getDpersonalfec()
    {
        return $this->dpersonalfec;
    }

    /**
     * Set cpersonalsexo
     *
     * @param string $cpersonalsexo
     * @return VenPersonal
     */
    public function setCpersonalsexo($cpersonalsexo)
    {
        $this->cpersonalsexo = $cpersonalsexo;
    
        return $this;
    }

    /**
     * Get cpersonalsexo
     *
     * @return string 
     */
    public function getCpersonalsexo()
    {
        return $this->cpersonalsexo;
    }

    /**
     * Set cpersonalest
     *
     * @param string $cpersonalest
     * @return VenPersonal
     */
    public function setCpersonalest($cpersonalest)
    {
        $this->cpersonalest = $cpersonalest;
    
        return $this;
    }

    /**
     * Get cpersonalest
     *
     * @return string 
     */
    public function getCpersonalest()
    {
        return $this->cpersonalest;
    }

    /**
     * Set cpersonaledad
     *
     * @param string $cpersonaledad
     * @return VenPersonal
     */
    public function setCpersonaledad($cpersonaledad)
    {
        $this->cpersonaledad = $cpersonaledad;
    
        return $this;
    }

    /**
     * Get cpersonaledad
     *
     * @return string 
     */
    public function getCpersonaledad()
    {
        return $this->cpersonaledad;
    }

    /**
     * Set ncargo
     *
     * @param Dicars\DataBundle\Entity\VenCargo $ncargo
     * @return VenPersonal
     */
    public function setNcargo(\Dicars\DataBundle\Entity\VenCargo $ncargo = null)
    {
        $this->ncargo = $ncargo;
    
        return $this;
    }

    /**
     * Get ncargo
     *
     * @return Dicars\DataBundle\Entity\VenCargo 
     */
    public function getNcargo()
    {
        return $this->ncargo;
    }
}