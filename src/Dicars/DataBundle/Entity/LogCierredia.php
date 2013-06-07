<?php

namespace Dicars\DataBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Dicars\DataBundle\Entity\LogCierredia
 *
 * @ORM\Table(name="log_cierredia")
 * @ORM\Entity
 */
class LogCierredia
{
    /**
     * @var integer $ncierrediaId
     *
     * @ORM\Column(name="nCierreDia_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $ncierrediaId;

    /**
     * @var \DateTime $ncierrefecha
     *
     * @ORM\Column(name="nCierreFecha", type="date", nullable=false)
     */
    private $ncierrefecha;

    /**
     * @var string $ccierredia
     *
     * @ORM\Column(name="cCierreDia", type="string", length=12, nullable=false)
     */
    private $ccierredia;

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
     * Get ncierrediaId
     *
     * @return integer 
     */
    public function getNcierrediaId()
    {
        return $this->ncierrediaId;
    }

    /**
     * Set ncierrefecha
     *
     * @param \DateTime $ncierrefecha
     * @return LogCierredia
     */
    public function setNcierrefecha($ncierrefecha)
    {
        $this->ncierrefecha = $ncierrefecha;
    
        return $this;
    }

    /**
     * Get ncierrefecha
     *
     * @return \DateTime 
     */
    public function getNcierrefecha()
    {
        return $this->ncierrefecha;
    }

    /**
     * Set ccierredia
     *
     * @param string $ccierredia
     * @return LogCierredia
     */
    public function setCcierredia($ccierredia)
    {
        $this->ccierredia = $ccierredia;
    
        return $this;
    }

    /**
     * Get ccierredia
     *
     * @return string 
     */
    public function getCcierredia()
    {
        return $this->ccierredia;
    }

    /**
     * Set nlocal
     *
     * @param Dicars\DataBundle\Entity\Local $nlocal
     * @return LogCierredia
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