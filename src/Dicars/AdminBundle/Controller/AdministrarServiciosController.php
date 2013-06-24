<?php
namespace Dicars\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Normalizer\GetSetMethodNormalizer;

class AdministrarServiciosController extends Controller {
	
	public function getTablaCargosAction(){
		$em = $this->getDoctrine()->getEntityManager();
			
		$cargos = $this->getDoctrine()
		->getRepository('DicarsDataBundle:VenCargo')
		->findAll();
		$em->clear();
	
		$todo = array();
		foreach ($cargos as $key => $cargo){
			$estado = '';
			$estadochar = $cargo -> getCcargocoest();
			if($estadochar=="1")
				$estado = "<span class='label label-success'>Habilidado</span>";
			else 
				$estado = "<span class='label label-important'>Inhabilitado</span>";
			
			$todo[] = array('id' => $cargo -> getNcargoId(), 
							'nom_cargo' => $cargo -> getNcargodesc(),
							'selectEstado' => $estado, 
							'edit_btn' => "<a id-data='".$cargo -> getNcargoId()."' class='btn btn-info btn-editar' href='#'><i class='icon-edit icon-white'></i>Editar</a>"
					);
		}
		return new JsonResponse(array('aaData' => $todo));
	}
	
	public function getCargoByIdAction($id){
		$em = $this->getDoctrine()->getEntityManager();
			
		$cargo = $this->getDoctrine()
		->getRepository('DicarsDataBundle:VenCargo')
		->findOneBy(array('ncargoId' => $id));
	
		$em->clear();
	
		$data = array('id' => $cargo -> getNcargoId(),
					'nom_cargo' => $cargo -> getNcargodesc(),
					'selectEstado' => $cargo -> getCcargocoest());
	
		return new JsonResponse($data);
	}

}
