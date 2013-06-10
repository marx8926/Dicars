<?php

namespace Dicars\DataBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Dicars\DataBundle\Entity\LogIngprod
 *
 * @ORM\Table(name="log_ingprod")
 * @ORM\Entity
 */
class LogIngprod
{
    /**
     * @var integer $ningprodId
     *
     * @ORM\Column(name="nIngProd_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $ningprodId;

    /**
     * @var string $cingprodserie
     *
     * @ORM\Column(name="cIngProdSerie", type="string", length=4, nullable=false)
     */
    private $cingprodserie;

    /**
     * @var string $cingprodnro
     *
     * @ORM\Column(name="cIngProdNro", type="string", length=8, nullable=false)
     */
    private $cingprodnro;

    /**
     * @var integer $ningprodmotivo
     *
     * @ORM\Column(name="nIngProdMotivo", type="integer", nullable=false)
     */
    private $ningprodmotivo;

    /**
     * @var string $cingproddocserie
     *
     * @ORM\Column(name="cIngProdDocSerie", type="string", length=4, nullable=false)
     */
    private $cingproddocserie;

    /**
     * @var \DateTime $dingprodfecreg
     *
     * @ORM\Column(name="dIngProdFecReg", type="datetime", nullable=false)
     */
    private $dingprodfecreg;

    /**
     * @var string $cingproddocnro
     *
     * @ORM\Column(name="cIngProdDocNro", type="string", length=8, nullable=false)
     */
    private $cingproddocnro;

    /**
     * @var string $cingprodobsv
     *
     * @ORM\Column(name="cIngProdObsv", type="string", length=500, nullable=false)
     */
    private $cingprodobsv;

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
     * Get ningprodId
     *
     * @return integer 
     */
    public function getNingprodId()
    {
        return $this->ningprodId;
    }

    /**
     * Set cingprodserie
     *
     * @param string $cingprodserie
     * @return LogIngprod
     */
    public function setCingprodserie($cingprodserie)
    {
        $this->cingprodserie = $cingprodserie;
    
        return $this;
    }

    /**
     * Get cingprodserie
     *
     * @return string 
     */
    public function getCingprodserie()
    {
        return $this->cingprodserie;
    }

    /**
     * Set cingprodnro
     *
     * @param string $cingprodnro
     * @return LogIngprod
     */
    public function setCingprodnro($cingprodnro)
    {
        $this->cingprodnro = $cingprodnro;
    
        return $this;
    }

    /**
     * Get cingprodnro
     *
     * @return string 
     */
    public function getCingprodnro()
    {
        return $this->cingprodnro;
    }

    /**
     * Set ningprodmotivo
     *
     * @param integer $ningprodmotivo
     * @return LogIngprod
     */
    public function setNingprodmotivo($ningprodmotivo)
    {
        $this->ningprodmotivo = $ningprodmotivo;
    
        return $this;
    }

    /**
     * Get ningprodmotivo
     *
     * @return integer 
     */
    public function getNingprodmotivo()
    {
        return $this->ningprodmotivo;
    }

    /**
     * Set cingproddocserie
     *
     * @param string $cingproddocserie
     * @return LogIngprod
     */
    public function setCingproddocserie($cingproddocserie)
    {
        $this->cingproddocserie = $cingproddocserie;
    
        return $this;
    }

    /**
     * Get cingproddocserie
     *
     * @return string 
     */
    public function getCingproddocserie()
    {
        return $this->cingproddocserie;
    }

    /**
     * Set dingprodfecreg
     *
     * @param \DateTime $dingprodfecreg
     * @return LogIngprod
     */
    public function setDingprodfecreg($dingprodfecreg)
    {
        $this->dingprodfecreg = $dingprodfecreg;
    
        return $this;
    }

    /**
     * Get dingprodfecreg
     *
     * @return \DateTime 
     */
    public function getDingprodfecreg()
    {
        return $this->dingprodfecreg;
    }

    /**
     * Set cingproddocnro
     *
     * @param string $cingproddocnro
     * @return LogIngprod
     */
    public function setCingproddocnro($cingproddocnro)
    {
        $this->cingproddocnro = $cingproddocnro;
    
        return $this;
    }

    /**
     * Get cingproddocnro
     *
     * @return string 
     */
    public function getCingproddocnro()
    {
        return $this->cingproddocnro;
    }

    /**
     * Set cingprodobsv
     *
     * @param string $cingprodobsv
     * @return LogIngprod
     */
    public function setCingprodobsv($cingprodobsv)
    {
        $this->cingprodobsv = $cingprodobsv;
    
        return $this;
    }

    /**
     * Get cingprodobsv
     *
     * @return string 
     */
    public function getCingprodobsv()
    {
        return $this->cingprodobsv;
    }

    /**
     * Set nlocal
     *
     * @param Dicars\DataBundle\Entity\Local $nlocal
     * @return LogIngprod
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
     * @return LogIngprod
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