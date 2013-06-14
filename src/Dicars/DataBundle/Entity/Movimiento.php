<?php

namespace Dicars\DataBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Movimiento
 *
 * @ORM\Table(name="movimiento")
 * @ORM\Entity
 */
class Movimiento
{
    /**
     * @var integer
     *
     * @ORM\Column(name="nMovimiento_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $nmovimientoId;

    /**
     * @var float
     *
     * @ORM\Column(name="nMovimientoMonto", type="decimal", nullable=false)
     */
    private $nmovimientomonto;

    /**
     * @var string
     *
     * @ORM\Column(name="cMovimientoConcepto", type="string", length=500, nullable=false)
     */
    private $cmovimientoconcepto;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dMovimientoFecReg", type="datetime", nullable=false)
     */
    private $dmovimientofecreg;

    /**
     * @var integer
     *
     * @ORM\Column(name="nMovimientoTip", type="integer", nullable=false)
     */
    private $nmovimientotip;

    /**
     * @var integer
     *
     * @ORM\Column(name="nMovimientoTipIng", type="integer", nullable=false)
     */
    private $nmovimientotiping;

    /**
     * @var \VenPersonal
     *
     * @ORM\ManyToOne(targetEntity="VenPersonal")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="nPersonal_id", referencedColumnName="nPersonal_id")
     * })
     */
    private $npersonal;



    /**
     * Get nmovimientoId
     *
     * @return integer 
     */
    public function getNmovimientoId()
    {
        return $this->nmovimientoId;
    }

    /**
     * Set nmovimientomonto
     *
     * @param float $nmovimientomonto
     * @return Movimiento
     */
    public function setNmovimientomonto($nmovimientomonto)
    {
        $this->nmovimientomonto = $nmovimientomonto;
    
        return $this;
    }

    /**
     * Get nmovimientomonto
     *
     * @return float 
     */
    public function getNmovimientomonto()
    {
        return $this->nmovimientomonto;
    }

    /**
     * Set cmovimientoconcepto
     *
     * @param string $cmovimientoconcepto
     * @return Movimiento
     */
    public function setCmovimientoconcepto($cmovimientoconcepto)
    {
        $this->cmovimientoconcepto = $cmovimientoconcepto;
    
        return $this;
    }

    /**
     * Get cmovimientoconcepto
     *
     * @return string 
     */
    public function getCmovimientoconcepto()
    {
        return $this->cmovimientoconcepto;
    }

    /**
     * Set dmovimientofecreg
     *
     * @param \DateTime $dmovimientofecreg
     * @return Movimiento
     */
    public function setDmovimientofecreg($dmovimientofecreg)
    {
        $this->dmovimientofecreg = $dmovimientofecreg;
    
        return $this;
    }

    /**
     * Get dmovimientofecreg
     *
     * @return \DateTime 
     */
    public function getDmovimientofecreg()
    {
        return $this->dmovimientofecreg;
    }

    /**
     * Set nmovimientotip
     *
     * @param integer $nmovimientotip
     * @return Movimiento
     */
    public function setNmovimientotip($nmovimientotip)
    {
        $this->nmovimientotip = $nmovimientotip;
    
        return $this;
    }

    /**
     * Get nmovimientotip
     *
     * @return integer 
     */
    public function getNmovimientotip()
    {
        return $this->nmovimientotip;
    }

    /**
     * Set nmovimientotiping
     *
     * @param integer $nmovimientotiping
     * @return Movimiento
     */
    public function setNmovimientotiping($nmovimientotiping)
    {
        $this->nmovimientotiping = $nmovimientotiping;
    
        return $this;
    }

    /**
     * Get nmovimientotiping
     *
     * @return integer 
     */
    public function getNmovimientotiping()
    {
        return $this->nmovimientotiping;
    }

    /**
     * Set npersonal
     *
     * @param \Dicars\DataBundle\Entity\VenPersonal $npersonal
     * @return Movimiento
     */
    public function setNpersonal(\Dicars\DataBundle\Entity\VenPersonal $npersonal = null)
    {
        $this->npersonal = $npersonal;
    
        return $this;
    }

    /**
     * Get npersonal
     *
     * @return \Dicars\DataBundle\Entity\VenPersonal 
     */
    public function getNpersonal()
    {
        return $this->npersonal;
    }
}