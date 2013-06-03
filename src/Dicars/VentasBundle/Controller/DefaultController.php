<?php

namespace Dicars\VentasBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('DicarsVentasBundle:Default:index.html.twig');
    }
    public function clientesAction()
    {
    	return $this->render('DicarsVentasBundle:Default:cliente.html.twig');
    }
    public function clientes_dmAction()
    {
    	return $this->render('DicarsVentasBundle:Default:clientesmorososdeudores.html.twig');
    }
    public function trabajadoresAction()
    {
    	return $this->render('DicarsVentasBundle:Default:trabajadores.html.twig');
    }
    public function separar_productosAction()
    {
    	return $this->render('DicarsVentasBundle:Default:separar_productos.html.twig');
    }
    public function regimp_tarjetacreditoAction()
    {
    	return $this->render('DicarsVentasBundle:Default:regimp_tarjetacredito.html.twig');
    }
    public function cronogramaAction()
    {
    	return $this->render('DicarsVentasBundle:Default:cronogramapago.html.twig');
    }
    public function ingregr_diaAction()
    {
    	return $this->render('DicarsVentasBundle:Default:reporte_ing_egr_dia.html.twig');
    }
    public function reporte_zonasAction()
    {
    	return $this->render('DicarsVentasBundle:Default:reporte_zonas.html.twig');
    }
    public function control_salidasAction()
    {
    	return $this->render('DicarsVentasBundle:Default:control_salidas_crecon.html.twig');
    }
}
