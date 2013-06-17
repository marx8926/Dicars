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
			
		$cantidad = count($clientes);
	
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
	
}
