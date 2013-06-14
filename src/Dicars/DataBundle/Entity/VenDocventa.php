<?php

namespace Dicars\DataBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * VenDocventa
 *
 * @ORM\Table(name="ven_docventa")
 * @ORM\Entity
 */
class VenDocventa
{
    /**
     * @var integer
     *
     * @ORM\Column(name="nDocumento_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $ndocumentoId;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dDocVentaFecEms", type="datetime", nullable=false)
     */
    private $ddocventafecems;

    /**
     * @var integer
     *
     * @ORM\Column(name="nDocVentaTipDoc", type="integer", nullable=false)
     */
    private $ndocventatipdoc;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dDocVentaFecVenc", type="datetime", nullable=false)
     */
    private $ddocventafecvenc;

    /**
     * @var \VenVenta
     *
     * @ORM\ManyToOne(targetEntity="VenVenta")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="nVenta_id", referencedColumnName="nVenta_id")
     * })
     */
    private $nventa;



    /**
     * Get ndocumentoId
     *
     * @return integer 
     */
    public function getNdocumentoId()
    {
        return $this->ndocumentoId;
    }

    /**
     * Set ddocventafecems
     *
     * @param \DateTime $ddocventafecems
     * @return VenDocventa
     */
    public function setDdocventafecems($ddocventafecems)
    {
        $this->ddocventafecems = $ddocventafecems;
    
        return $this;
    }

    /**
     * Get ddocventafecems
     *
     * @return \DateTime 
     */
    public function getDdocventafecems()
    {
        return $this->ddocventafecems;
    }

    /**
     * Set ndocventatipdoc
     *
     * @param integer $ndocventatipdoc
     * @return VenDocventa
     */
    public function setNdocventatipdoc($ndocventatipdoc)
    {
        $this->ndocventatipdoc = $ndocventatipdoc;
    
        return $this;
    }

    /**
     * Get ndocventatipdoc
     *
     * @return integer 
     */
    public function getNdocventatipdoc()
    {
        return $this->ndocventatipdoc;
    }

    /**
     * Set ddocventafecvenc
     *
     * @param \DateTime $ddocventafecvenc
     * @return VenDocventa
     */
    public function setDdocventafecvenc($ddocventafecvenc)
    {
        $this->ddocventafecvenc = $ddocventafecvenc;
    
        return $this;
    }

    /**
     * Get ddocventafecvenc
     *
     * @return \DateTime 
     */
    public function getDdocventafecvenc()
    {
        return $this->ddocventafecvenc;
    }

    /**
     * Set nventa
     *
     * @param \Dicars\DataBundle\Entity\VenVenta $nventa
     * @return VenDocventa
     */
    public function setNventa(\Dicars\DataBundle\Entity\VenVenta $nventa = null)
    {
        $this->nventa = $nventa;
    
        return $this;
    }

    /**
     * Get nventa
     *
     * @return \Dicars\DataBundle\Entity\VenVenta 
     */
    public function getNventa()
    {
        return $this->nventa;
    }
}