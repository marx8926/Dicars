<?php

namespace Dicars\DataBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Local
 *
 * @ORM\Table(name="local")
 * @ORM\Entity
 */
class Local
{
    /**
     * @var integer
     *
     * @ORM\Column(name="nLocal_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $nlocalId;

    /**
     * @var string
     *
     * @ORM\Column(name="cLocalDesc", type="string", length=100, nullable=false)
     */
    private $clocaldesc;

    /**
     * @var integer
     *
     * @ORM\Column(name="nLocalEst", type="integer", nullable=false)
     */
    private $nlocalest;

    /**
     * @var string
     *
     * @ORM\Column(name="cLocalTelf", type="string", length=12, nullable=false)
     */
    private $clocaltelf;

    /**
     * @var string
     *
     * @ORM\Column(name="cLocalDirec", type="string", length=150, nullable=false)
     */
    private $clocaldirec;

    /**
     * @var integer
     *
     * @ORM\Column(name="nLocalTipRub", type="integer", nullable=false)
     */
    private $nlocaltiprub;

    /**
     * @var \Ubigeo
     *
     * @ORM\ManyToOne(targetEntity="Ubigeo")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="nUbigeo_id", referencedColumnName="nUbigeo_id")
     * })
     */
    private $nubigeo;



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
     * Set nubigeo
     *
     * @param \Dicars\DataBundle\Entity\Ubigeo $nubigeo
     * @return Local
     */
    public function setNubigeo(\Dicars\DataBundle\Entity\Ubigeo $nubigeo = null)
    {
        $this->nubigeo = $nubigeo;
    
        return $this;
    }

    /**
     * Get nubigeo
     *
     * @return \Dicars\DataBundle\Entity\Ubigeo 
     */
    public function getNubigeo()
    {
        return $this->nubigeo;
    }
}