<?php
namespace Dicars\AdminBundle\Controller;

use Dicars\DataBundle\Entity\VenZona;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\ORM\TransactionRequiredException;

class AdministrarZonaController extends Controller{
	
	public function RegistrarZonaAction(){
	
		$request = $this->get('request');
		$form = $request->request->get('formulario');
	
		$datos = array();
		parse_str($form,$datos);
	
		$Desc = null;
		$Est = null;
		$Ubigeo = null;
	
		if ($form!=null){
			$Desc = $datos["desc"];
			$Est = $datos["selectEstado"];
			$Ubigeo = $this->getDoctrine()
			->getRepository('DicarsDataBundle:Ubigeo')
			->findOneBy(array('nubigeoId'  => $datos["dist"]));
	
			$Zona = new VenZona();
			$Zona->setCzonadesc($Desc);
			$Zona->setNzonaest($Est);
			$Zona->setNubigeo($Ubigeo);
	
			$em = $this->getDoctrine()->getEntityManager();
			$em->beginTransaction();
			try {
				$em->persist($Zona);
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
			$return = array("responseCode"=>200, "datos"=>$Ubigeo);
		}
		else {
			$return = array("responseCode"=>400, "greeting"=>"Bad");
		}
	
		$return = json_encode($return);
		return new Response($return,200,array('Content-Type'=>'application/json'));
	}
	
	public function EditarZonaAction(){
	
		$request = $this->get('request');
		$form = $request->request->get('formulario');
	
		$datos = array();
		parse_str($form,$datos);
	
		$Desc = null;
		$Est = null;
		$Ubigeo = null;
	
		if ($form != null){
	
			$id = $datos["id"];
	
			$Desc = $datos["descE"];
			$Est = $datos["selectEstadoE"];
			$Ubigeo = $this->getDoctrine()
			->getRepository('DicarsDataBundle:Ubigeo')
			->findOneBy(array('nubigeoId'  => $datos["distE"]));
	
			$Zona = $this->getDoctrine()
			->getRepository('DicarsDataBundle:VenZona')
			->findOneBy(array('nzonaId' => $id));
	
			$Zona->setCzonadesc($Desc);
			$Zona->setNzonaest($Est);
			$Zona->setNubigeo($Ubigeo);
	
			$em = $this->getDoctrine()->getEntityManager();
			$em->beginTransaction();
	
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
