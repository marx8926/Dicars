<?php

namespace Dicars\LogisticaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

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
