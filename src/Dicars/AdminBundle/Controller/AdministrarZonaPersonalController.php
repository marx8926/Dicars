<?php
namespace Dicars\AdminBundle\Controller;

use Dicars\DataBundle\Entity\VenZonapersonal;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\ORM\TransactionRequiredException;

class AdministrarZonaPersonalController extends Controller{
	
	public function RegistrarZonaPersonalAction(){
		$request = $this->get('request');
		$form = $request->request->get('formulario');
		
		$datos = array();
		parse_str($form,$datos);
		
		$Personal = null;
		$Zona = null;
		
		if ($form!=null){
			$Personal = $this->getDoctrine()
			->getRepository('DicarsDataBundle:VenPersonal')
			->findOneBy(array('npersonalId'  => $datos["id_trabajador"]));
			
			$Zona = $this->getDoctrine()
			->getRepository('DicarsDataBundle:VenZona')
			->findOneBy(array('nzonaId' => $datos["id_zona"]));
			
		
			$ZonaPersonal = new VenZonapersonal();
			$ZonaPersonal -> setNpersonal($Personal);
			$ZonaPersonal -> setNzona($Zona);
		
			$em = $this->getDoctrine()->getEntityManager();
			$em->beginTransaction();
			try {
				$em->persist($ZonaPersonal);
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
	
	public function EditarZonaPersonalAction(){
		$request = $this->get('request');
		$form = $request->request->get('formulario');
	
		$datos = array();
		parse_str($form,$datos);
	
		$Personal = null;
		
		if ($form!=null){
			$Personal = $this->getDoctrine()
			->getRepository('DicarsDataBundle:VenPersonal')
			->findOneBy(array('npersonalId'  => $datos["id_trabajador"]));
				
			$ZonaPersonal = $this->getDoctrine()
			->getRepository('DicarsDataBundle:VenZonapersonal')
			->findOneBy(array('nzonapersonalId' => $datos["idzonapersonal"]));
			
			$ZonaPersonal -> setNpersonal($Personal);
		
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
