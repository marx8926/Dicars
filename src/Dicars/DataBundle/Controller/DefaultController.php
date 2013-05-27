<?php

namespace Dicars\DataBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('DicarsDataBundle:Default:index.html.twig', array('name' => $name));
    }
}
