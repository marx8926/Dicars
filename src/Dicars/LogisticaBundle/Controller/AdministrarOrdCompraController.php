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
				
			$userManager = $this->container->get('fos_user.user_manager');
			$user = $userManager->findUserByUsername($this->container->get('security.context')
					->getToken()
					->getUser());
			$Empleado = $user->getNPersonal();
			
			$Proveedor = $this->getDoctrine()
			->getRepository('DicarsDataBundle:LogProveedor')
			->findOneBy(array('nproveedorId' => $datos['proveedor_id']));
			
			$Fecha_reg = new \DateTime();
			
			$Serie = '1234';
			$Numero = '12345678';
			
			$Subtotal = $datos['subtotal'];
			$IGV = $datos['igv'];
			$Total = $datos['total'];
							
			$Observacion = $datos['observaciones'];
			
			$Estado = 1;
			
			$Descuento = $datos['descuento'];
			$RecEquivalente = 0;
			$Retencion = 0;
				
			$OrdCompra = new  LogOrdcom();
			$OrdCompra -> setNpersonal($Empleado);
			$OrdCompra -> setNproveedor($Proveedor);
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
			$em->beginTransaction();
			
			$em->persist($OrdCompra);

			foreach($otherdata as $key => $data){
				$Producto = $this->getDoctrine()
				->getRepository('DicarsDataBundle:Producto')
				->findOneBy(array('nproductoId' => $data['idproducto']));
					
				$DetalleCompra = new LogDetcompra();
				$DetalleCompra -> setNordencompra($OrdCompra);
				$DetalleCompra -> setNdetcompracant($data['cantidad']);
				$DetalleCompra -> setNdetcompraprecunt($data['pordcom']);
				$DetalleCompra -> setNdetcompraimporte($data['importe']);
				$DetalleCompra -> setNproducto($Producto);
				$DetalleCompra -> setNdetordordped($data['iddetordped']);
				$DetalleCompra -> setCdetcompraest(1);
				
				$em->persist($DetalleCompra);
					
				if($data['iddetordped'] != 0){
					$DetallePed = $this->getDoctrine()
					->getRepository('DicarsDataBundle:LogDetordped')
					->findOneBy(array('ndetordpedId' => $data['iddetordped']));
						
					$DetallePed -> setCdetordpedest($data['estadopedido']);
					$Aceptada = $DetallePed -> getNdetordpedcantacept() + $data['cantidad'];
					$DetallePed -> setNdetordpedcantacept($Aceptada);					
				}
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
			$return = array("responseCode"=>200, "datos"=>$datos);
	
		}
		else {
			$return = array("responseCode"=>400, "greeting"=>"Bad");
		}
	
		$return = json_encode($return);
		return new Response($return,200,array('Content-Type'=>'application/json'));
	}
	
	public function EliminarOrdCompraAction(){
		$request = $this->get('request');
		$form = $request->request->get('formulario');
			
		$datos = array();
		parse_str($form,$datos);
			
		$idPedido = null;
	
		if ($form != null){
			$idOrdCompra = $datos['idordcompra'];
	
			$OrdCompra = $this->getDoctrine()
			->getRepository('DicarsDataBundle:LogOrdCom')
			->findOneBy(array('nordencomId' => $idOrdCompra));
	
			$OrdCompra -> setCordcomest('0');
	
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

}
