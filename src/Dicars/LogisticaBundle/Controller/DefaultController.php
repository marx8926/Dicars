<?php

namespace Dicars\LogisticaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('DicarsLogisticaBundle:Default:index.html.twig', array('name' => $name));
    }
}
