<?php

namespace Dicars\DataBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * LogProveedor
 *
 * @ORM\Table(name="log_proveedor")
 * @ORM\Entity
 */
class LogProveedor
{
    /**
     * @var integer
     *
     * @ORM\Column(name="nProveedor_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $nproveedorId;

    /**
     * @var string
     *
     * @ORM\Column(name="cProveedorRuc", type="string", length=11, nullable=false)
     */
    private $cproveedorruc;

    /**
     * @var string
     *
     * @ORM\Column(name="cProveedorRazSocial", type="string", length=200, nullable=false)
     */
    private $cproveedorrazsocial;

    /**
     * @var string
     *
     * @ORM\Column(name="cProveedorTel", type="string", length=25, nullable=false)
     */
    private $cproveedortel;

    /**
     * @var string
     *
     * @ORM\Column(name="cProveedorEmail", type="string", length=100, nullable=false)
     */
    private $cproveedoremail;

    /**
     * @var string
     *
     * @ORM\Column(name="cProveedorSitioWeb", type="string", length=150, nullable=true)
     */
    private $cproveedorsitioweb;

    /**
     * @var string
     *
     * @ORM\Column(name="cProveedorDirec", type="string", length=200, nullable=false)
     */
    private $cproveedordirec;

    /**
     * @var string
     *
     * @ORM\Column(name="cProveedorCCorriente", type="string", length=20, nullable=true)
     */
    private $cproveedorccorriente;



    /**
     * Get nproveedorId
     *
     * @return integer 
     */
    public function getNproveedorId()
    {
        return $this->nproveedorId;
    }

    /**
     * Set cproveedorruc
     *
     * @param string $cproveedorruc
     * @return LogProveedor
     */
    public function setCproveedorruc($cproveedorruc)
    {
        $this->cproveedorruc = $cproveedorruc;
    
        return $this;
    }

    /**
     * Get cproveedorruc
     *
     * @return string 
     */
    public function getCproveedorruc()
    {
        return $this->cproveedorruc;
    }

    /**
     * Set cproveedorrazsocial
     *
     * @param string $cproveedorrazsocial
     * @return LogProveedor
     */
    public function setCproveedorrazsocial($cproveedorrazsocial)
    {
        $this->cproveedorrazsocial = $cproveedorrazsocial;
    
        return $this;
    }

    /**
     * Get cproveedorrazsocial
     *
     * @return string 
     */
    public function getCproveedorrazsocial()
    {
        return $this->cproveedorrazsocial;
    }

    /**
     * Set cproveedortel
     *
     * @param string $cproveedortel
     * @return LogProveedor
     */
    public function setCproveedortel($cproveedortel)
    {
        $this->cproveedortel = $cproveedortel;
    
        return $this;
    }

    /**
     * Get cproveedortel
     *
     * @return string 
     */
    public function getCproveedortel()
    {
        return $this->cproveedortel;
    }

    /**
     * Set cproveedoremail
     *
     * @param string $cproveedoremail
     * @return LogProveedor
     */
    public function setCproveedoremail($cproveedoremail)
    {
        $this->cproveedoremail = $cproveedoremail;
    
        return $this;
    }

    /**
     * Get cproveedoremail
     *
     * @return string 
     */
    public function getCproveedoremail()
    {
        return $this->cproveedoremail;
    }

    /**
     * Set cproveedorsitioweb
     *
     * @param string $cproveedorsitioweb
     * @return LogProveedor
     */
    public function setCproveedorsitioweb($cproveedorsitioweb)
    {
        $this->cproveedorsitioweb = $cproveedorsitioweb;
    
        return $this;
    }

    /**
     * Get cproveedorsitioweb
     *
     * @return string 
     */
    public function getCproveedorsitioweb()
    {
        return $this->cproveedorsitioweb;
    }

    /**
     * Set cproveedordirec
     *
     * @param string $cproveedordirec
     * @return LogProveedor
     */
    public function setCproveedordirec($cproveedordirec)
    {
        $this->cproveedordirec = $cproveedordirec;
    
        return $this;
    }

    /**
     * Get cproveedordirec
     *
     * @return string 
     */
    public function getCproveedordirec()
    {
        return $this->cproveedordirec;
    }

    /**
     * Set cproveedorccorriente
     *
     * @param string $cproveedorccorriente
     * @return LogProveedor
     */
    public function setCproveedorccorriente($cproveedorccorriente)
    {
        $this->cproveedorccorriente = $cproveedorccorriente;
    
        return $this;
    }

    /**
     * Get cproveedorccorriente
     *
     * @return string 
     */
    public function getCproveedorccorriente()
    {
        return $this->cproveedorccorriente;
    }
}