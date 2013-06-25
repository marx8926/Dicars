<?php

namespace Dicars\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('DicarsAdminBundle:Default:index.html.twig');
    }
    public function constantesAction()
    {
    	return $this->render('DicarsAdminBundle:Default:constante.html.twig');
    }
    public function cargosAction()
    {
    	return $this->render('DicarsAdminBundle:Default:cargos.html.twig');
    }
    public function usuariosAction()
    {
    	return $this->render('DicarsAdminBundle:Default:usuarios.html.twig');
    }
    public function categoriasAction()
    {
    	return $this->render('DicarsAdminBundle:Default:categorias.html.twig');
    }
    public function marcasAction()
    {
    	return $this->render('DicarsAdminBundle:Default:marcas.html.twig');
    }
}
