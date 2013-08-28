<?php

namespace Dicars\DataBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * VenTipoigv
 *
 * @ORM\Table(name="ven_tipoigv")
 * @ORM\Entity
 */
class VenTipoigv
{
    /**
     * @var integer
     *
     * @ORM\Column(name="nTipoIGV", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $ntipoigv;

    /**
     * @var string
     *
     * @ORM\Column(name="cTipoIGV", type="string", length=100, nullable=false)
     */
    private $ctipoigv;

    /**
     * @var string
     *
     * @ORM\Column(name="nTipoIGVProc", type="decimal", nullable=false)
     */
    private $ntipoigvproc;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dTipoIGVFecReg", type="datetime", nullable=false)
     */
    private $dtipoigvfecreg;

    /**
     * @var string
     *
     * @ORM\Column(name="cTipoIGVEst", type="string", length=1, nullable=false)
     */
    private $ctipoigvest;



    /**
     * Get ntipoigv
     *
     * @return integer 
     */
    public function getNtipoigv()
    {
        return $this->ntipoigv;
    }

    /**
     * Set ctipoigv
     *
     * @param string $ctipoigv
     * @return VenTipoigv
     */
    public function setCtipoigv($ctipoigv)
    {
        $this->ctipoigv = $ctipoigv;
    
        return $this;
    }

    /**
     * Get ctipoigv
     *
     * @return string 
     */
    public function getCtipoigv()
    {
        return $this->ctipoigv;
    }

    /**
     * Set ntipoigvproc
     *
     * @param string $ntipoigvproc
     * @return VenTipoigv
     */
    public function setNtipoigvproc($ntipoigvproc)
    {
        $this->ntipoigvproc = $ntipoigvproc;
    
        return $this;
    }

    /**
     * Get ntipoigvproc
     *
     * @return string 
     */
    public function getNtipoigvproc()
    {
        return $this->ntipoigvproc;
    }

    /**
     * Set dtipoigvfecreg
     *
     * @param \DateTime $dtipoigvfecreg
     * @return VenTipoigv
     */
    public function setDtipoigvfecreg($dtipoigvfecreg)
    {
        $this->dtipoigvfecreg = $dtipoigvfecreg;
    
        return $this;
    }

    /**
     * Get dtipoigvfecreg
     *
     * @return \DateTime 
     */
    public function getDtipoigvfecreg()
    {
        return $this->dtipoigvfecreg;
    }

    /**
     * Set ctipoigvest
     *
     * @param string $ctipoigvest
     * @return VenTipoigv
     */
    public function setCtipoigvest($ctipoigvest)
    {
        $this->ctipoigvest = $ctipoigvest;
    
        return $this;
    }

    /**
     * Get ctipoigvest
     *
     * @return string 
     */
    public function getCtipoigvest()
    {
        return $this->ctipoigvest;
    }
}