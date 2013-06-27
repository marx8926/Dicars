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
		$Local = null;
		$Fecha_reg = null;
		$Fecha_ent = null;
		$Observacion = null;
		
		if ($form != null){
			
			$Fecha_reg = date_create_from_format('d/m/Y', $datos["fechapedido"]);
				
			$Fecha_ent = date_create_from_format('d/m/Y', $datos["fechaentrega"]);
			
			$Observacion = $datos['observaciones'];
			
			$Local = $this->getDoctrine()
			->getRepository('DicarsDataBundle:Local')
			->findOneBy(array('nlocalId' => 1));			
			
			$Empleado = $this->getDoctrine()
			->getRepository('DicarsDataBundle:VenPersonal')
			->findOneBy(array('npersonalId' => 1));
			
			$Pedido = new  LogOrdped();
			$Pedido -> setCordpedserie('qwer');
			$Pedido -> setCordpednro('12345678');
			$Pedido -> setCordpedenvemail('1');
			$Pedido -> setCordpedest('1');
			$Pedido -> setCordpedobsv($Observacion);
			$Pedido -> setDordpedfecreg($Fecha_reg);
			$Pedido -> setDordepedfecent($Fecha_ent);
			$Pedido -> setNlocal($Local);
			$Pedido -> setNpersonal($Empleado);
			
			$em = $this->getDoctrine()->getEntityManager();
			$this->getDoctrine()->getEntityManager()->beginTransaction();
			try {
				$em->persist($Pedido);
				$em->flush();	
				
				foreach($otherdata as $key => $data){
					$Producto = $this->getDoctrine()
					->getRepository('DicarsDataBundle:Producto')
					->findOneBy(array('nproductoId' => $data['id']));
					
					$DetallePedido = new LogDetordped();
					$DetallePedido -> setNdetordpedcant($data['cantidad']);
					$DetallePedido -> setNordped($Pedido);
					$DetallePedido -> setNproducto($Producto);
					$DetallePedido -> setNdetordpedcantacept(10);
					$DetallePedido -> setCdetordpedest('1');
					$em->persist($DetallePedido);
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
