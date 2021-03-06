<?php
namespace Dicars\VentasBundle\Controller;

use Dicars\DataBundle\Entity\LogDetsalprod;

use Dicars\DataBundle\Entity\LogSalprod;
use Dicars\DataBundle\Entity\VenTransaccion;
use Dicars\DataBundle\Entity\VenCronpago;
use Dicars\DataBundle\Entity\VenCredito;
use Dicars\DataBundle\Entity\VenDetventa;
use Dicars\DataBundle\Entity\VenVenta;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\ORM\TransactionRequiredException;
class AdministrarVentaController extends Controller {
	
	public function RegistrarVentaAction(){
		$request = $this->get('request');
		$form = $request->request->get('formulario');
		$otherdata = $request->request->get('otherdata');
		$datos = array();
		parse_str($form, $datos);
		
		$Cliente = null;
		$Local = null;
		$TipoIGV = null;
		$FechaReg = null;
		$TipoMoneda = null;
		$TipoPago = null;
		$Subtotal = null;
		$Estado = null;
		$Descuento = null;
		$Observacion = null;
		$Amortizacion = null;
		$Saldo = null;
		$Total = null;
		$NumCuotas = null;
		$FechaDiaPago = null;
		$DesTrans = null;
		$MontoTrans = null;
		$EmpleadoTrans = null;
		$SalProd = null;
		
		if ($form!=null){			
			$em = $this->getDoctrine()->getEntityManager();
			$em->beginTransaction();
			
			$FechaReg = new \DateTime();
			$Observacion = $datos["observacion"];
			
			$userManager = $this->container->get('fos_user.user_manager');
			$user = $userManager->findUserByUsername($this->container->get('security.context')
					->getToken()
					->getUser());
	    	$EmpleadoTrans = $user->getNPersonal();
			
			/*$EmpleadoTrans = $this->getDoctrine()
			->getRepository('DicarsDataBundle:VenPersonal')
			->findOneBy(array('npersonalId' => 1));*/
			
			$Cliente = $this->getDoctrine()
			->getRepository('DicarsDataBundle:VenCliente')
			->findOneBy(array('nclienteId' => $datos["cliente_id"]));
			
			$Local = $this->getDoctrine()
			->getRepository('DicarsDataBundle:Local')
			->findOneBy(array('nlocalId' => 2));
			
			$TipoIGV = $this->getDoctrine()
			->getRepository('DicarsDataBundle:VenTipoigv')
			->findOneBy(array('ntipoigv' => $datos["tipo_igv"]));
			
			$TipoMoneda = $this->getDoctrine()
			->getRepository('DicarsDataBundle:VenTipomoneda')
			->findOneBy(array('ntipomoneda' => $datos["tipo_moneda"]));
			
			$Descuento = $datos["descuento"];
			$Saldo = $datos["saldo"];
			$Subtotal = $datos["subtotal"];			
			$TipoPago = $datos["forma_pago"];
			$Amortizacion = $datos["amortizacion"];
			$Total = $datos["total"];
			$SerieSalida = $datos['serie_salida'];
			$NumeroSalida = $datos['numero_salida'];
			
			$NumCuotas = $datos["num_cuotas"];
			$FechaDiaPago = date_create_from_format('d/m/Y', $datos["prim_cuota"]);
			
			$DesTrans = "Venta al Contado";
			$MontoTrans = $datos["total"];
			
			if ($TipoPago == 1) 
				$Estado = '2'; //pagada/cancelada
			else if($Saldo > 0 && $TipoPago == 3)
				$Estado = '3'; //separada
			else if($Saldo > 0 && $TipoPago == 2)
				$Estado = '1'; //pendiente/deuda
			else
				$Estado = '0'; //anulada
			
			$Venta = new VenVenta();
			$Venta -> setCventaest($Estado);
			$Venta -> setCventafecreg($FechaReg);
			$Venta -> setCventaobsv($Observacion);
			$Venta -> setNcliente($Cliente);
			$Venta -> setNlocal($Local);
			$Venta -> setNtipoigv($TipoIGV);
			$Venta -> setNtipomoneda($TipoMoneda);
			$Venta -> setNventadscto($Descuento);
			$Venta -> setNventasaldo($Saldo);
			$Venta -> setNventasubtotal($Subtotal);
			$Venta -> setNventatippag($TipoPago);
			$Venta -> setNventatotamt($Amortizacion);
			$Venta -> setNventatotapag($Total);
			
			$em->persist($Venta);
			

			if($TipoPago == '3'){
				$DesTrans = "Venta Separada";
				$MontoTrans = $datos["amortizacion"];
			}
			
			if($TipoPago != '3'){
				$SalProd = new  LogSalprod();
				$SalProd -> setNpersonal($EmpleadoTrans);
				$SalProd -> setNlocal($Local);
				$SalProd -> setCsalprodserie($SerieSalida);
				$SalProd -> setCsalprodnro($NumeroSalida);
				$SalProd -> setDsalprodfecreg($FechaReg);
				$SalProd -> setNsalprodmotivo(2);
				$SalProd -> setNsolicitanteId(1);
				$SalProd -> setCsalprodobsv("Salida por ventas");
				$em -> persist($SalProd);
			}
			
			if($TipoPago == '2'){
				$VentaCredito = new VenCredito();
				$VentaCredito -> setCcreditoest("1");
				$VentaCredito -> setNcreditoformapag($TipoPago);
				$VentaCredito -> setNvencreditomontinicial($Amortizacion);
				$VentaCredito -> setNvencreditoncuota($NumCuotas);
				$VentaCredito -> setNvencreditoppag(100/$NumCuotas);
				$VentaCredito -> setNventa($Venta);
					
				$em->persist($VentaCredito);
					
				for($i = 0 ; $i < $NumCuotas; $i++){
					
					$FechaPagoReg = date_create_from_format('d/m/Y', $FechaDiaPago -> format("d/m/Y"));
					
					$CronoPago = new VenCronpago();
					$CronoPago -> setNcronpagofecpago($FechaPagoReg);
					$CronoPago -> setNcronpagofecreg($FechaReg);
					$CronoPago -> setNcronpagomoncouapg($datos["montocuota"]);
					$CronoPago -> setNcronpagomoncouapl(0);
					$CronoPago -> setNvencredito($VentaCredito);
					$CronoPago -> setNcronpagonrocuota($i+1);
			
					$em->persist($CronoPago);
			
					$FechaDiaPago -> modify('+7 day');
				}
					
				$DesTrans = "Venta Credito";
				$MontoTrans = $datos["amortizacion"];
			}
			
			foreach($otherdata as $key => $data){
				$Producto = $this->getDoctrine()
				->getRepository('DicarsDataBundle:Producto')
				->findOneBy(array('nproductoId' => $data['id']));
				
				if($TipoPago != '3'){
					
					$DetalleSalProd = new LogDetsalprod();
					$DetalleSalProd -> setNsalprod($SalProd);
					$DetalleSalProd -> setNproducto($Producto);
					$DetalleSalProd -> setDetsalprodcant($data['cantidad']);
					$DetalleSalProd -> setCdetsalprodest('1');
						
					$em->persist($DetalleSalProd);
				}
				
				if($TipoPago == '2'){
					$Unitario = $data['pcredito'];
					$MontoPro = $data['totalcredito'];
				}
				else{
					$Unitario = $data['pcontado'];
					$MontoPro = $data['totalcontado'];
				}
				
				$DetVenta = new VenDetventa();
				$DetVenta -> setNdetventacant( $data['cantidad']);
				$DetVenta -> setNdetventadscto($data['descuento']);
				$DetVenta -> setCdetventadesc($data['descoferta']);
				$DetVenta -> setNdetventaprecunt($Unitario);
				$DetVenta -> setNdetventatot($MontoPro);
				$DetVenta -> setNproducto($Producto);
				$DetVenta -> setNventa($Venta);
					
				$em->persist($DetVenta);
			}
			
			$Transaccion = new VenTransaccion();
			$Transaccion -> setCtransacciondesc($DesTrans);
			$Transaccion -> setDtransaccionfecreg($FechaReg);
			$Transaccion -> setNpersonal($EmpleadoTrans);
			$Transaccion -> setNtransaccionmont($MontoTrans);
			$Transaccion -> setNtransacciontippag(1);
			$Transaccion -> setNventa($Venta);
			
			$em -> persist($Transaccion);
			
			try {
				
				$em -> flush();
				
			} catch (Exception $e) {
				$em->rollback();
				$em->close();
				$return = array("responseCode"=>400, "greeting"=>"Bad");
				throw $e;
			}
			$em->commit();
			$em->clear();
			$em->close();
			$return = array("responseCode"=>200, "idventa"=>$Venta -> getNventaId());
		}
		else {
			$return = array("responseCode"=>400, "greeting"=>"Bad");
		}
		$return = json_encode($return);
		return new Response($return,200,array('Content-Type'=>'application/json'));
	}
	
	public function AnularVentaAction(){
		$request = $this->get('request');
		$form = $request->request->get('formulario');
		
		$datos = array();
		parse_str($form,$datos);
		
		$estado = null;
		
		if ($form!=null){
			$venta_id = $datos['venta_id'];
			
			$venta_estado = 0;
			
			$Venta = $this->getDoctrine()
			->getRepository('DicarsDataBundle:VenVenta')
			->findOneBy(array('nventaId' => $venta_id));
			
			$Venta->setCventaest($venta_estado);
			
			$em = $this->getDoctrine()->getEntityManager();
			$em->beginTransaction();
			try {
				$em->flush();
			} catch (Exception $e) {
				$em->rollback();
				$em->close();
				$return = array("responseCode"=>400, "greeting"=>"Bad");
					
				throw $e;
			}
				
			$em->commit();
			$em->clear();
			$em->close();
				
			$return = array("responseCode"=>200, "datos"=>$datos);
		}
		else {
			$return = array("responseCode"=>400, "greeting"=>"Bad");
		}
			
		$return = json_encode($return);
		return new Response($return,200,array('Content-Type'=>'application/json'));
	}
	
	public function EditarVentaAction(){
		$request = $this->get('request');
		$form = $request->request->get('formulario');
	
		$datos = array();
		parse_str($form,$datos);
	
		$pago = null;
	
		if ($form!=null){			

			$em = $this->getDoctrine()->getEntityManager();
			$em->beginTransaction();
			
			$venta_id = $datos['venta_id'];
			$pago = $datos['pagofinal'];
			$SerieSalida = $datos['serie_salida'];
			$NumeroSalida = $datos['numero_salida'];
			$FechaReg = new \DateTime();
			
			$Venta = $this->getDoctrine()
			->getRepository('DicarsDataBundle:VenVenta')
			->findOneBy(array('nventaId' => $venta_id));
			
			$userManager = $this->container->get('fos_user.user_manager');
			$user = $userManager->findUserByUsername($this->container->get('security.context')
					->getToken()
					->getUser());
	    	$EmpleadoTrans = $user->getNPersonal();
			
			$amortizacion  = $Venta -> getNventatotamt();
			$saldo = $Venta -> getNventasaldo();
			
			$Venta -> setNventatotamt($amortizacion + $pago);
			$Venta -> setNventasaldo($saldo - $pago);
			
			$Transaccion = new VenTransaccion();
			$Transaccion -> setCtransacciondesc("Pago Separacion");
			$Transaccion -> setDtransaccionfecreg($FechaReg);
			$Transaccion -> setNpersonal($EmpleadoTrans);
			$Transaccion -> setNtransaccionmont($pago);
			$Transaccion -> setNtransacciontippag(1);
			$Transaccion -> setNventa($Venta);
			
			$em -> persist($Transaccion);
			
			if(($saldo - $pago)<= 0){
					
				$Local = $this->getDoctrine()
				->getRepository('DicarsDataBundle:Local')
				->findOneBy(array('nlocalId' => 2));
				
				$SalProd = new  LogSalprod();
				$SalProd -> setNpersonal($EmpleadoTrans);
				$SalProd -> setNlocal($Local);
				$SalProd -> setCsalprodserie($SerieSalida);
				$SalProd -> setCsalprodnro($NumeroSalida);
				$SalProd -> setDsalprodfecreg($FechaReg);
				$SalProd -> setNsalprodmotivo(2);
				$SalProd -> setNsolicitanteId(1);
				$SalProd -> setCsalprodobsv("Salida por ventas");
				$em -> persist($SalProd);
				
				$VentaProductos = $this->getDoctrine()
				->getRepository('DicarsDataBundle:VenDetventa')
				->findBy(array('nventa' => $venta_id ));
				
				foreach ($VentaProductos as $key => $VentaProducto){
					$Producto = $VentaProducto -> getNproducto();
					$Cantidad = $VentaProducto -> getNdetventacant();
					 
					$DetalleSalProd = new LogDetsalprod();
					$DetalleSalProd -> setNsalprod($SalProd);
					$DetalleSalProd -> setNproducto($Producto);
					$DetalleSalProd -> setDetsalprodcant($Cantidad);
					$DetalleSalProd -> setCdetsalprodest('1');
										
					$em->persist($DetalleSalProd);
				}
				
				$Venta->setCventaest(2);
			}
			try {
				$em->flush();
			} catch (Exception $e) {
				$em->rollback();
				$em->close();
				$return = array("responseCode"=>400, "greeting"=>"Bad");
					
				throw $e;
			}
	
			$em->commit();
			$em->clear();
			$em->close();
	
			$return = array("responseCode"=>200,"amortizacion" =>$Venta -> getNventatotamt(),"saldo" =>$Venta -> getNventasaldo(), "datos"=>$datos);
		}
		else {
			$return = array("responseCode"=>400, "greeting"=>"Bad");
		}
			
		$return = json_encode($return);
		return new Response($return,200,array('Content-Type'=>'application/json'));
	}
	

}
