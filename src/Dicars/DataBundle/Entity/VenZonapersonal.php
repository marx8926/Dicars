<?php

namespace Dicars\DataBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * VenZonapersonal
 *
 * @ORM\Table(name="ven_zonapersonal")
 * @ORM\Entity
 */
class VenZonapersonal
{
    /**
     * @var integer
     *
     * @ORM\Column(name="nZonaPersonal_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $nzonapersonalId;

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
     * @var \VenPersonal
     *
     * @ORM\ManyToOne(targetEntity="VenPersonal")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="nPersonal_id", referencedColumnName="nPersonal_id")
     * })
     */
    private $npersonal;



    /**
     * Get nzonapersonalId
     *
     * @return integer 
     */
    public function getNzonapersonalId()
    {
        return $this->nzonapersonalId;
    }

    /**
     * Set nzona
     *
     * @param \Dicars\DataBundle\Entity\VenZona $nzona
     * @return VenZonapersonal
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

    /**
     * Set npersonal
     *
     * @param \Dicars\DataBundle\Entity\VenPersonal $npersonal
     * @return VenZonapersonal
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