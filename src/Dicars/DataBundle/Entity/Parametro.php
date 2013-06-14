<?php

namespace Dicars\DataBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Parametro
 *
 * @ORM\Table(name="parametro")
 * @ORM\Entity
 */
class Parametro
{
    /**
     * @var integer
     *
     * @ORM\Column(name="nParametro_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $nparametroId;



    /**
     * Get nparametroId
     *
     * @return integer 
     */
    public function getNparametroId()
    {
        return $this->nparametroId;
    }
}