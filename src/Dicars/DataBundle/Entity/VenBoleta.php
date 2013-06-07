<?php

namespace Dicars\DataBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Dicars\DataBundle\Entity\VenBoleta
 *
 * @ORM\Table(name="ven_boleta")
 * @ORM\Entity
 */
class VenBoleta
{
    /**
     * @var integer $nboletaId
     *
     * @ORM\Column(name="nBoleta_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $nboletaId;

    /**
     * @var string $cboletaserie
     *
     * @ORM\Column(name="cBoletaSerie", type="string", length=4, nullable=false)
     */
    private $cboletaserie;

    /**
     * @var string $cboletanro
     *
     * @ORM\Column(name="cBoletaNro", type="string", length=8, nullable=false)
     */
    private $cboletanro;

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
     * Get nboletaId
     *
     * @return integer 
     */
    public function getNboletaId()
    {
        return $this->nboletaId;
    }

    /**
     * Set cboletaserie
     *
     * @param string $cboletaserie
     * @return VenBoleta
     */
    public function setCboletaserie($cboletaserie)
    {
        $this->cboletaserie = $cboletaserie;
    
        return $this;
    }

    /**
     * Get cboletaserie
     *
     * @return string 
     */
    public function getCboletaserie()
    {
        return $this->cboletaserie;
    }

    /**
     * Set cboletanro
     *
     * @param string $cboletanro
     * @return VenBoleta
     */
    public function setCboletanro($cboletanro)
    {
        $this->cboletanro = $cboletanro;
    
        return $this;
    }

    /**
     * Get cboletanro
     *
     * @return string 
     */
    public function getCboletanro()
    {
        return $this->cboletanro;
    }

    /**
     * Set ndocumento
     *
     * @param Dicars\DataBundle\Entity\VenDocventa $ndocumento
     * @return VenBoleta
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