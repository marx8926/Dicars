<?php
namespace Dicars\AdminBundle\Controller;

use Dicars\DataBundle\Entity\VenTipomoneda;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\ORM\TransactionRequiredException;

class AdministrarTipoMonedaController extends Controller {
	
	public function RegistrarTipoMonedaAction(){
	
		$request = $this->get('request');
		$form = $request->request->get('formulario');
	
		$datos = array();
		parse_str($form,$datos);
	
		$Desc = null;
		$Monto = null;
		$Est = null;
	
		if ($form!=null){
			$Desc = $datos["desc_tipomoneda"];
			$Monto = $datos["monto"];
			$Est = $datos["selectEstado"];
	
			$TipMoneda = new VenTipomoneda();
			$TipMoneda->setCtipomonedadesc($Desc);
			$TipMoneda->setNtipomonedamont($Monto);
			$TipMoneda->setNtipomonedaest($Est);
	
			$em = $this->getDoctrine()->getEntityManager();
			$this->getDoctrine()->getEntityManager()->beginTransaction();
			try {
				$em->persist($TipMoneda);
				$em->flush();
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
	
	public function EditarTipoMonedaAction(){
	
		$request = $this->get('request');
		$form = $request->request->get('formulario');
	
		$datos = array();
		parse_str($form,$datos);
	
		$Desc = null;
		$Monto = null;
		$Est = null;
	
		if ($form != null){
	
			$id = $datos["id"];
	
			$Desc = $datos["desc_tipomonedaE"];
			$Monto = $datos["montoE"];
			$Est = $datos["selectEstadoE"];
	
			$TipMoneda = $this->getDoctrine()
			->getRepository('DicarsDataBundle:VenTipomoneda')
			->findOneBy(array('ntipomoneda' => $id));
	
			$TipMoneda->setCtipomonedadesc($Desc);
			$TipMoneda->setNtipomonedamont($Monto);
			$TipMoneda->setNtipomonedaest($Est);
	
			$em = $this->getDoctrine()->getEntityManager();
			$this->getDoctrine()->getEntityManager()->beginTransaction();
	
			try {
				$em->flush();
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
