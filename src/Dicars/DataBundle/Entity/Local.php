<?php

namespace Dicars\DataBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Dicars\DataBundle\Entity\Local
 *
 * @ORM\Table(name="local")
 * @ORM\Entity
 */
class Local
{
    /**
     * @var integer $nlocalId
     *
     * @ORM\Column(name="nLocal_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $nlocalId;

    /**
     * @var string $clocaldesc
     *
     * @ORM\Column(name="cLocalDesc", type="string", length=100, nullable=false)
     */
    private $clocaldesc;

    /**
     * @var integer $nlocalest
     *
     * @ORM\Column(name="nLocalEst", type="integer", nullable=false)
     */
    private $nlocalest;

    /**
     * @var string $clocaltelf
     *
     * @ORM\Column(name="cLocalTelf", type="string", length=12, nullable=false)
     */
    private $clocaltelf;

    /**
     * @var string $clocaldirec
     *
     * @ORM\Column(name="cLocalDirec", type="string", length=150, nullable=false)
     */
    private $clocaldirec;

    /**
     * @var integer $nlocaltiprub
     *
     * @ORM\Column(name="nLocalTipRub", type="integer", nullable=false)
     */
    private $nlocaltiprub;

    /**
     * @var Ubigeo
     *
     * @ORM\ManyToOne(targetEntity="Ubigeo")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="Ubigeo_nUbigeo_id", referencedColumnName="nUbigeo_id")
     * })
     */
    private $ubigeoNubigeo;



    /**
     * Get nlocalId
     *
     * @return integer 
     */
    public function getNlocalId()
    {
        return $this->nlocalId;
    }

    /**
     * Set clocaldesc
     *
     * @param string $clocaldesc
     * @return Local
     */
    public function setClocaldesc($clocaldesc)
    {
        $this->clocaldesc = $clocaldesc;
    
        return $this;
    }

    /**
     * Get clocaldesc
     *
     * @return string 
     */
    public function getClocaldesc()
    {
        return $this->clocaldesc;
    }

    /**
     * Set nlocalest
     *
     * @param integer $nlocalest
     * @return Local
     */
    public function setNlocalest($nlocalest)
    {
        $this->nlocalest = $nlocalest;
    
        return $this;
    }

    /**
     * Get nlocalest
     *
     * @return integer 
     */
    public function getNlocalest()
    {
        return $this->nlocalest;
    }

    /**
     * Set clocaltelf
     *
     * @param string $clocaltelf
     * @return Local
     */
    public function setClocaltelf($clocaltelf)
    {
        $this->clocaltelf = $clocaltelf;
    
        return $this;
    }

    /**
     * Get clocaltelf
     *
     * @return string 
     */
    public function getClocaltelf()
    {
        return $this->clocaltelf;
    }

    /**
     * Set clocaldirec
     *
     * @param string $clocaldirec
     * @return Local
     */
    public function setClocaldirec($clocaldirec)
    {
        $this->clocaldirec = $clocaldirec;
    
        return $this;
    }

    /**
     * Get clocaldirec
     *
     * @return string 
     */
    public function getClocaldirec()
    {
        return $this->clocaldirec;
    }

    /**
     * Set nlocaltiprub
     *
     * @param integer $nlocaltiprub
     * @return Local
     */
    public function setNlocaltiprub($nlocaltiprub)
    {
        $this->nlocaltiprub = $nlocaltiprub;
    
        return $this;
    }

    /**
     * Get nlocaltiprub
     *
     * @return integer 
     */
    public function getNlocaltiprub()
    {
        return $this->nlocaltiprub;
    }

    /**
     * Set ubigeoNubigeo
     *
     * @param Dicars\DataBundle\Entity\Ubigeo $ubigeoNubigeo
     * @return Local
     */
    public function setUbigeoNubigeo(\Dicars\DataBundle\Entity\Ubigeo $ubigeoNubigeo = null)
    {
        $this->ubigeoNubigeo = $ubigeoNubigeo;
    
        return $this;
    }

    /**
     * Get ubigeoNubigeo
     *
     * @return Dicars\DataBundle\Entity\Ubigeo 
     */
    public function getUbigeoNubigeo()
    {
        return $this->ubigeoNubigeo;
    }
}