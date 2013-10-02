<?php
// src/Dicars/UserBundle/Entity/User.php

namespace Dicars\UserBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="dicars_user")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    
    
   

    public function __construct()
    {
        parent::__construct();
        // your own logic
    }
    
  
}