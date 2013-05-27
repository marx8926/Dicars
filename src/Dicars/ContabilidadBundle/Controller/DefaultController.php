<?php

namespace Dicars\ContabilidadBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('DicarsContabilidadBundle:Default:index.html.twig', array('name' => $name));
    }
}
