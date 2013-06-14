<?php

namespace Dicars\DataBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * VenFactura
 *
 * @ORM\Table(name="ven_factura")
 * @ORM\Entity
 */
class VenFactura
{
    /**
     * @var integer
     *
     * @ORM\Column(name="nFactura_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $nfacturaId;

    /**
     * @var string
     *
     * @ORM\Column(name="cFacturaNro", type="string", length=8, nullable=false)
     */
    private $cfacturanro;

    /**
     * @var string
     *
     * @ORM\Column(name="cFacturaSerie", type="string", length=4, nullable=false)
     */
    private $cfacturaserie;

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
     * Get nfacturaId
     *
     * @return integer 
     */
    public function getNfacturaId()
    {
        return $this->nfacturaId;
    }

    /**
     * Set cfacturanro
     *
     * @param string $cfacturanro
     * @return VenFactura
     */
    public function setCfacturanro($cfacturanro)
    {
        $this->cfacturanro = $cfacturanro;
    
        return $this;
    }

    /**
     * Get cfacturanro
     *
     * @return string 
     */
    public function getCfacturanro()
    {
        return $this->cfacturanro;
    }

    /**
     * Set cfacturaserie
     *
     * @param string $cfacturaserie
     * @return VenFactura
     */
    public function setCfacturaserie($cfacturaserie)
    {
        $this->cfacturaserie = $cfacturaserie;
    
        return $this;
    }

    /**
     * Get cfacturaserie
     *
     * @return string 
     */
    public function getCfacturaserie()
    {
        return $this->cfacturaserie;
    }

    /**
     * Set ndocumento
     *
     * @param \Dicars\DataBundle\Entity\VenDocventa $ndocumento
     * @return VenFactura
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