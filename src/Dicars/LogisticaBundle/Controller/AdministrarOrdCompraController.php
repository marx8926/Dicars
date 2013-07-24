<?php
namespace Dicars\LogisticaBundle\Controller;

use Dicars\DataBundle\Entity\LogOrdcom;

use Dicars\DataBundle\Entity\LogDetcompra;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\ORM\TransactionRequiredException;

class AdministrarOrdCompraController extends Controller{
	
	public function RegistrarOrdCompraAction(){
		$request = $this->get('request');
		$form = $request->request->get('formulario');
		$otherdata = $request->request->get('otherdata');
	
		$datos = array();
		parse_str($form,$datos);
	
		$Empleado = null;
		$Proveedor = null;
		$Fecha_reg = null;
		$Serie = null;
		$Numero = null;
		$Subtotal = null;
		$Subtotal = null;
		$IGV = null;
		$Total = null;
		$Observacion = null;
		$Estado = null;
		$Descuento = null;
		$RecEquivalente = null;
		$Retencion = null;
	
		if ($form != null){
				
			$Empleado = $this->getDoctrine()
			->getRepository('DicarsDataBundle:VenPersonal')
			->findOneBy(array('npersonalId' => 1));
			
			$Proveedor = $this->getDoctrine()
			->getRepository('DicarsDataBundle:LogProveedor')
			->findOneBy(array('nproveedorId' => $datos['proveedor_id']));
			
			$Fecha_reg = new \DateTime();
			
			$Serie = $datos['serie'];
			$Numero = $datos['numero'];
			
			$Subtotal = $datos['subtotal'];
			$IGV = $datos['igv'];
			$Total = $datos['total'];
							
			$Observacion = $datos['observaciones'];
			
			$Estado = $datos['selectEstado'];
			
			$Descuento = $datos['descuento'];
			$RecEquivalente = $datos['recequiv'];
			$Retencion = $datos['retencion'];
				
			$OrdCompra = new  LogOrdcom();
			$OrdCompra -> setNpersonal($Empleado);
			$OrdCompra -> setNproveedor($Local);
			$OrdCompra -> setOrdcomfecreg($Fecha_reg);
			$OrdCompra -> setCordcomserie($Serie);
			$OrdCompra -> setCordcomnro($Numero);
			$OrdCompra -> setNordcomsubtotal($Subtotal);
			$OrdCompra -> setNordcomigv($IGV);
			$OrdCompra -> setNordcomtotal($Total);
			$OrdCompra -> setCordcomobsv($Observacion);
			$OrdCompra -> setCordcomest($Estado);
			$OrdCompra -> setNordcomdesct($Descuento);
			$OrdCompra -> setNordcomreceqv($RecEquivalente);
			$OrdCompra -> setNordcomretencion($Retencion);
				
			$em = $this->getDoctrine()->getEntityManager();
			$this->getDoctrine()->getEntityManager()->beginTransaction();
			try {
				$em->persist($OrdCompra);
				$em->flush();
	
				foreach($otherdata as $key => $data){
					$Producto = $this->getDoctrine()
					->getRepository('DicarsDataBundle:Producto')
					->findOneBy(array('nproductoId' => $data['id']));
						
					$DetalleCompra = new LogDetcompra();
					$DetalleCompra -> setNdetordpedcant($data['cantidad']);
					$DetalleCompra -> setNordped($Pedido);
					$DetalleCompra -> setNproducto($Producto);
					$DetalleCompra -> setNdetordpedcantacept(10);
					$DetalleCompra -> setCdetordpedest('1');
					$em->persist($DetalleCompra);
					$em->flush();
						
				}
	
			} catch (Exception $e) {
				$this->getDoctrine()->getEntityManager()->rollback();
				$this->getDoctrine()->getEntityManager()->close();
				$return = array("responseCode"=>400, "greeting"=>"Bad");
					
				throw $e;
			}
			$this->getDoctrine()->getEntityManager()->commit();
			$em->clear();
			$return = array("responseCode"=>200, "datos"=>$datos);
	
		}
		else {
			$return = array("responseCode"=>400, "greeting"=>"Bad");
		}
	
		$return = json_encode($return);
		return new Response($return,200,array('Content-Type'=>'application/json'));
	}

}
