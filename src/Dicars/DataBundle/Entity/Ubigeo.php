<?php

namespace Dicars\DataBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Ubigeo
 *
 * @ORM\Table(name="ubigeo")
 * @ORM\Entity
 */
class Ubigeo
{
    /**
     * @var integer
     *
     * @ORM\Column(name="nUbigeo_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $nubigeoId;

    /**
     * @var integer
     *
     * @ORM\Column(name="nUbigeoDpt", type="integer", nullable=false)
     */
    private $nubigeodpt;

    /**
     * @var integer
     *
     * @ORM\Column(name="nUbigeoProv", type="integer", nullable=false)
     */
    private $nubigeoprov;

    /**
     * @var integer
     *
     * @ORM\Column(name="nUbigeoDist", type="integer", nullable=false)
     */
    private $nubigeodist;

    /**
     * @var string
     *
     * @ORM\Column(name="cUbigeoDesc", type="string", length=150, nullable=false)
     */
    private $cubigeodesc;

    /**
     * @var integer
     *
     * @ORM\Column(name="nUbigeoDep", type="integer", nullable=false)
     */
    private $nubigeodep;



    /**
     * Get nubigeoId
     *
     * @return integer 
     */
    public function getNubigeoId()
    {
        return $this->nubigeoId;
    }

    /**
     * Set nubigeodpt
     *
     * @param integer $nubigeodpt
     * @return Ubigeo
     */
    public function setNubigeodpt($nubigeodpt)
    {
        $this->nubigeodpt = $nubigeodpt;
    
        return $this;
    }

    /**
     * Get nubigeodpt
     *
     * @return integer 
     */
    public function getNubigeodpt()
    {
        return $this->nubigeodpt;
    }

    /**
     * Set nubigeoprov
     *
     * @param integer $nubigeoprov
     * @return Ubigeo
     */
    public function setNubigeoprov($nubigeoprov)
    {
        $this->nubigeoprov = $nubigeoprov;
    
        return $this;
    }

    /**
     * Get nubigeoprov
     *
     * @return integer 
     */
    public function getNubigeoprov()
    {
        return $this->nubigeoprov;
    }

    /**
     * Set nubigeodist
     *
     * @param integer $nubigeodist
     * @return Ubigeo
     */
    public function setNubigeodist($nubigeodist)
    {
        $this->nubigeodist = $nubigeodist;
    
        return $this;
    }

    /**
     * Get nubigeodist
     *
     * @return integer 
     */
    public function getNubigeodist()
    {
        return $this->nubigeodist;
    }

    /**
     * Set cubigeodesc
     *
     * @param string $cubigeodesc
     * @return Ubigeo
     */
    public function setCubigeodesc($cubigeodesc)
    {
        $this->cubigeodesc = $cubigeodesc;
    
        return $this;
    }

    /**
     * Get cubigeodesc
     *
     * @return string 
     */
    public function getCubigeodesc()
    {
        return $this->cubigeodesc;
    }

    /**
     * Set nubigeodep
     *
     * @param integer $nubigeodep
     * @return Ubigeo
     */
    public function setNubigeodep($nubigeodep)
    {
        $this->nubigeodep = $nubigeodep;
    
        return $this;
    }

    /**
     * Get nubigeodep
     *
     * @return integer 
     */
    public function getNubigeodep()
    {
        return $this->nubigeodep;
    }
}