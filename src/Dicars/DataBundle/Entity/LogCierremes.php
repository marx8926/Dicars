<?php

namespace Dicars\DataBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Dicars\DataBundle\Entity\LogCierremes
 *
 * @ORM\Table(name="log_cierremes")
 * @ORM\Entity
 */
class LogCierremes
{
    /**
     * @var integer $ncierremesId
     *
     * @ORM\Column(name="nCierreMes_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $ncierremesId;

    /**
     * @var \DateTime $dcierremesfecinicio
     *
     * @ORM\Column(name="dCierreMesFecInicio", type="datetime", nullable=false)
     */
    private $dcierremesfecinicio;

    /**
     * @var \DateTime $dcierremesfecfin
     *
     * @ORM\Column(name="dCierreMesFecFin", type="datetime", nullable=false)
     */
    private $dcierremesfecfin;

    /**
     * @var integer $ncierremesnro
     *
     * @ORM\Column(name="nCierreMesNro", type="integer", nullable=false)
     */
    private $ncierremesnro;

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
     * Get ncierremesId
     *
     * @return integer 
     */
    public function getNcierremesId()
    {
        return $this->ncierremesId;
    }

    /**
     * Set dcierremesfecinicio
     *
     * @param \DateTime $dcierremesfecinicio
     * @return LogCierremes
     */
    public function setDcierremesfecinicio($dcierremesfecinicio)
    {
        $this->dcierremesfecinicio = $dcierremesfecinicio;
    
        return $this;
    }

    /**
     * Get dcierremesfecinicio
     *
     * @return \DateTime 
     */
    public function getDcierremesfecinicio()
    {
        return $this->dcierremesfecinicio;
    }

    /**
     * Set dcierremesfecfin
     *
     * @param \DateTime $dcierremesfecfin
     * @return LogCierremes
     */
    public function setDcierremesfecfin($dcierremesfecfin)
    {
        $this->dcierremesfecfin = $dcierremesfecfin;
    
        return $this;
    }

    /**
     * Get dcierremesfecfin
     *
     * @return \DateTime 
     */
    public function getDcierremesfecfin()
    {
        return $this->dcierremesfecfin;
    }

    /**
     * Set ncierremesnro
     *
     * @param integer $ncierremesnro
     * @return LogCierremes
     */
    public function setNcierremesnro($ncierremesnro)
    {
        $this->ncierremesnro = $ncierremesnro;
    
        return $this;
    }

    /**
     * Get ncierremesnro
     *
     * @return integer 
     */
    public function getNcierremesnro()
    {
        return $this->ncierremesnro;
    }

    /**
     * Set nlocal
     *
     * @param Dicars\DataBundle\Entity\Local $nlocal
     * @return LogCierremes
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
}