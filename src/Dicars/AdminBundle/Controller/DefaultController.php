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
    public function zonasAction()
    {
    	return $this->render('DicarsAdminBundle:Default:zonas.html.twig');
    }
    public function tipomonedaAction()
    {
    	return $this->render('DicarsAdminBundle:Default:tipo_moneda.html.twig');
    }
    public function tipoigvAction()
    {
    	return $this->render('DicarsAdminBundle:Default:tipo_igv.html.twig');
    }
    
    public function ZonaPersonalAction()
    {
    	return $this->render('DicarsAdminBundle:Default:zonapersonal.html.twig');
    }
    public function EditarZonaPersonalAction($idzonapersonal)
    {
    	$Zonapersonal = $this->getDoctrine()
    	->getRepository('DicarsDataBundle:VenZonapersonal')
    	->findOneBy(array('nzonapersonalId' => $idzonapersonal));
    	
    	$Personal = $Zonapersonal -> getNpersonal();
    	$Zona = $Zonapersonal -> getNzona();
    	
    	return $this->render('DicarsAdminBundle:Default:editarzonapersonal.html.twig',array(
    			'nombrepersonal' => $Personal -> getCpersonalnom()." ".$Personal -> getCpersonalape(),
    			'idpersonal' => $Personal -> getNpersonalId(),
    			'nombrezona' => $Zona -> getCzonadesc(),
    			'idzona' => $Zona -> getNzonaId(),
    			'idzonapersonal' => $idzonapersonal
    			));
    }
    public function movimientosAction()
    {
    	return $this->render('DicarsAdminBundle:Default:movimientos.html.twig');
    }
}
