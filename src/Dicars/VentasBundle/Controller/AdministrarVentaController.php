<?php
namespace Dicars\VentasBundle\Controller;

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
		
		
		if ($form!=null){
			
			$Estado = '1';
			$FechaReg = new \DateTime();
			$Observacion = $datos["observacion"];
			
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
			
			$NumCuotas = $datos["num_cuotas"];
			$FechaDiaPago = date_create_from_format('d/m/Y', $datos["prim_cuota"]);
			
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
			
			$em = $this->getDoctrine()->getEntityManager();
			$this->getDoctrine()->getEntityManager()->beginTransaction();
			try {
				$em->persist($Venta);
				$em->flush();
				
				foreach($otherdata as $key => $data){
					$Producto = $this->getDoctrine()
					->getRepository('DicarsDataBundle:Producto')
					->findOneBy(array('nproductoId' => $data['id']));
					if($TipoPago == '1'){
						$Unitario = $data['pcontado'];
						$MontoPro = $data['totalcontado'];
					}
					else{
						$Unitario = $data['pcredito'];
						$MontoPro = $data['totalcredito'];
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
					$em->flush();
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
					$em->flush();
					
					for($i = 0 ; $i < $NumCuotas; $i++){
						
						$CronoPago = new VenCronpago();
						$CronoPago -> setNcronpagofecpago($FechaDiaPago);
						$CronoPago -> setNcronpagofecreg($FechaDiaPago);
						$CronoPago -> setNcronpagomoncouapg($datos["montocuota"]);
						$CronoPago -> setNcronpagomoncouapl(0);
						$CronoPago -> setNvencredito($VentaCredito);
						$CronoPago -> setNcronpagonrocuota($i+1);
						
						$em->persist($CronoPago);
						$em->flush();
						
						$FechaDiaPago -> modify('+7 day');
					}
				}
				
			} catch (Exception $e) {
				$this->getDoctrine()->getEntityManager()->rollback();
				$this->getDoctrine()->getEntityManager()->close();
				$return = array("responseCode"=>400, "greeting"=>"Bad");
				throw $e;
			}
			$this->getDoctrine()->getEntityManager()->commit();
			$em->clear();
			$return = array("responseCode"=>200, "datos"=>$datos, "otherdata"=>$otherdata);
		}
		else {
			$return = array("responseCode"=>400, "greeting"=>"Bad");
		}
		$return = json_encode($return);
		return new Response($return,200,array('Content-Type'=>'application/json'));
	}

}
