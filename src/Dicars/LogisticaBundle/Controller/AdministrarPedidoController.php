<?php
namespace Dicars\LogisticaBundle\Controller;

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
		$Codigo = null;
		$Nro = null;
		$Local = null;
		$Fecha_reg = null;
		$Fecha_ent = null;
		$Observacion = null;
		
		if ($form != null){
			
			$Codigo = $datos['codigo'];
			
			$Local = 
			
			
			$Pedido = new  LogOrdped();
			$Pedido -> setCordpedobsv($Observacion);
			/*
				
			$em = $this->getDoctrine()->getEntityManager();
			$this->getDoctrine()->getEntityManager()->beginTransaction();
			try {
				$em->persist($Producto);
				$em->flush();
			} catch (Exception $e) {
				$this->getDoctrine()->getEntityManager()->rollback();
				$this->getDoctrine()->getEntityManager()->close();
				$return = array("responseCode"=>400, "greeting"=>"Bad");
					
				throw $e;
			}
			$this->getDoctrine()->getEntityManager()->commit();
			$em->clear();*/
			$return = array("responseCode"=>200, "datos"=>$otherdata);
				
		}
		else {
			$return = array("responseCode"=>400, "greeting"=>"Bad");
		}
		
		$return = json_encode($return);
		return new Response($return,200,array('Content-Type'=>'application/json'));
		}

}
