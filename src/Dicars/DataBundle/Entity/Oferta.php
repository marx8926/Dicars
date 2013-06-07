<?php

namespace Dicars\DataBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Dicars\DataBundle\Entity\Oferta
 *
 * @ORM\Table(name="oferta")
 * @ORM\Entity
 */
class Oferta
{
    /**
     * @var integer $nofertaId
     *
     * @ORM\Column(name="nOferta_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $nofertaId;

    /**
     * @var string $cofertadesc
     *
     * @ORM\Column(name="cOfertaDesc", type="string", length=100, nullable=false)
     */
    private $cofertadesc;



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
}