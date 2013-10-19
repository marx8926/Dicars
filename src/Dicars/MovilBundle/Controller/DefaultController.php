<?php

namespace Dicars\MovilBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('DicarsMovilBundle:Default:index.html.twig', array('name' => $name));
    }
}
