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
    	$cliente = $this->getDoctrine()
    	->getRepository('DicarsDataBundle:VenCliente')
    	->findOneBy(array('nclienteId' => $idcliente));
    	
    	return $this->render('DicarsVentasBundle:Default:cronograma_pago_ventas.html.twig',array(
    			'idcliente' => $idcliente,
    			'nombre_cliente' => $cliente->getCclientenom()." ".$cliente->getCclienteape()
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
    
    public function venta_consultarAction()
    {
    	return $this->render('DicarsVentasBundle:Default:venta_consultar.html.twig');
    }
    
    public function venta_verAction($idventa)
    {
    	$Venta = $this->getDoctrine()
    	->getRepository('DicarsDataBundle:VenVenta')
    	->findOneBy(array('nventaId' => $idventa));
    
    	if($Venta -> getCventaest() == 0)
			$estado = "<span class='label'>Anulada</span>";
		else if ($Venta -> getCventaest() == 1)
			$estado = "<span class='label label-important'>Pendiente/Deuda</span>";
		else if ($Venta -> getCventaest() == 2)
			$estado = "<span class='label label-success'>Pagada/Cancelada</span>";
		else
			$estado = "<span class='label label-warning'>Separada</span>";
		
		$venta_trans = $this->getDoctrine()
		->getRepository('DicarsDataBundle:VenTransaccion')
		->findOneBy(array('nventa' => $Venta -> getNventaId()));
		
		$tipo_pago = $this->getDoctrine()
		->getRepository('DicarsDataBundle:Constante')
		->findOneBy(array('nconstanteId' => $Venta -> getNventatippag()));
		
		$tipo_moneda = $this->getDoctrine()
		->getRepository('DicarsDataBundle:VenTipomoneda')
		->findOneBy(array('ntipomoneda' => $Venta -> getNtipomoneda()));
		
		$local = $this->getDoctrine()
		->getRepository('DicarsDataBundle:Local')
		->findOneBy(array('nlocalId' => $Venta -> getNlocal()));
		
		$tipo_IGV = $this->getDoctrine()
		->getRepository('DicarsDataBundle:VenTipoigv')
		->findOneBy(array('ntipoigv' => $Venta -> getNtipoigv()));
    
    	return $this->render('DicarsVentasBundle:Default:venta_ver.html.twig',array(
    			'id' => $Venta -> getNventaId(),
				'fecha_reg' => $Venta -> getCventafecreg() -> format('d/m/Y'),
				'cliente' => $Venta -> getNcliente() -> getCclientenom()." ".$Venta -> getNcliente() -> getCclienteape() ,
    			'direccion' => $Venta -> getNcliente() -> getCclientecdir(),
				'vendedor' => $venta_trans -> getNpersonal() -> getCpersonalnom()." ".$venta_trans -> getNpersonal() -> getCpersonalape(), 
				'tipo_pagoId' => $Venta -> getNventatippag(),
				'tipo_pago' => $tipo_pago -> getCconstantedesc(),
				'total' => $Venta -> getNventatotapag(), 
				'estadoId' => $Venta -> getCventaest(),
				'estado' => $estado,
				'tipo_monedaId' => $Venta -> getNtipomoneda(),
				'tipo_moneda' => $tipo_moneda -> getCtipomonedadesc(),
				'subtotal' => $Venta -> getNventasubtotal(),
				'descuento' => $Venta -> getNventadscto(),
				'observacion' => $Venta -> getCventaobsv(),
				'amortizado' => $Venta -> getNventatotamt(),
				'saldo' => $Venta -> getNventasaldo(),
				'localId' => $Venta -> getNlocal(),
				'local' => $local,
				'tipo_IGVId' => $Venta -> getNtipoigv(),
				'tipo_IGV' => $tipo_IGV -> getNtipoigvproc()
    	));
    }
}
