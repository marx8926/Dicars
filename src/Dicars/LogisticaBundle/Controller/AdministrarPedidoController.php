<?php
namespace Dicars\LogisticaBundle\Controller;

use Dicars\DataBundle\Entity\LogDetordped;
use Dicars\DataBundle\Entity\LogOrdped;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\ORM\TransactionRequiredException;

class AdministrarPedidoController extends Controller{
	
	public function RegistrarPedidoAction(){
		$request = $this->get('request');
		$form = $request->request->get('formulario');
		$otherdata = $request->request->get('otherdata');
		
		$datos = array();
		parse_str($form,$datos);
		
		$Serie = null;
		$Numero = null;
		$Email = null;
		$Local = null;
		$Fecha_reg = null;
		$Fecha_ent = null;
		$Observacion = null;
		
		if ($form != null){
			
			$Serie = $datos['serie'];
			$Numero = $datos['numero'];
			$Email = $datos['email'];
			$Fecha_reg = date_create_from_format('d/m/Y', $datos["fechapedido"]);
			$Fecha_ent = date_create_from_format('d/m/Y', $datos["fechaentrega"]);
			$Observacion = $datos['observaciones'];
			
			$Local = $this->getDoctrine()
			->getRepository('DicarsDataBundle:Local')
			->findOneBy(array('nlocalId' => 2));			
			
			$Empleado = $this->getDoctrine()
			->getRepository('DicarsDataBundle:VenPersonal')
			->findOneBy(array('npersonalId' => 1));
			
			$Pedido = new  LogOrdped();
			$Pedido -> setCordpedserie($Serie);
			$Pedido -> setCordpednro($Numero);
			$Pedido -> setCordpedenvemail($Email);
			$Pedido -> setCordpedest('1'); //HABILITADO
			$Pedido -> setCordpedobsv($Observacion);
			$Pedido -> setDordpedfecreg($Fecha_reg);
			$Pedido -> setDordepedfecent($Fecha_ent);
			$Pedido -> setNlocal($Local);
			$Pedido -> setNpersonal($Empleado);
			
			$em = $this->getDoctrine()->getEntityManager();
			$em->beginTransaction();
			
			$em->persist($Pedido);			
			
			foreach($otherdata as $key => $data){
				$Producto = $this->getDoctrine()
				->getRepository('DicarsDataBundle:Producto')
				->findOneBy(array('nproductoId' => $data['idproducto']));
				
				$DetallePedido = new LogDetordped();
				$DetallePedido -> setNdetordpedcant($data['cantidad']);
				$DetallePedido -> setNordped($Pedido);
				$DetallePedido -> setNproducto($Producto);
				$DetallePedido -> setNdetordpedcantacept(0);
				$DetallePedido -> setCdetordpedest('0'); //no atendido
				$em->persist($DetallePedido);
				$em->flush();				
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
		
	public function EliminarPedidoAction(){
		$request = $this->get('request');
		$form = $request->request->get('formulario');
		
		$datos = array();
		parse_str($form,$datos);
		
		$idPedido = null;
			
		if ($form != null){				
			$idPedido = $datos['idpedprod'];
							
			$Pedido = $this->getDoctrine()
			->getRepository('DicarsDataBundle:LogOrdped')
			->findOneBy(array('nordpedId' => $idPedido));
			
			$Pedido -> setCordpedest('0');
			
			$DetOrdPeds =  $this->getDoctrine()
			->getRepository('DicarsDataBundle:LogDetordped')
			->findBy(array('nordped' => $idPedido));
			
			foreach($DetOrdPeds as $key => $DetOrdPed){
				$DetOrdPed -> setCdetordpedest('3'); //eliminado
			}
			
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
