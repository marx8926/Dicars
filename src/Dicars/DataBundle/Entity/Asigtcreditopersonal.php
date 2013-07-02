<?php

namespace Dicars\DataBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Asigtcreditopersonal
 *
 * @ORM\Table(name="asigtcreditopersonal")
 * @ORM\Entity
 */
class Asigtcreditopersonal
{
    /**
     * @var integer
     *
     * @ORM\Column(name="nAsigTCreditoPersonal_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $nasigtcreditopersonalId;

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
     * @var \VenTarjcredito
     *
     * @ORM\ManyToOne(targetEntity="VenTarjcredito")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="nTarjCredito_id", referencedColumnName="nTarjCredito_id")
     * })
     */
    private $ntarjcredito;



    /**
     * Get nasigtcreditopersonalId
     *
     * @return integer 
     */
    public function getNasigtcreditopersonalId()
    {
        return $this->nasigtcreditopersonalId;
    }

    /**
     * Set npersonal
     *
     * @param \Dicars\DataBundle\Entity\VenPersonal $npersonal
     * @return Asigtcreditopersonal
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

    /**
     * Set ntarjcredito
     *
     * @param \Dicars\DataBundle\Entity\VenTarjcredito $ntarjcredito
     * @return Asigtcreditopersonal
     */
    public function setNtarjcredito(\Dicars\DataBundle\Entity\VenTarjcredito $ntarjcredito = null)
    {
        $this->ntarjcredito = $ntarjcredito;
    
        return $this;
    }

    /**
     * Get ntarjcredito
     *
     * @return \Dicars\DataBundle\Entity\VenTarjcredito 
     */
    public function getNtarjcredito()
    {
        return $this->ntarjcredito;
    }
}