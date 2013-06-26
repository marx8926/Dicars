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
	
	public function getTablaCategoriasAction(){
		$em = $this->getDoctrine()->getEntityManager();
			
		$categorias = $this->getDoctrine()
		->getRepository('DicarsDataBundle:VenCategoria')
		->findAll();
		$em->clear();
	
		$todo = array();
		foreach ($categorias as $key => $categoria){
			$estado = '';
			$estadochar = $categoria -> getCcategoriaest();
			if($estadochar=="1")
				$estado = "<span class='label label-success'>Habilidado</span>";
			else
				$estado = "<span class='label label-important'>Inhabilitado</span>";
				
			$todo[] = array('id' => $categoria -> getNcategoriaId(),
					'nom_categoria' => $categoria -> getCcategorianom(),
					'desc_categoria' => $categoria -> getCcategoriadesc(),
					'selectEstado' => $estado,
					'edit_btn' => "<a id-data='".$categoria -> getNcategoriaId()."' class='btn btn-info btn-editar' href='#'><i class='icon-edit icon-white'></i>Editar</a>"
			);
		}
		return new JsonResponse(array('aaData' => $todo));
	}
	
	public function getCategoriaByIdAction($id){
		$em = $this->getDoctrine()->getEntityManager();
			
		$categoria = $this->getDoctrine()
		->getRepository('DicarsDataBundle:VenCategoria')
		->findOneBy(array('ncategoriaId' => $id));
	
		$em->clear();
	
		$data = array('id' => $categoria -> getNcategoriaId(),
				'nom_categoria' => $categoria -> getCcategorianom(),
				'desc_categoria' => $categoria -> getCcategoriadesc(),
				'selectEstado' => $categoria -> getCcategoriaest());
	
		return new JsonResponse($data);
	}
	
	public function getTablaMarcasAction(){
		$em = $this->getDoctrine()->getEntityManager();
			
		$marcas = $this->getDoctrine()
		->getRepository('DicarsDataBundle:VenMarca')
		->findAll();
		$em->clear();
	
		$todo = array();
		foreach ($marcas as $key => $marca){
			$estado = '';
			$estadochar = $marca -> getCmarcaest();
			if($estadochar=="1")
				$estado = "<span class='label label-success'>Habilidado</span>";
			else
				$estado = "<span class='label label-important'>Inhabilitado</span>";
	
			$todo[] = array('id' => $marca -> getNmarcaId(),
					'desc_marca' => $marca -> getCmarcadesc(),
					'selectEstado' => $estado,
					'edit_btn' => "<a id-data='".$marca -> getNmarcaId()."' class='btn btn-info btn-editar' href='#'><i class='icon-edit icon-white'></i>Editar</a>"
			);
		}
		return new JsonResponse(array('aaData' => $todo));
	}
	
	public function getMarcaByIdAction($id){
		$em = $this->getDoctrine()->getEntityManager();
			
		$marca = $this->getDoctrine()
		->getRepository('DicarsDataBundle:VenMarca')
		->findOneBy(array('nmarcaId' => $id));
	
		$em->clear();
	
		$data = array('id' => $marca -> getNmarcaId(),
				'desc_marca' => $marca -> getCmarcadesc(),
				'selectEstado' => $marca -> getCmarcaest());
	
		return new JsonResponse($data);
	}


	public function getTablaUsuarioAction(){
		$em = $this->getDoctrine()->getEntityManager();
			
		$usuarios = $this->getDoctrine()
		->getRepository('DicarsDataBundle:Usuario')
		->findAll();
		$em->clear();
		$todo = array();
		foreach ($usuarios as $key => $usuario){
			$todo[] = array('trabajador' => $usuario -> getNpersonal() -> getNpersonalId(),
						'usuario_id' => $usuario -> getCusuarioid(),
						'contrasena' => $usuario -> getCusuarioclave(),
						'estado' => $usuario -> getCusuarioest(),
						'fecha' => $usuario -> getCusuariofecreg() -> format('Y-m-d'),
						'ver_btn' => "<a id-data='".$usuario -> getNusuarioId()."' class='btn btn-success btn-datos' href='#'><i class='icon-zoom-in icon-white'></i>Ver Datos</a>",
						'edit_btn' => "<a id-data='".$usuario -> getNusuarioId()."' class='btn btn-info btn-editar' href='#'><i class='icon-edit icon-white'></i>Editar</a>",
						'elim_btn' => "<a id-data='".$usuario -> getNusuarioId()."' class='btn btn-danger' href='#'><i class='icon-trash icon-white'></i>Eliminar</a>");
		}
		return new JsonResponse(array('aaData' => $todo));
	}
		
	}
	
