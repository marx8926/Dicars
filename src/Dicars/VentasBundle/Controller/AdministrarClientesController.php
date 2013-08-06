<?php
namespace Dicars\VentasBundle\Controller;

use Dicars\DataBundle\Entity\VenCliente;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\ORM\TransactionRequiredException;

class AdministrarClientesController extends Controller{
	
	public function RegistrarClienteAction(){
	
		$request = $this->get('request');
		$form = $request->request->get('formulario');
	
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
					
			$Cliente_nombre = $datos["nombres"];
			$Cliente_apellido = $datos["apellidos"];							
			$Cliente_dni = $datos["dni"];
			$Cliente_referencia = $datos["referencia"];
			$Cliente_direccion = $datos["direccion"];
			
			$Cliente_zona =  $this->getDoctrine()
			->getRepository('DicarsDataBundle:VenZona')
			->findOneBy(array('nzonaId' => $datos["zona"]));
			
			$Cliente_linea_op = $datos["lineaop"];
			$Cliente_arc_credito = $datos["arccredito"];
			$Cliente_ocup = $datos["ocupacion"];										
				
			$Cliente = new VenCliente();
			$Cliente->setCclientenom($Cliente_nombre);
			$Cliente->setCclienteape($Cliente_apellido);
			$Cliente->setCclientedni($Cliente_dni);
			$Cliente->setCclienteref($Cliente_referencia);
			$Cliente->setCclientecdir($Cliente_direccion);
			$Cliente->setNzona($Cliente_zona);
			$Cliente->setNclientelineaop($Cliente_linea_op);
			$Cliente->setCclientearccredito($Cliente_arc_credito);
			$Cliente->setCclienteocup($Cliente_ocup);
									
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
			$em->clear();
			$return = array("responseCode"=>200, "datos"=>$datos);				
		}
		else {
			$return = array("responseCode"=>400, "greeting"=>"Bad");
		}	
		$return = json_encode($return);
		return new Response($return,200,array('Content-Type'=>'application/json'));
	}

	//EDITAR CLIENTE
	public function EditarClienteAction(){
		$request = $this->get('request');
		$form = $request->request->get('formulario');
	
		$datos = array();
		parse_str($form,$datos);
	
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
			
			$Cliente_Id = $datos["idE"];
			$Cliente_nombre = $datos["nombresE"];
			$Cliente_apellido = $datos["apellidosE"];
			$Cliente_dni = $datos["dniE"];
			$Cliente_referencia = $datos["referenciaE"];
			$Cliente_direccion = $datos["direccionE"];
			
			$Cliente_zona =  $this->getDoctrine()
			->getRepository('DicarsDataBundle:VenZona')
			->findOneBy(array('nzonaId' => $datos["zonaE"]));
			
			$Cliente_linea_op = $datos["lineaopE"];
			$Cliente_arc_credito = $datos["arccreditoE"];
			$Cliente_ocup = $datos["ocupacionE"];			
			
			$Cliente = $this->getDoctrine()
			->getRepository('DicarsDataBundle:VenCliente')
			->findOneBy(array('nclienteId' => $Cliente_Id));
			
			$Cliente->setCclientenom($Cliente_nombre);
			$Cliente->setCclienteape($Cliente_apellido);
			$Cliente->setCclientedni($Cliente_dni);
			$Cliente->setCclienteref($Cliente_referencia);
			$Cliente->setCclientecdir($Cliente_direccion);
			$Cliente->setNzona($Cliente_zona);
			$Cliente->setNclientelineaop($Cliente_linea_op);
			$Cliente->setCclientearccredito($Cliente_arc_credito);
			$Cliente->setCclienteocup($Cliente_ocup);
			
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
