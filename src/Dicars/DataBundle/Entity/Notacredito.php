<?php

namespace Dicars\DataBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Notacredito
 *
 * @ORM\Table(name="notacredito")
 * @ORM\Entity
 */
class Notacredito
{
    /**
     * @var integer
     *
     * @ORM\Column(name="nNotaCredito_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $nnotacreditoId;

    /**
     * @var string
     *
     * @ORM\Column(name="cNotaCreditoSerie", type="string", length=4, nullable=false)
     */
    private $cnotacreditoserie;

    /**
     * @var string
     *
     * @ORM\Column(name="cNotaCreditoNro", type="string", length=8, nullable=false)
     */
    private $cnotacreditonro;

    /**
     * @var \VenDocventa
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
     * Set cnotacreditonro
     *
     * @param string $cnotacreditonro
     * @return Notacredito
     */
    public function setCnotacreditonro($cnotacreditonro)
    {
        $this->cnotacreditonro = $cnotacreditonro;
    
        return $this;
    }

    /**
     * Get cnotacreditonro
     *
     * @return string 
     */
    public function getCnotacreditonro()
    {
        return $this->cnotacreditonro;
    }

    /**
     * Set ndocumento
     *
     * @param \Dicars\DataBundle\Entity\VenDocventa $ndocumento
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
     * @return \Dicars\DataBundle\Entity\VenDocventa 
     */
    public function getNdocumento()
    {
        return $this->ndocumento;
    }
}