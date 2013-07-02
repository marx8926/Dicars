<?php
namespace Dicars\AdminBundle\Controller;

use Dicars\DataBundle\Entity\Constante;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\ORM\TransactionRequiredException;

class AdministrarConstantesController extends Controller{
	
	public function RegistrarConstanteAction(){
		$request = $this->get('request');
		$form = $request->request->get('formulario');
		
		$datos = array();
		parse_str($form,$datos);
		
		$Clase = null;
		$Descripcion = null;
		$Valor = null;
		
		if ($form!=null){
			$Clase = $datos["clase"];
			$Descripcion = $datos["nom_clase"];
			$Valor = $datos["valor"];
		
			$Constante = new Constante();
			$Constante -> setNconstanteclase($Clase);
			$Constante -> setCconstantedesc($Descripcion);
			$Constante -> setCconstantevalor($Valor);
		
			$em = $this->getDoctrine()->getEntityManager();
			$this->getDoctrine()->getEntityManager()->beginTransaction();
			try {
				$em->persist($Constante);
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
	
	public function EditarConstanteAction(){
	
		$request = $this->get('request');
		$form = $request->request->get('formulario');
	
		$datos = array();
		parse_str($form,$datos);
	
		$Clase = null;
		$Descripcion = null;
		$Valor = null;
	
		if ($form != null){
	
			$Constanteid = $datos["id"];
			$Clase = $datos["claseE"];
			$Descripcion = $datos["nom_claseE"];
			$Valor = $datos["valorE"];
	
			$Constante = $this->getDoctrine()
			->getRepository('DicarsDataBundle:Constante')
			->findOneBy(array('nconstanteId' => $Constanteid));
	
			$Constante->setNconstanteclase($Clase);
			$Constante->setCconstantedesc($Descripcion);
			$Constante->setCconstantevalor($Valor);
	
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