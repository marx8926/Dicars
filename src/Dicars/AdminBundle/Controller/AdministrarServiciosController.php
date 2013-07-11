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
						'clave' => $usuario -> getCusuarioclave(),
						'estado' => $usuario -> getCusuarioest(),
						'fecharegistro' => $usuario -> getCusuariofecreg() -> format('d/m/Y'),
						'ver_btn' => "<a id-data='".$usuario -> getNusuarioId()."' class='btn btn-success btn-datos' href='#'><i class='icon-zoom-in icon-white'></i>Ver Datos</a>",
						'edit_btn' => "<a id-data='".$usuario -> getNusuarioId()."' class='btn btn-info btn-editar' href='#'><i class='icon-edit icon-white'></i>Editar</a>",
						'elim_btn' => "<a id-data='".$usuario -> getNusuarioId()."' class='btn btn-danger' href='#'><i class='icon-trash icon-white'></i>Eliminar</a>");
		}
		return new JsonResponse(array('aaData' => $todo));
	}
	
	public function getUsuarioByIdAction($id){
		$em = $this->getDoctrine()->getEntityManager();
			
		$usuario = $this->getDoctrine()
		->getRepository('DicarsDataBundle:Usuario')
		->findOneBy(array('nusuarioId' => $id));
	
		$em->clear();
	
		$data = array('id' => $usuario -> getNusuarioId(),
				'trabajador' => $usuario -> getNpersonal()->getNpersonalId(),
				'usuario_id' => $usuario -> getCusuarioId(),
				'clave' => $usuario -> getCusuarioclave(),
				'estado' => $usuario -> getCusuarioest(),
				'fecharegistro' => $usuario -> getCusuariofecreg()-> format('d/m/Y')
				);
	
		return new JsonResponse($data);
	}
	
	public function getOptionMarcasAction(){
		$em = $this->getDoctrine()->getEntityManager();
			
		$marcas = $this->getDoctrine()
		->getRepository('DicarsDataBundle:VenMarca')
		->findAll();
		$em->clear();
		
		$result = "";
		foreach ($marcas as $key => $marca){
			$result = $result."<option value='".$marca->getNmarcaId()."'>".$marca->getCmarcadesc()."</option>";
		}	
		return new Response($result);
	}
	
	public function getOptionCargosAction(){
		$em = $this->getDoctrine()->getEntityManager();
			
		$cargos = $this->getDoctrine()
		->getRepository('DicarsDataBundle:VenCargo')
		->findAll();
		$em->clear();
	
		$result = "";
		foreach ($cargos as $key => $cargo){
			$result = $result."<option value='".$cargo->getNcargoId()."'>".$cargo->getNcargodesc()."</option>";
		}
		return new Response($result);
	}
	
	public function getOptionCategoriasAction(){
		$em = $this->getDoctrine()->getEntityManager();
			
		$categorias = $this->getDoctrine()
		->getRepository('DicarsDataBundle:VenCategoria')
		->findAll();
		$em->clear();
	
		$result = "";
		foreach ($categorias as $key => $categoria){
			$result = $result."<option value='".$categoria->getNcategoriaId()."'>".$categoria->getCcategorianom()."</option>";
		}
		return new Response($result);
	}
	
	public function getTablaConstantesAction(){
		$em = $this->getDoctrine()->getEntityManager();
			
		$constantes = $this->getDoctrine()
		->getRepository('DicarsDataBundle:Constante')
		->findAll();
		$em->clear();
	
		$todo = array();
		foreach ($constantes as $key => $constante){
			$todo[] = array('id' => $constante -> getNconstanteId(),
					'clase' => $constante -> getNconstanteclase(),
					'nom_clase' => $constante -> getCconstantedesc(),
					'valor' => $constante -> getCconstantevalor(),
					'edit_btn' => "<a id-data='".$constante -> getNconstanteId()."' class='btn btn-info btn-editar' href='#'><i class='icon-edit icon-white'></i>Editar</a>"
			);
		}
		return new JsonResponse(array('aaData' => $todo));
	}
	
	public function getConstanteByIdAction($id){
		$em = $this->getDoctrine()->getEntityManager();
			
		$constante = $this->getDoctrine()
		->getRepository('DicarsDataBundle:Constante')
		->findOneBy(array('nconstanteId' => $id));
	
		$em->clear();
	
		$data = array('id' => $constante -> getNconstanteId(),
				'clase' => $constante -> getNconstanteclase(),
				'nom_clase' => $constante -> getCconstantedesc(),
				'valor' => $constante -> getCconstantevalor());
	
		return new JsonResponse($data);
	}
	
	public function getOptionTipoByClaseAction($Clase){
		$em = $this->getDoctrine()->getEntityManager();
			
		$Tipos = $this->getDoctrine()
		->getRepository('DicarsDataBundle:Constante')
		->findBy(array('nconstanteclase' => $Clase));
		$em->clear();
	
		$result = "";
		foreach ($Tipos as $key => $tipo){
			if($tipo -> getCconstantevalor() != 0 )
				$result = $result."<option value='".$tipo -> getCconstantevalor()."'>".$tipo->getCconstantedesc()."</option>";
		}
		return new Response($result);
	}
	
	public function getOptionDepartamentosAction(){
		$em = $this->getDoctrine()->getEntityManager();
			
		$ubigeos = $this->getDoctrine()
		->getRepository('DicarsDataBundle:Ubigeo')
		->findBy(array('nubigeodpt' => 1));
		$em->clear();
		
		$result = "";
		foreach ($ubigeos as $key => $ubigeo){
			$result = $result."<option value='".$ubigeo->getNubigeoId()."'>".$ubigeo->getCubigeodesc()."</option>";
		}
		return new Response($result);
	}
	
	public function getOptionProvinciasAction($iddep){
		$em = $this->getDoctrine()->getEntityManager();
		
		/*$sql = "SELECT nUbigeo_id,cUbigeoDesc FROM ubigeo where nUbigeoDep=".$iddep." AND nUbigeoProv=1";
		
		$smt = $em->getConnection()->prepare($sql);
		$smt->execute();
		
		$ubigeos = $smt->fetchAll();
		
		$result = "";
		foreach ($ubigeos as $key => $ubigeo){
			$result = $result."<option value='".$ubigeo['nUbigeo_id']."'>".$ubigeo['cUbigeoDesc']."</option>";
		}
		return new Response($result);*/
			
		$ubigeos = $this->getDoctrine()
		->getRepository('DicarsDataBundle:Ubigeo')
		->findBy(array('nubigeoprov' => 1,'nubigeodep' => $iddep));
		$em->clear();
	
		$result = "";
		foreach ($ubigeos as $key => $ubigeo){
			$result = $result."<option value='".$ubigeo->getNubigeoId()."'>".$ubigeo->getCubigeodesc()."</option>";
		}
		return new Response($result);
	}
	
	public function getOptionDistritosAction($idprov){
		$em = $this->getDoctrine()->getEntityManager();
		
		/*$sql = "SELECT nUbigeo_id,cUbigeoDesc FROM ubigeo where nUbigeoDep=".$idprov." AND nUbigeoDist=1";
		
		$smt = $em->getConnection()->prepare($sql);
		$smt->execute();
		
		$ubigeos = $smt->fetchAll();
		
		$result = "";
		foreach ($ubigeos as $key => $ubigeo){
			$result = $result."<option value='".$ubigeo['nUbigeo_id']."'>".$ubigeo['cUbigeoDesc']."</option>";
		}
		return new Response($result);*/
			
		$ubigeos = $this->getDoctrine()
		->getRepository('DicarsDataBundle:Ubigeo')
		->findBy(array('nubigeodist' => 1,'nubigeodep' => $idprov));
		$em->clear();
	
		$result = "";
		foreach ($ubigeos as $key => $ubigeo){
			$result = $result."<option value='".$ubigeo->getNubigeoId()."'>".$ubigeo->getCubigeodesc()."</option>";
		}
		return new Response($result);
	}
	
	public function getOptionTipoRubroAction(){
		$em = $this->getDoctrine()->getEntityManager();
			
		$tiprubs = $this->getDoctrine()
		->getRepository('DicarsDataBundle:Constante')
		->findBy(array('nconstanteclase' => 1));
		$em->clear();
	
		$result = "";
		foreach ($tiprubs as $key => $tiprub){
			if($tiprub->getCconstantevalor() != 0){
				$result = $result."<option value='".$tiprub->getNconstanteId()."'>".$tiprub->getCconstantedesc()."</option>";
			}
		}
		return new Response($result);
	}
}
	
