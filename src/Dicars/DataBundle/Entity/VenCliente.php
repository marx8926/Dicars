<?php

namespace Dicars\DataBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * VenCliente
 *
 * @ORM\Table(name="ven_cliente")
 * @ORM\Entity
 */
class VenCliente
{
    /**
     * @var integer
     *
     * @ORM\Column(name="nCliente_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $nclienteId;

    /**
     * @var string
     *
     * @ORM\Column(name="cClienteNom", type="string", length=50, nullable=false)
     */
    private $cclientenom;

    /**
     * @var string
     *
     * @ORM\Column(name="cClienteApe", type="string", length=50, nullable=false)
     */
    private $cclienteape;

    /**
     * @var string
     *
     * @ORM\Column(name="cClienteDNI", type="string", length=8, nullable=false)
     */
    private $cclientedni;

    /**
     * @var string
     *
     * @ORM\Column(name="cClienteRef", type="string", length=200, nullable=false)
     */
    private $cclienteref;

    /**
     * @var string
     *
     * @ORM\Column(name="cClientecDir", type="string", length=200, nullable=false)
     */
    private $cclientecdir;

    /**
     * @var float
     *
     * @ORM\Column(name="nClienteLineaOp", type="decimal", nullable=false)
     */
    private $nclientelineaop;

    /**
     * @var string
     *
     * @ORM\Column(name="cClienteArcCredito", type="text", nullable=false)
     */
    private $cclientearccredito;

    /**
     * @var string
     *
     * @ORM\Column(name="cClienteOcup", type="string", length=40, nullable=false)
     */
    private $cclienteocup;

    /**
     * @var \VenZona
     *
     * @ORM\ManyToOne(targetEntity="VenZona")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="nZona_id", referencedColumnName="nZona_id")
     * })
     */
    private $nzona;



    /**
     * Get nclienteId
     *
     * @return integer 
     */
    public function getNclienteId()
    {
        return $this->nclienteId;
    }

    /**
     * Set cclientenom
     *
     * @param string $cclientenom
     * @return VenCliente
     */
    public function setCclientenom($cclientenom)
    {
        $this->cclientenom = $cclientenom;
    
        return $this;
    }

    /**
     * Get cclientenom
     *
     * @return string 
     */
    public function getCclientenom()
    {
        return $this->cclientenom;
    }

    /**
     * Set cclienteape
     *
     * @param string $cclienteape
     * @return VenCliente
     */
    public function setCclienteape($cclienteape)
    {
        $this->cclienteape = $cclienteape;
    
        return $this;
    }

    /**
     * Get cclienteape
     *
     * @return string 
     */
    public function getCclienteape()
    {
        return $this->cclienteape;
    }

    /**
     * Set cclientedni
     *
     * @param string $cclientedni
     * @return VenCliente
     */
    public function setCclientedni($cclientedni)
    {
        $this->cclientedni = $cclientedni;
    
        return $this;
    }

    /**
     * Get cclientedni
     *
     * @return string 
     */
    public function getCclientedni()
    {
        return $this->cclientedni;
    }

    /**
     * Set cclienteref
     *
     * @param string $cclienteref
     * @return VenCliente
     */
    public function setCclienteref($cclienteref)
    {
        $this->cclienteref = $cclienteref;
    
        return $this;
    }

    /**
     * Get cclienteref
     *
     * @return string 
     */
    public function getCclienteref()
    {
        return $this->cclienteref;
    }

    /**
     * Set cclientecdir
     *
     * @param string $cclientecdir
     * @return VenCliente
     */
    public function setCclientecdir($cclientecdir)
    {
        $this->cclientecdir = $cclientecdir;
    
        return $this;
    }

    /**
     * Get cclientecdir
     *
     * @return string 
     */
    public function getCclientecdir()
    {
        return $this->cclientecdir;
    }

    /**
     * Set nclientelineaop
     *
     * @param float $nclientelineaop
     * @return VenCliente
     */
    public function setNclientelineaop($nclientelineaop)
    {
        $this->nclientelineaop = $nclientelineaop;
    
        return $this;
    }

    /**
     * Get nclientelineaop
     *
     * @return float 
     */
    public function getNclientelineaop()
    {
        return $this->nclientelineaop;
    }

    /**
     * Set cclientearccredito
     *
     * @param string $cclientearccredito
     * @return VenCliente
     */
    public function setCclientearccredito($cclientearccredito)
    {
        $this->cclientearccredito = $cclientearccredito;
    
        return $this;
    }

    /**
     * Get cclientearccredito
     *
     * @return string 
     */
    public function getCclientearccredito()
    {
        return $this->cclientearccredito;
    }

    /**
     * Set cclienteocup
     *
     * @param string $cclienteocup
     * @return VenCliente
     */
    public function setCclienteocup($cclienteocup)
    {
        $this->cclienteocup = $cclienteocup;
    
        return $this;
    }

    /**
     * Get cclienteocup
     *
     * @return string 
     */
    public function getCclienteocup()
    {
        return $this->cclienteocup;
    }

    /**
     * Set nzona
     *
     * @param \Dicars\DataBundle\Entity\VenZona $nzona
     * @return VenCliente
     */
    public function setNzona(\Dicars\DataBundle\Entity\VenZona $nzona = null)
    {
        $this->nzona = $nzona;
    
        return $this;
    }

    /**
     * Get nzona
     *
     * @return \Dicars\DataBundle\Entity\VenZona 
     */
    public function getNzona()
    {
        return $this->nzona;
    }
}