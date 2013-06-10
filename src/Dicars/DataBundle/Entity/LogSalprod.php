<?php

namespace Dicars\DataBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Dicars\DataBundle\Entity\LogSalprod
 *
 * @ORM\Table(name="log_salprod")
 * @ORM\Entity
 */
class LogSalprod
{
    /**
     * @var integer $nsalprodId
     *
     * @ORM\Column(name="nSalProd_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $nsalprodId;

    /**
     * @var string $csalprodserie
     *
     * @ORM\Column(name="cSalProdSerie", type="string", length=4, nullable=false)
     */
    private $csalprodserie;

    /**
     * @var string $csalprodnro
     *
     * @ORM\Column(name="cSalProdNro", type="string", length=8, nullable=false)
     */
    private $csalprodnro;

    /**
     * @var \DateTime $dsalprodfecreg
     *
     * @ORM\Column(name="dSalProdFecReg", type="datetime", nullable=false)
     */
    private $dsalprodfecreg;

    /**
     * @var integer $nsalprodmotivo
     *
     * @ORM\Column(name="nSalProdMotivo", type="integer", nullable=false)
     */
    private $nsalprodmotivo;

    /**
     * @var integer $nsolicitanteId
     *
     * @ORM\Column(name="nSolicitante_id", type="integer", nullable=false)
     */
    private $nsolicitanteId;

    /**
     * @var string $csalprodobsv
     *
     * @ORM\Column(name="cSalProdObsv", type="string", length=500, nullable=false)
     */
    private $csalprodobsv;

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
     * @var VenPersonal
     *
     * @ORM\ManyToOne(targetEntity="VenPersonal")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="nPersonal_id", referencedColumnName="nPersonal_id")
     * })
     */
    private $npersonal;



    /**
     * Get nsalprodId
     *
     * @return integer 
     */
    public function getNsalprodId()
    {
        return $this->nsalprodId;
    }

    /**
     * Set csalprodserie
     *
     * @param string $csalprodserie
     * @return LogSalprod
     */
    public function setCsalprodserie($csalprodserie)
    {
        $this->csalprodserie = $csalprodserie;
    
        return $this;
    }

    /**
     * Get csalprodserie
     *
     * @return string 
     */
    public function getCsalprodserie()
    {
        return $this->csalprodserie;
    }

    /**
     * Set csalprodnro
     *
     * @param string $csalprodnro
     * @return LogSalprod
     */
    public function setCsalprodnro($csalprodnro)
    {
        $this->csalprodnro = $csalprodnro;
    
        return $this;
    }

    /**
     * Get csalprodnro
     *
     * @return string 
     */
    public function getCsalprodnro()
    {
        return $this->csalprodnro;
    }

    /**
     * Set dsalprodfecreg
     *
     * @param \DateTime $dsalprodfecreg
     * @return LogSalprod
     */
    public function setDsalprodfecreg($dsalprodfecreg)
    {
        $this->dsalprodfecreg = $dsalprodfecreg;
    
        return $this;
    }

    /**
     * Get dsalprodfecreg
     *
     * @return \DateTime 
     */
    public function getDsalprodfecreg()
    {
        return $this->dsalprodfecreg;
    }

    /**
     * Set nsalprodmotivo
     *
     * @param integer $nsalprodmotivo
     * @return LogSalprod
     */
    public function setNsalprodmotivo($nsalprodmotivo)
    {
        $this->nsalprodmotivo = $nsalprodmotivo;
    
        return $this;
    }

    /**
     * Get nsalprodmotivo
     *
     * @return integer 
     */
    public function getNsalprodmotivo()
    {
        return $this->nsalprodmotivo;
    }

    /**
     * Set nsolicitanteId
     *
     * @param integer $nsolicitanteId
     * @return LogSalprod
     */
    public function setNsolicitanteId($nsolicitanteId)
    {
        $this->nsolicitanteId = $nsolicitanteId;
    
        return $this;
    }

    /**
     * Get nsolicitanteId
     *
     * @return integer 
     */
    public function getNsolicitanteId()
    {
        return $this->nsolicitanteId;
    }

    /**
     * Set csalprodobsv
     *
     * @param string $csalprodobsv
     * @return LogSalprod
     */
    public function setCsalprodobsv($csalprodobsv)
    {
        $this->csalprodobsv = $csalprodobsv;
    
        return $this;
    }

    /**
     * Get csalprodobsv
     *
     * @return string 
     */
    public function getCsalprodobsv()
    {
        return $this->csalprodobsv;
    }

    /**
     * Set nlocal
     *
     * @param Dicars\DataBundle\Entity\Local $nlocal
     * @return LogSalprod
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

    /**
     * Set npersonal
     *
     * @param Dicars\DataBundle\Entity\VenPersonal $npersonal
     * @return LogSalprod
     */
    public function setNpersonal(\Dicars\DataBundle\Entity\VenPersonal $npersonal = null)
    {
        $this->npersonal = $npersonal;
    
        return $this;
    }

    /**
     * Get npersonal
     *
     * @return Dicars\DataBundle\Entity\VenPersonal 
     */
    public function getNpersonal()
    {
        return $this->npersonal;
    }
}