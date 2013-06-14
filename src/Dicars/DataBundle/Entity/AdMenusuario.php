<?php

namespace Dicars\DataBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AdMenusuario
 *
 * @ORM\Table(name="ad_menusuario")
 * @ORM\Entity
 */
class AdMenusuario
{
    /**
     * @var integer
     *
     * @ORM\Column(name="nMenUsuario_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $nmenusuarioId;

    /**
     * @var string
     *
     * @ORM\Column(name="cMenUsuarioEst", type="string", length=1, nullable=false)
     */
    private $cmenusuarioest;

    /**
     * @var \Menu
     *
     * @ORM\ManyToOne(targetEntity="Menu")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="nMenu_id", referencedColumnName="nMenu_id")
     * })
     */
    private $nmenu;

    /**
     * @var \Usuario
     *
     * @ORM\ManyToOne(targetEntity="Usuario")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="nUsuario_id", referencedColumnName="nUsuario_id")
     * })
     */
    private $nusuario;



    /**
     * Get nmenusuarioId
     *
     * @return integer 
     */
    public function getNmenusuarioId()
    {
        return $this->nmenusuarioId;
    }

    /**
     * Set cmenusuarioest
     *
     * @param string $cmenusuarioest
     * @return AdMenusuario
     */
    public function setCmenusuarioest($cmenusuarioest)
    {
        $this->cmenusuarioest = $cmenusuarioest;
    
        return $this;
    }

    /**
     * Get cmenusuarioest
     *
     * @return string 
     */
    public function getCmenusuarioest()
    {
        return $this->cmenusuarioest;
    }

    /**
     * Set nmenu
     *
     * @param \Dicars\DataBundle\Entity\Menu $nmenu
     * @return AdMenusuario
     */
    public function setNmenu(\Dicars\DataBundle\Entity\Menu $nmenu = null)
    {
        $this->nmenu = $nmenu;
    
        return $this;
    }

    /**
     * Get nmenu
     *
     * @return \Dicars\DataBundle\Entity\Menu 
     */
    public function getNmenu()
    {
        return $this->nmenu;
    }

    /**
     * Set nusuario
     *
     * @param \Dicars\DataBundle\Entity\Usuario $nusuario
     * @return AdMenusuario
     */
    public function setNusuario(\Dicars\DataBundle\Entity\Usuario $nusuario = null)
    {
        $this->nusuario = $nusuario;
    
        return $this;
    }

    /**
     * Get nusuario
     *
     * @return \Dicars\DataBundle\Entity\Usuario 
     */
    public function getNusuario()
    {
        return $this->nusuario;
    }
}