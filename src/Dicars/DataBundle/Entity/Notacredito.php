<?php

namespace Dicars\DataBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Dicars\DataBundle\Entity\Notacredito
 *
 * @ORM\Table(name="notacredito")
 * @ORM\Entity
 */
class Notacredito
{
    /**
     * @var integer $nnotacreditoId
     *
     * @ORM\Column(name="nNotaCredito_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $nnotacreditoId;

    /**
     * @var string $cnotacreditoserie
     *
     * @ORM\Column(name="cNotaCreditoSerie", type="string", length=4, nullable=false)
     */
    private $cnotacreditoserie;

    /**
     * @var string $cnotacreditonum
     *
     * @ORM\Column(name="cNotaCreditoNum", type="string", length=8, nullable=false)
     */
    private $cnotacreditonum;

    /**
     * @var VenDocventa
     *
     * @ORM\ManyToOne(targetEntity="VenDocventa")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="nDocumento_id", referencedColumnName="nDocumento_id")
     * })
     */
    private $ndocumento;



    /**
     * Get nnotacreditoId
     *
     * @return integer 
     */
    public function getNnotacreditoId()
    {
        return $this->nnotacreditoId;
    }

    /**
     * Set cnotacreditoserie
     *
     * @param string $cnotacreditoserie
     * @return Notacredito
     */
    public function setCnotacreditoserie($cnotacreditoserie)
    {
        $this->cnotacreditoserie = $cnotacreditoserie;
    
        return $this;
    }

    /**
     * Get cnotacreditoserie
     *
     * @return string 
     */
    public function getCnotacreditoserie()
    {
        return $this->cnotacreditoserie;
    }

    /**
     * Set cnotacreditonum
     *
     * @param string $cnotacreditonum
     * @return Notacredito
     */
    public function setCnotacreditonum($cnotacreditonum)
    {
        $this->cnotacreditonum = $cnotacreditonum;
    
        return $this;
    }

    /**
     * Get cnotacreditonum
     *
     * @return string 
     */
    public function getCnotacreditonum()
    {
        return $this->cnotacreditonum;
    }

    /**
     * Set ndocumento
     *
     * @param Dicars\DataBundle\Entity\VenDocventa $ndocumento
     * @return Notacredito
     */
    public function setNdocumento(\Dicars\DataBundle\Entity\VenDocventa $ndocumento = null)
    {
        $this->ndocumento = $ndocumento;
    
        return $this;
    }

    /**
     * Get ndocumento
     *
     * @return Dicars\DataBundle\Entity\VenDocventa 
     */
    public function getNdocumento()
    {
        return $this->ndocumento;
    }
}