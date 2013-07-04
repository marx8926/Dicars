<?php

namespace Dicars\LogisticaBundle\Controller;

use Symfony\Component\BrowserKit\Request;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\ORM\TransactionRequiredException;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('DicarsLogisticaBundle:Default:index.html.twig');
    }
    public function productosAction()
    {
    	return $this->render('DicarsLogisticaBundle:Default:productos.html.twig');
    }
    public function proveedoresAction()
    {
    	return $this->render('DicarsLogisticaBundle:Default:proveedores.html.twig');
    }
    public function localesAction()
    {
    	return $this->render('DicarsLogisticaBundle:Default:locales.html.twig');
    }
    public function cons_salidaproductosAction()
    {
    	return $this->render('DicarsLogisticaBundle:Default:salida_productos_consultar.html.twig');
    }
    public function reg_salidaproductosAction()
    {
    	return $this->render('DicarsLogisticaBundle:Default:salida_productos_registrar.html.twig');
    }
    public function ver_salidaproductosAction($idsalprod)
    {
    	$SalProd = $this->getDoctrine()
    	->getRepository('DicarsDataBundle:LogSalprod')
    	->findOneBy(array('nsalprodId' => $idsalprod));
    	
    	$solicitante = $this->getDoctrine()
    	->getRepository('DicarsDataBundle:VenPersonal')
    	->findOneBy(array('npersonalId' => $SalProd->getNsolicitanteId()));
    	
    	return $this->render('DicarsLogisticaBundle:Default:salida_productos_ver.html.twig',array(
    			'id' => $idsalprod,
    			'personal' => $SalProd->getNpersonal()->getCpersonalnom()." ".$SalProd->getNpersonal()->getCpersonalape(),
    			'local' => $SalProd->getNlocal()->getClocaldesc(),
    			'serie' => $SalProd->getCsalprodserie(),
    			'nro' => $SalProd->getCsalprodnro(),
    			'fecha_reg' => $SalProd->getDsalprodfecreg()->format('d/m/Y'),
    			'motivo' => $SalProd->getNsalprodmotivo(),
    			'solicitante' => $solicitante->getCpersonalnom()." ".$solicitante->getCpersonalape(),
    			'observacion' => $SalProd->getCsalprodobsv()
    			));
    }
    public function cons_ingresoproductosAction()
    {
    	return $this->render('DicarsLogisticaBundle:Default:ingreso_productos_consultar.html.twig');
    }
    public function reg_ingresoproductosAction()
    {
    	return $this->render('DicarsLogisticaBundle:Default:ingreso_productos_registrar.html.twig');
    }
    public function pedidosAction()
    {
    	return $this->render('DicarsLogisticaBundle:Default:pedidos.html.twig');
    }
    public function pedidos_registrarAction()
    {
    	return $this->render('DicarsLogisticaBundle:Default:pedidos_registrar.html.twig');
    }
}
