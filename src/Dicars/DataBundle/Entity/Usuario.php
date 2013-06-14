<?php

namespace Dicars\DataBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Usuario
 *
 * @ORM\Table(name="usuario")
 * @ORM\Entity
 */
class Usuario
{
    /**
     * @var integer
     *
     * @ORM\Column(name="nUsuario_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $nusuarioId;

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
     * Get nusuarioId
     *
     * @return integer 
     */
    public function getNusuarioId()
    {
        return $this->nusuarioId;
    }

    /**
     * Set npersonal
     *
     * @param \Dicars\DataBundle\Entity\VenPersonal $npersonal
     * @return Usuario
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