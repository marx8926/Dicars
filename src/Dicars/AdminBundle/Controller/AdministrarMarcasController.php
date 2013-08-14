<?php
namespace Dicars\AdminBundle\Controller;

use Dicars\DataBundle\Entity\VenMarca;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\ORM\TransactionRequiredException;

class AdministrarMarcasController extends Controller{
	
	public function RegistrarMarcaAction(){
		
		$request = $this->get('request');
		$form = $request->request->get('formulario');
	
		$datos = array();
		parse_str($form,$datos);
		
		$MarcaDesc = null;
		$MarcaEst = null;
	
		if ($form!=null){
			$MarcaDesc = $datos["desc_marca"];
			$MarcaEst = $datos["selectEstado"];
	
			$Marca = new VenMarca();
			$Marca->setCmarcadesc($MarcaDesc);
			$Marca->setCmarcaest($MarcaEst);
	
			$em = $this->getDoctrine()->getEntityManager();
			$em->beginTransaction();
			try {
				$em->persist($Marca);
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
	
	public function EditarMarcaAction(){
	
		$request = $this->get('request');
		$form = $request->request->get('formulario');
	
		$datos = array();
		parse_str($form,$datos);
	
		$MarcaDesc = null;
		$MarcaEst = null;
	
		if ($form != null){
	
			$Marcaid = $datos["id"];
	
			$MarcaDesc = $datos["desc_marcaE"];
			$MarcaEst = $datos["selectEstadoE"];
				
			$Marca = $this->getDoctrine()
			->getRepository('DicarsDataBundle:VenMarca')
			->findOneBy(array('nmarcaId' => $Marcaid));
	
			$Marca->setCmarcadesc($MarcaDesc);
			$Marca->setCmarcaest($MarcaEst);
	
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
