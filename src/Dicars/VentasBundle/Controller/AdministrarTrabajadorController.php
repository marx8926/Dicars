<?php
namespace Dicars\VentasBundle\Controller;

use Symfony\Component\Validator\Constraints\Date;

use Dicars\DataBundle\Entity\VenPersonal;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\ORM\TransactionRequiredException;


class AdministrarTrabajadorController extends Controller{

	public function RegistrarTrabajadorAction(){

		$request = $this->get('request');
		$form = $request->request->get('formulario');
		
		$datos = array();		
		parse_str($form,$datos);
		
		$Empleado_cargo = null;
		$Empleado_dni = null;
		$Empleado_nombre = null;
		$Empleado_apellido = null;
		$Empleado_telefono = null;
		$Empleado_email = null;
		$Empleado_fechanacimiento = null;								
		$Empleado_sexo = null;
		$Empleado_estado = null;
		$Empleado_edad = null;

		if ($form!=null){
			
			$Empleado_cargo =  $this->getDoctrine()
			->getRepository('DicarsDataBundle:VenCargo')
			->findOneBy(array('ncargoId' => 1));
			
			$Empleado_dni = $datos["dni"];
			$Empleado_nombre = $datos["nombres"];
			$Empleado_apellido = $datos["apellidos"];
			$Empleado_telefono = $datos["telefono"];
			$Empleado_email = $datos["email"];
			$Empleado_fechanacimiento = new \DateTime($datos["fechanacimiento"]);
			$Empleado_sexo = $datos["sexo"];
			$Empleado_estado = $datos["estado"];
			$Empleado_edad = $datos["edad"];
			
			$Empleado = new VenPersonal();
			$Empleado->setNcargo($Empleado_cargo);
			$Empleado->setCpersonaldni($Empleado_dni);
			$Empleado->setCpersonalnom($Empleado_nombre);
			$Empleado->setCpersonalape($Empleado_apellido);
			$Empleado->setCpersonaltelf($Empleado_telefono);
			$Empleado->setCpersonalemail($Empleado_email);
			$Empleado->setDpersonalfec($Empleado_fechanacimiento);
			$Empleado->setCpersonalsexo($Empleado_sexo);
			$Empleado->setCpersonalest($Empleado_estado);
			$Empleado->setCpersonaledad($Empleado_edad);
			
			$em = $this->getDoctrine()->getEntityManager();
			$this->getDoctrine()->getEntityManager()->beginTransaction();
			try {
				$em->persist($Empleado);
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