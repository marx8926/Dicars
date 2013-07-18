<?php
namespace Dicars\VentasBundle\Controller;

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
			
		$Cliente_nombre = null;
		$Cliente_apellido = null;
		$Cliente_dni = null;
		$Cliente_referencia = null;
		$Cliente_direccion = null;
		$Cliente_zona = null;
		$Cliente_linea_op = null;
		$Cliente_arc_credito = null;
		$Cliente_ocup = null;
		
		if ($form!=null){
				/*
			$em = $this->getDoctrine()->getEntityManager();
			$this->getDoctrine()->getEntityManager()->beginTransaction();
			try {
				$em->persist($Cliente);
				$em->flush();
			} catch (Exception $e) {
				$this->getDoctrine()->getEntityManager()->rollback();
				$this->getDoctrine()->getEntityManager()->close();
				$return = array("responseCode"=>400, "greeting"=>"Bad");
				throw $e;
			}
			$this->getDoctrine()->getEntityManager()->commit();
			$em->clear();*/
			$return = array("responseCode"=>200, "datos"=>$datos);
		}
		else {
			$return = array("responseCode"=>400, "greeting"=>"Bad");
		}
		$return = json_encode($return);
		return new Response($return,200,array('Content-Type'=>'application/json'));
	}

}
