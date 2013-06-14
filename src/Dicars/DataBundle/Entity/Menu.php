<?php

namespace Dicars\DataBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Menu
 *
 * @ORM\Table(name="menu")
 * @ORM\Entity
 */
class Menu
{
    /**
     * @var integer
     *
     * @ORM\Column(name="nMenu_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $nmenuId;

    /**
     * @var integer
     *
     * @ORM\Column(name="nMenuClase", type="integer", nullable=false)
     */
    private $nmenuclase;

    /**
     * @var string
     *
     * @ORM\Column(name="cMenuNom", type="string", length=150, nullable=false)
     */
    private $cmenunom;

    /**
     * @var string
     *
     * @ORM\Column(name="cMenuDesc", type="string", length=150, nullable=false)
     */
    private $cmenudesc;

    /**
     * @var integer
     *
     * @ORM\Column(name="nMenuValor", type="integer", nullable=false)
     */
    private $nmenuvalor;



    /**
     * Get nmenuId
     *
     * @return integer 
     */
    public function getNmenuId()
    {
        return $this->nmenuId;
    }

    /**
     * Set nmenuclase
     *
     * @param integer $nmenuclase
     * @return Menu
     */
    public function setNmenuclase($nmenuclase)
    {
        $this->nmenuclase = $nmenuclase;
    
        return $this;
    }

    /**
     * Get nmenuclase
     *
     * @return integer 
     */
    public function getNmenuclase()
    {
        return $this->nmenuclase;
    }

    /**
     * Set cmenunom
     *
     * @param string $cmenunom
     * @return Menu
     */
    public function setCmenunom($cmenunom)
    {
        $this->cmenunom = $cmenunom;
    
        return $this;
    }

    /**
     * Get cmenunom
     *
     * @return string 
     */
    public function getCmenunom()
    {
        return $this->cmenunom;
    }

    /**
     * Set cmenudesc
     *
     * @param string $cmenudesc
     * @return Menu
     */
    public function setCmenudesc($cmenudesc)
    {
        $this->cmenudesc = $cmenudesc;
    
        return $this;
    }

    /**
     * Get cmenudesc
     *
     * @return string 
     */
    public function getCmenudesc()
    {
        return $this->cmenudesc;
    }

    /**
     * Set nmenuvalor
     *
     * @param integer $nmenuvalor
     * @return Menu
     */
    public function setNmenuvalor($nmenuvalor)
    {
        $this->nmenuvalor = $nmenuvalor;
    
        return $this;
    }

    /**
     * Get nmenuvalor
     *
     * @return integer 
     */
    public function getNmenuvalor()
    {
        return $this->nmenuvalor;
    }
}