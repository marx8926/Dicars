<?php
namespace Dicars\LogisticaBundle\Controller;

use Dicars\DataBundle\Entity\Local;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\ORM\TransactionRequiredException;

class AdministrarLocalController extends Controller{
	
	public function RegistrarLocalAction(){
		$request = $this->get('request');
		$form = $request->request->get('formulario');
	
		$datos = array();
		parse_str($form,$datos);
	
		$LocalNombre = null;
		$LocalEstado = null;
		$LocalTel = null;
		$LocalDirec = null;
		$LocalUbigeo = null;
		$LocalTipRub = null;
	
		if ($form!=null){
			$LocalNombre = $datos["nombre_tienda"];
			$LocalEstado = $datos["estado"];
			$LocalTel = $datos["telefono"];
			$LocalDirec = $datos["direccion"];
			
			$LocalUbigeo = $this->getDoctrine()
			->getRepository('DicarsDataBundle:Ubigeo')
			->findOneBy(array('nubigeoId'  => $datos["dist"]));
			
			$LocalTipRub = $datos["tiprub"];
				
			$Local = new Local();
			$Local->setClocaldesc($LocalNombre);
			$Local->setNlocalest($LocalEstado);
			$Local->setClocaltelf($LocalTel);
			$Local->setClocaldirec($LocalDirec);			
			$Local->setNubigeo($LocalUbigeo);
			$Local->setNlocaltiprub($LocalTipRub);
				
			$em = $this->getDoctrine()->getEntityManager();
			$this->getDoctrine()->getEntityManager()->beginTransaction();
			try {
				$em->persist($Local);
				$em->flush();
			} catch (Exception $e) {
				$this->getDoctrine()->getEntityManager()->rollback();
				$this->getDoctrine()->getEntityManager()->close();
				$return = array("responseCode"=>400, "greeting"=>"Bad");
					
				throw $e;
			}
			$this->getDoctrine()->getEntityManager()->commit();
			$return = array("responseCode"=>200, "datos"=>$datos);
		}
		else { 
			$return = array("responseCode"=>400, "greeting"=>"Bad");
		}
	
		$return = json_encode($return);
		return new Response($return,200,array('Content-Type'=>'application/json'));
	}
	
	public function EditarLocalAction(){
		$request = $this->get('request');
		$form = $request->request->get('formulario');
	
		$datos = array();
		parse_str($form,$datos);
	
		$LocalNombre = null;
		$LocalEstado = null;
		$LocalTel = null;
		$LocalDirec = null;
		$LocalUbigeo = null;
		$LocalTipRub = null;
	
		if ($form!=null){
			$LocalId = $datos["id"];
			$LocalNombre = $datos["nombre_tiendaE"];
			$LocalEstado = $datos["estadoE"];
			$LocalTel = $datos["telefonoE"];
			$LocalDirec = $datos["direccionE"];
				
			$LocalUbigeo = $this->getDoctrine()
			->getRepository('DicarsDataBundle:Ubigeo')
			->findOneBy(array('nubigeoId'  => $datos["distE"]));
				
			$LocalTipRub = $datos["tiprubE"];
	
			$Local = $this->getDoctrine()
			->getRepository('DicarsDataBundle:Local')
			->findOneBy(array('nlocalId' => $LocalId));
			
			$Local->setClocaldesc($LocalNombre);
			$Local->setNlocalest($LocalEstado);
			$Local->setClocaltelf($LocalTel);
			$Local->setClocaldirec($LocalDirec);
			$Local->setNubigeo($LocalUbigeo);
			$Local->setNlocaltiprub($LocalTipRub);
	
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
			$return = array("responseCode"=>200, "datos"=>$datos);
		}
		else {
			$return = array("responseCode"=>400, "greeting"=>"Bad");
		}
	
		$return = json_encode($return);
		return new Response($return,200,array('Content-Type'=>'application/json'));
	}
	
}