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
    public function cronograma_creditosAction($idcliente)
    {
    	return $this->render('DicarsVentasBundle:Default:cronograma_pago_ventas.html.twig',array(
    			'idcliente' => $idcliente
    	));
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
    public function venta_productosAction()
    {
    	return $this->render('DicarsVentasBundle:Default:venta.html.twig');
    }
    public function ofertasAction()
    {
    	return $this->render('DicarsVentasBundle:Default:ofertas.html.twig');
    }

    public function resumen_ventaAction()
    {
    	return $this->render('DicarsVentasBundle:Default:resumen_venta.html.twig');
    }
    
    public function editar_ofertaAction($idoferta)
    {
    	$oferta = $this->getDoctrine()
    	->getRepository('DicarsDataBundle:Oferta')
    	->findOneBy(array('nofertaId' => $idoferta));
    	
    	return $this->render('DicarsVentasBundle:Default:oferta_editar.html.twig',array(
    			'id' => $oferta -> getNofertaId() ,
				'desc' => $oferta -> getCofertadesc(),
				'descuento' => $oferta -> getNofertaporc(),
				'fecvigente' => $oferta -> getDofertafecvigente() -> format('d/m/Y'),
				'fecvencimiento' => $oferta -> getDofertafecvencto() -> format('d/m/Y')
    	));
    }
}
