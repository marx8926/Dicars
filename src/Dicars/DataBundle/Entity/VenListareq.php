<?php

namespace Dicars\DataBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Dicars\DataBundle\Entity\VenListareq
 *
 * @ORM\Table(name="ven_listareq")
 * @ORM\Entity
 */
class VenListareq
{
    /**
     * @var integer $nlistareqId
     *
     * @ORM\Column(name="nListaReq_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $nlistareqId;

    /**
     * @var integer $nlistareqtipo
     *
     * @ORM\Column(name="nListaReqTipo", type="integer", nullable=false)
     */
    private $nlistareqtipo;

    /**
     * @var string $clistareqobs
     *
     * @ORM\Column(name="cListaReqObs", type="string", length=500, nullable=false)
     */
    private $clistareqobs;

    /**
     * @var string $clistareqest
     *
     * @ORM\Column(name="cListaReqEst", type="string", length=1, nullable=false)
     */
    private $clistareqest;

    /**
     * @var VenCliente
     *
     * @ORM\ManyToOne(targetEntity="VenCliente")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="nCliente_id", referencedColumnName="nCliente_id")
     * })
     */
    private $ncliente;



    /**
     * Get nlistareqId
     *
     * @return integer 
     */
    public function getNlistareqId()
    {
        return $this->nlistareqId;
    }

    /**
     * Set nlistareqtipo
     *
     * @param integer $nlistareqtipo
     * @return VenListareq
     */
    public function setNlistareqtipo($nlistareqtipo)
    {
        $this->nlistareqtipo = $nlistareqtipo;
    
        return $this;
    }

    /**
     * Get nlistareqtipo
     *
     * @return integer 
     */
    public function getNlistareqtipo()
    {
        return $this->nlistareqtipo;
    }

    /**
     * Set clistareqobs
     *
     * @param string $clistareqobs
     * @return VenListareq
     */
    public function setClistareqobs($clistareqobs)
    {
        $this->clistareqobs = $clistareqobs;
    
        return $this;
    }

    /**
     * Get clistareqobs
     *
     * @return string 
     */
    public function getClistareqobs()
    {
        return $this->clistareqobs;
    }

    /**
     * Set clistareqest
     *
     * @param string $clistareqest
     * @return VenListareq
     */
    public function setClistareqest($clistareqest)
    {
        $this->clistareqest = $clistareqest;
    
        return $this;
    }

    /**
     * Get clistareqest
     *
     * @return string 
     */
    public function getClistareqest()
    {
        return $this->clistareqest;
    }

    /**
     * Set ncliente
     *
     * @param Dicars\DataBundle\Entity\VenCliente $ncliente
     * @return VenListareq
     */
    public function setNcliente(\Dicars\DataBundle\Entity\VenCliente $ncliente = null)
    {
        $this->ncliente = $ncliente;
    
        return $this;
    }

    /**
     * Get ncliente
     *
     * @return Dicars\DataBundle\Entity\VenCliente 
     */
    public function getNcliente()
    {
        return $this->ncliente;
    }
}