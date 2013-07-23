<?php
namespace Dicars\AdminBundle\Controller;

use Dicars\DataBundle\Entity\VenTipoigv;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\ORM\TransactionRequiredException;

class AdministrarTipoIGVController  extends Controller{
	
	public function RegistrarTipoIGVAction(){
		$request = $this->get('request');
		$form = $request->request->get('formulario');
	
		$datos = array();
		parse_str($form,$datos);
	
		$TipoIGV_tipoigv = null;
		$TipoIGV_porcentaje = null;		
		$TipoIGV_estado = null;
		$TipoIGV_fechareg = null;
	
		if ($form!=null){
				/**/
			$TipoIGV_tipoigv = $datos["tipo"];
			$TipoIGV_porcentaje = $datos["porc"];
			$TipoIGV_estado = $datos["estado"];				
			$TipoIGV_fechareg = new \DateTime();
				
			$VenTipoigv = new VenTipoigv();
			$VenTipoigv->setCtipoigv($TipoIGV_tipoigv);
			$VenTipoigv->setNtipoigvproc($TipoIGV_porcentaje);			
			$VenTipoigv->setCtipoigvest($TipoIGV_estado);	
			$VenTipoigv->setDtipoigvfecreg($TipoIGV_fechareg);
				
			$em = $this->getDoctrine()->getEntityManager();
			$this->getDoctrine()->getEntityManager()->beginTransaction();
			try {
				$em->persist($VenTipoigv);
				$em->flush();
			} catch (Exception $e){
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
	
	public function EditarTipoIGVAction(){
	
		$request = $this->get('request');
		$form = $request->request->get('formulario');
	
		$datos = array();
		parse_str($form,$datos);
	
		$TipoIGV_tipoigv = null;
		$TipoIGV_porcentaje = null;		
		$TipoIGV_estado = null;
	
		if ($form != null){
	
			$TipoIGV_id = $datos["id"];
			$TipoIGV_tipoigv = $datos["tipoE"];
			$TipoIGV_porcentaje = $datos["porcE"];
			$TipoIGV_estado = $datos["estadoE"];
	
			$TipoIGV = $this->getDoctrine()
			->getRepository('DicarsDataBundle:VenTipoigv')
			->findOneBy(array('ntipoigv' => $TipoIGV_id));
	
			$TipoIGV->setCtipoigv($TipoIGV_tipoigv);
			$TipoIGV->setNtipoigvproc($TipoIGV_porcentaje);
			$TipoIGV->setCtipoigvest($TipoIGV_estado);
	
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