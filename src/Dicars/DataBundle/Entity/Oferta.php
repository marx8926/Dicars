<?php

namespace Dicars\DataBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Oferta
 *
 * @ORM\Table(name="oferta")
 * @ORM\Entity
 */
class Oferta
{
    /**
     * @var integer
     *
     * @ORM\Column(name="nOferta_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $nofertaId;

    /**
     * @var string
     *
     * @ORM\Column(name="cOfertaDesc", type="string", length=100, nullable=false)
     */
    private $cofertadesc;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dOfertaFecVigente", type="datetime", nullable=false)
     */
    private $dofertafecvigente;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dOfertaFecVencto", type="datetime", nullable=false)
     */
    private $dofertafecvencto;

    /**
     * @var integer
     *
     * @ORM\Column(name="nOfertaPorc", type="integer", nullable=false)
     */
    private $nofertaporc;



    /**
     * Get nofertaId
     *
     * @return integer 
     */
    public function getNofertaId()
    {
        return $this->nofertaId;
    }

    /**
     * Set cofertadesc
     *
     * @param string $cofertadesc
     * @return Oferta
     */
    public function setCofertadesc($cofertadesc)
    {
        $this->cofertadesc = $cofertadesc;
    
        return $this;
    }

    /**
     * Get cofertadesc
     *
     * @return string 
     */
    public function getCofertadesc()
    {
        return $this->cofertadesc;
    }

    /**
     * Set dofertafecvigente
     *
     * @param \DateTime $dofertafecvigente
     * @return Oferta
     */
    public function setDofertafecvigente($dofertafecvigente)
    {
        $this->dofertafecvigente = $dofertafecvigente;
    
        return $this;
    }

    /**
     * Get dofertafecvigente
     *
     * @return \DateTime 
     */
    public function getDofertafecvigente()
    {
        return $this->dofertafecvigente;
    }

    /**
     * Set dofertafecvencto
     *
     * @param \DateTime $dofertafecvencto
     * @return Oferta
     */
    public function setDofertafecvencto($dofertafecvencto)
    {
        $this->dofertafecvencto = $dofertafecvencto;
    
        return $this;
    }

    /**
     * Get dofertafecvencto
     *
     * @return \DateTime 
     */
    public function getDofertafecvencto()
    {
        return $this->dofertafecvencto;
    }

    /**
     * Set nofertaporc
     *
     * @param integer $nofertaporc
     * @return Oferta
     */
    public function setNofertaporc($nofertaporc)
    {
        $this->nofertaporc = $nofertaporc;
    
        return $this;
    }

    /**
     * Get nofertaporc
     *
     * @return integer 
     */
    public function getNofertaporc()
    {
        return $this->nofertaporc;
    }
}