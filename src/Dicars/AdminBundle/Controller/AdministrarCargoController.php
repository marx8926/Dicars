<?php
namespace Dicars\AdminBundle\Controller;

use Dicars\DataBundle\Entity\VenCargo;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\ORM\TransactionRequiredException;

class AdministrarCargoController extends Controller {
	
	public function RegistrarCargoAction(){
		$request = $this->get('request');
		$form = $request->request->get('formulario');
	
		$datos = array();
		parse_str($form,$datos);
	
		$CargoDesc = null;
		$CargoEst = null;
		
		if ($form!=null){
			$CargoDesc = $datos["nom_cargo"];
			$CargoEst = $datos["selectEstado"];
				
			$Cargo = new VenCargo();
			$Cargo->setNcargodesc($CargoDesc);
			$Cargo->setCcargocoest($CargoEst);
				
			$em = $this->getDoctrine()->getEntityManager();
			$this->getDoctrine()->getEntityManager()->beginTransaction();
			try {
				$em->persist($Cargo);
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
	
	public function EditarCargoAction(){
	
		$request = $this->get('request');
		$form = $request->request->get('formulario');
	
		$datos = array();
		parse_str($form,$datos);
	
		$CargoEst = null;
	
		if ($form != null){
				
			$Cargoid = $datos["id"];
			$CargoEst = $datos["selectEstadoE"];
				
			$Cargo = $this->getDoctrine()
			->getRepository('DicarsDataBundle:VenCargo')
			->findOneBy(array('ncargoId' => $Cargoid));
				
			$Cargo->setCcargocoest($CargoEst);
	
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
