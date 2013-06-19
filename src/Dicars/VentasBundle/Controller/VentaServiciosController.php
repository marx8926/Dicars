<?php
namespace Dicars\VentasBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Normalizer\GetSetMethodNormalizer;

class VentaServiciosController extends Controller{

	public function getTablaClientesAction(){
		$em = $this->getDoctrine()->getEntityManager();
			
		$clientes = $this->getDoctrine()
		->getRepository('DicarsDataBundle:VenCliente')
		->findAll();
			
		$em->clear();
	
		$todo = array();
		foreach ($clientes as $key => $clientes){
			$todo[] = array('nombre' => $clientes -> getBclientenom() , 'apellido' => $clientes -> getCclienteape(),
					'dni' => $clientes -> getCclientedni(), 'linea_credito' => $clientes -> getNclientelineaop(),
					'Acciones' => "<a id-data='".$clientes -> getNclienteId()."' class='btn btn-success btn-datos' href='#'><i class='icon-zoom-in icon-white'></i>Ver Datos</a>
					<a id-data='".$clientes -> getNclienteId()."' class='btn btn-info btn-editar' href='#'><i class='icon-edit icon-white'></i>Editar</a>
					<a id-data='".$clientes -> getNclienteId()."' class='btn btn-danger' href='#'><i class='icon-trash icon-white'></i>Eliminar</a>");
		}
		return new JsonResponse(array('aaData' => $todo));
	}
	
	public function getClienteByIdAction($id){
		$em = $this->getDoctrine()->getEntityManager();
			
		$cliente = $this->getDoctrine()
		->getRepository('DicarsDataBundle:VenCliente')
		->findOneBy(array('nclienteId' => $id));
	
		$em->clear();
	
		$data = array('id' => $cliente -> getNclienteId(),
				'nombres' => $cliente -> getBclientenom(),
				'apellidos' => $cliente -> getCclienteape(),
				'referencia' => $cliente -> getCclienteref(),
				'direccion' => $cliente -> getCclientedir(),
				'zona' => $cliente -> getNzona(),
				'lineaop' => $cliente -> getNclientelineaop(),
				'arccredito' => $cliente -> getCclientearccredito(),
				'ocupacion' => $cliente -> getCclienteocup());
	
		return new JsonResponse($data);
	}
	
	public function getTablaEmpleadosAction(){
		$em = $this->getDoctrine()->getEntityManager();
			
		$empleados = $this->getDoctrine()
		->getRepository('DicarsDataBundle:VenPersonal')
		->findAll();
			
		$em->clear();
	
		$todo = array();
		foreach ($empleados as $key => $empleados){
			$todo[] = array('nombres' => $empleados -> getCpersonalnom() , 'apellidos' => $empleados -> getCpersonalape(),
					'dni' => $empleados -> getCpersonaldni(), 'telefono' => $empleados -> getCpersonaltelf(),
					'Acciones' => "<a id-data='".$empleados -> getNpersonalId()."' class='btn btn-success btn-datos' href='#'><i class='icon-zoom-in icon-white'></i>Ver Datos</a>
					<a id-data='".$empleados -> getNpersonalId()."' class='btn btn-info btn-editar' href='#'><i class='icon-edit icon-white'></i>Editar</a>
					<a id-data='".$empleados -> getNpersonalId()."' class='btn btn-danger' href='#'><i class='icon-trash icon-white'></i>Eliminar</a>");
		}
		return new JsonResponse(array('aaData' => $todo));
	}
	
	
	
}
