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
							'estado' => $cargo -> getCcargocoest(),
							'edit_btn' => "<a id-data='".$cargo -> getNcargoId()."' class='btn btn-info btn-editar' href='#'><i class='icon-edit icon-white'></i>Editar</a>"
					);
		}
		$em->clear();
		$em->close();
		return new JsonResponse(array('aaData' => $todo));
	}
	
	public function getCargoByIdAction($id){
		$em = $this->getDoctrine()->getEntityManager();
			
		$cargo = $this->getDoctrine()
		->getRepository('DicarsDataBundle:VenCargo')
		->findOneBy(array('ncargoId' => $id));
	
	
		$data = array('id' => $cargo -> getNcargoId(),
					'nom_cargo' => $cargo -> getNcargodesc(),
					'selectEstado' => $cargo -> getCcargocoest());

		$em->clear();
		$em->close();
		return new JsonResponse($data);
	}
	
	public function getTablaCategoriasAction(){
		$em = $this->getDoctrine()->getEntityManager();
			
		$categorias = $this->getDoctrine()
		->getRepository('DicarsDataBundle:VenCategoria')
		->findAll();
	
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
					'estado' => $categoria -> getCcategoriaest(),
					'edit_btn' => "<a id-data='".$categoria -> getNcategoriaId()."' class='btn btn-info btn-editar' href='#'><i class='icon-edit icon-white'></i>Editar</a>"
			);
		}
		$em->clear();
		$em->close();
		return new JsonResponse(array('aaData' => $todo));
	}
	
	public function getCategoriaByIdAction($id){
		$em = $this->getDoctrine()->getEntityManager();
			
		$categoria = $this->getDoctrine()
		->getRepository('DicarsDataBundle:VenCategoria')
		->findOneBy(array('ncategoriaId' => $id));
	
	
		$data = array('id' => $categoria -> getNcategoriaId(),
				'nom_categoria' => $categoria -> getCcategorianom(),
				'desc_categoria' => $categoria -> getCcategoriadesc(),
				'selectEstado' => $categoria -> getCcategoriaest());

		$em->clear();
		$em->close();
		return new JsonResponse($data);
	}
	
	public function getTablaMarcasAction(){
		$em = $this->getDoctrine()->getEntityManager();
			
		$marcas = $this->getDoctrine()
		->getRepository('DicarsDataBundle:VenMarca')
		->findAll();
	
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
					'estado' => $marca -> getCmarcaest(),
					'edit_btn' => "<a id-data='".$marca -> getNmarcaId()."' class='btn btn-info btn-editar' href='#'><i class='icon-edit icon-white'></i>Editar</a>"
			);
		}

		$em->clear();
		$em->close();
		return new JsonResponse(array('aaData' => $todo));
	}
	
	public function getMarcaByIdAction($id){
		$em = $this->getDoctrine()->getEntityManager();
			
		$marca = $this->getDoctrine()
		->getRepository('DicarsDataBundle:VenMarca')
		->findOneBy(array('nmarcaId' => $id));
	
		$data = array('id' => $marca -> getNmarcaId(),
				'desc_marca' => $marca -> getCmarcadesc(),
				'selectEstado' => $marca -> getCmarcaest());
		
		$em->clear();
		$em->close();
		return new JsonResponse($data);
	}


	public function getTablaUsuarioAction(){
		$em = $this->getDoctrine()->getEntityManager();
			
		$usuarios = $this->getDoctrine()
		->getRepository('DicarsDataBundle:Usuario')
		->findAll();
		$todo = array();
		foreach ($usuarios as $key => $usuario){
			$estadochar = $usuario -> getCusuarioest();
			if($estadochar=="1")
				$estado = "<span class='label label-success'>Habilidado</span>";
			else
				$estado = "<span class='label label-important'>Inhabilitado</span>";
			$personal = $usuario -> getNpersonal();
			
			$todo[] = array('id' => $usuario -> getNusuarioid(),
						'trabajador' => $personal -> getCpersonalnom()." ".$personal -> getCpersonalape(),
						'usuario_id' => $usuario -> getCusuarioid(),
						'clave' => $usuario -> getCusuarioclave(),
						'selectEstado' => $estado,
						'estado' => $usuario -> getCusuarioest(),
						'fecharegistro' => $usuario -> getCusuariofecreg() -> format('d/m/Y'),
						'ver_btn' => "<a id-data='".$usuario -> getNusuarioId()."' class='btn btn-success btn-datos' href='#'><i class='icon-zoom-in icon-white'></i>Ver Datos</a>",
						'edit_btn' => "<a id-data='".$usuario -> getNusuarioId()."' class='btn btn-info btn-editar' href='#'><i class='icon-edit icon-white'></i>Editar</a>",
						'elim_btn' => "<a id-data='".$usuario -> getNusuarioId()."' class='btn btn-danger' href='#'><i class='icon-trash icon-white'></i>Eliminar</a>");
		}

		$em->clear();
		$em->close();
		return new JsonResponse(array('aaData' => $todo));
	}
	
	public function getUsuarioByIdAction($id){
		$em = $this->getDoctrine()->getEntityManager();
			
		$usuario = $this->getDoctrine()
		->getRepository('DicarsDataBundle:Usuario')
		->findOneBy(array('nusuarioId' => $id));
	
		$data = array('id' => $usuario -> getNusuarioId(),
				'trabajador' => $usuario -> getNpersonal()->getNpersonalId(),
				'usuario_id' => $usuario -> getCusuarioId(),
				'clave' => $usuario -> getCusuarioclave(),
				'estado' => $usuario -> getCusuarioest(),
				'fecharegistro' => $usuario -> getCusuariofecreg()-> format('d/m/Y')
				);
		$em->clear();
		$em->close();
		return new JsonResponse($data);
	}
	
	public function getTablaZonasAction(){
		$em = $this->getDoctrine()->getEntityManager();
			
		$zonas = $this->getDoctrine()
		->getRepository('DicarsDataBundle:VenZona')
		->findAll();
	
		$todo = array();
		foreach ($zonas as $key => $zona){
			$estado = '';
			$estadochar = $zona -> getNzonaest();
			if($estadochar=="1")
				$estado = "<span class='label label-success'>Habilidado</span>";
			else
				$estado = "<span class='label label-important'>Inhabilitado</span>";
			
			$dist = $zona -> getNubigeo();
			
			$prov = $this->getDoctrine()
			->getRepository('DicarsDataBundle:Ubigeo')
			->findOneBy(array('nubigeoId' => $dist -> getNubigeodep()));
			
			$dep = $this->getDoctrine()
			->getRepository('DicarsDataBundle:Ubigeo')
			->findOneBy(array('nubigeoId' => $prov -> getNubigeodep()));
			
			$ubigeo =  $dist -> getCubigeodesc()." - ".$prov -> getCubigeodesc()." - ".$dep -> getCubigeodesc();
			
			$todo[] = array('id' => $zona -> getNzonaId(),
					'desc' => $zona -> getCzonadesc(),
					'selectEstado' => $zona -> getNzonaest(),
					'estado' => $estado,
					'dist' => $dist -> getNubigeoId(),
					'prov' => $prov -> getNubigeoId(),
					'dep' => $dep -> getNubigeoId(),
					'ubigeo' =>  $ubigeo,
					'edit_btn' => "<a id-data='".$zona -> getNzonaId()."' class='btn btn-info btn-editar' href='#'><i class='icon-edit icon-white'></i>Editar</a>"
			);
		}
		
		$em->clear();
		$em->close();		
		return new JsonResponse(array('aaData' => $todo));
	}
	
	public function getOptionMarcasAction(){
		$em = $this->getDoctrine()->getEntityManager();
			
		$marcas = $this->getDoctrine()
		->getRepository('DicarsDataBundle:VenMarca')
		->findAll();
				
		$todo = array();
		
		foreach ($marcas as $key => $marca){
			$todo[] = array('id' => $marca->getNmarcaId(),
				'desc' => $marca->getCmarcadesc(),
				);
		}
		$em->clear();
		$em->close();	
		return new JsonResponse($todo);
	}
	
	/*public function getOptionCargosAction(){
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
	}*/
	
	public function getOptionCategoriasAction(){
		$em = $this->getDoctrine()->getEntityManager();
			
		$categorias = $this->getDoctrine()
		->getRepository('DicarsDataBundle:VenCategoria')
		->findAll();
		
		$todo = array();
		
		foreach ($categorias as $key => $categoria){
			$todo[] = array('id' => $categoria->getNcategoriaId(),
					'desc' => $categoria->getCcategorianom(),
			);
		}
		$em->clear();
		$em->close();
		return new JsonResponse($todo);
	}
	
	public function getTablaConstantesAction(){
		$em = $this->getDoctrine()->getEntityManager();
			
		$constantes = $this->getDoctrine()
		->getRepository('DicarsDataBundle:Constante')
		->findAll();
	
		$todo = array();
		foreach ($constantes as $key => $constante){
			$todo[] = array('id' => $constante -> getNconstanteId(),
					'clase' => $constante -> getNconstanteclase(),
					'nom_clase' => $constante -> getCconstantedesc(),
					'valor' => $constante -> getCconstantevalor(),
					'edit_btn' => "<a id-data='".$constante -> getNconstanteId()."' class='btn btn-info btn-editar' href='#'><i class='icon-edit icon-white'></i>Editar</a>"
			);
		}
		$em->clear();
		$em->close();
		return new JsonResponse(array('aaData' => $todo));
	}
	
	public function getConstanteByIdAction($id){
		$em = $this->getDoctrine()->getEntityManager();
			
		$constante = $this->getDoctrine()
		->getRepository('DicarsDataBundle:Constante')
		->findOneBy(array('nconstanteId' => $id));
	
		$data = array('id' => $constante -> getNconstanteId(),
				'clase' => $constante -> getNconstanteclase(),
				'nom_clase' => $constante -> getCconstantedesc(),
				'valor' => $constante -> getCconstantevalor());
		
		$em->clear();
		$em->close();
		return new JsonResponse($data);
	}
	
	public function getTablaTipoMonedaAction(){
		$em = $this->getDoctrine()->getEntityManager();
			
		$monedas = $this->getDoctrine()
		->getRepository('DicarsDataBundle:VenTipomoneda')
		->findAll();
	
		$todo = array();
		foreach ($monedas as $key => $moneda){
			if($moneda -> getNtipomonedaest() == 1){
				$estado = "<span class='label label-success'>Habilidado</span>";
			}
			else{
				$estado = "<span class='label label-important'>Inhabilidado</span>";
			}
			$todo[] = array('id' => $moneda -> getNtipomoneda(),
					'desc_tipomoneda' => $moneda -> getCtipomonedadesc(),
					'monto' => $moneda -> getNtipomonedamont(),
					'selectEstado' => $estado,
					'estado' => $moneda -> getNtipomonedaest(),
					'edit_btn' => "<a id-data='".$moneda -> getNtipomoneda()."' class='btn btn-info btn-editar' href='#'><i class='icon-edit icon-white'></i>Editar</a>"
			);
		}
		$em->clear();
		$em->close();
		return new JsonResponse(array('aaData' => $todo));
	}
	
	public function getOptionTipoByClaseAction($Clase){
		$em = $this->getDoctrine()->getEntityManager();
			
		$Tipos = $this->getDoctrine()
		->getRepository('DicarsDataBundle:Constante')
		->findBy(array('nconstanteclase' => $Clase));
	
		$result = "";
		foreach ($Tipos as $key => $tipo){
			if($tipo -> getCconstantevalor() != 0 )
				$result = $result."<option value='".$tipo -> getCconstantevalor()."'>".$tipo->getCconstantedesc()."</option>";
		}
		return new Response($result);
	}
	
	public function getOptionUbigeoAction(){
		$em = $this->getDoctrine()->getEntityManager();
			
		$ubigeos = $this->getDoctrine()
		->getRepository('DicarsDataBundle:Ubigeo')
		->findAll();
		
		$todo = array();
		foreach ($ubigeos as $key => $ubigeo){
			$todo[] = array('id' => $ubigeo -> getNubigeoId(),
					'desc' => $ubigeo -> getCubigeodesc(),
					'dep' => $ubigeo -> getNubigeodpt(),
					'prov' => $ubigeo -> getNubigeoprov(),
					'dist' => $ubigeo -> getNubigeodist(),
					'depend' => $ubigeo -> getNubigeodep()
			);
		}
		
		$em->clear();
		$em->close();
		return new JsonResponse($todo);
	}
	
	public function getOptionConstantesAction($idclase){
		$em = $this->getDoctrine()->getEntityManager();
			
		$constantes = $this->getDoctrine()
		->getRepository('DicarsDataBundle:Constante')
		->findBy(array('nconstanteclase'=>$idclase));
		
		$todo = array();
		foreach ($constantes as $key => $constante){
			if($constante -> getCconstantevalor() != 0){
				$todo[] = array('id' => $constante -> getNconstanteId(),
						'clase' => $constante -> getNconstanteclase(),
						'desc' => $constante -> getCconstantedesc(),
						'valor' => $constante -> getCconstantevalor()
				);
			}
		}
		$em->clear();
		$em->close();
		return new JsonResponse($todo);
	}
	
	public function getOptionCargosAction(){
		$em = $this->getDoctrine()->getEntityManager();
			
		$cargos = $this->getDoctrine()
		->getRepository('DicarsDataBundle:VenCargo')
		->findAll();
	
		$todo = array();
		foreach ($cargos as $key => $cargo){
			$todo[] = array('id' => $cargo -> getNcargoId(),
					'desc' => $cargo -> getNcargodesc(),
					'estado' => $cargo -> getCcargocoest()
			);
		}
		$em->clear();
		$em->close();
		return new JsonResponse($todo);
	}
	
	public function getOptionTiposIGVAction(){
		$em = $this->getDoctrine()->getEntityManager();
			
		$tiposigv = $this->getDoctrine()
		->getRepository('DicarsDataBundle:VenTipoigv')
		->findAll();
	
		$todo = array();
		foreach ($tiposigv as $key => $tipoigv){
			if($tipoigv->getCtipoigvest() == 1){
				$todo[] = array('id' => $tipoigv -> getNtipoigv(),
						'porc' => $tipoigv -> getNtipoigvproc()
				);
			}
		}
		$em->clear();
		$em->close();
		return new JsonResponse($todo);
	}
	
	public function getOptionZonasAction(){
		$em = $this->getDoctrine()->getEntityManager();
			
		$zonas = $this->getDoctrine()
		->getRepository('DicarsDataBundle:VenZona')
		->findAll();
	
		$todo = array();
	
		foreach ($zonas as $key => $zona){
			$todo[] = array('id' => $zona->getNzonaId(),
					'desc' => $zona->getCzonadesc(),
			);
		}
		$em->clear();
		$em->close();
		return new JsonResponse($todo);
	}
	
	public function getTablaTipoIGVAction(){
		$em = $this->getDoctrine()->getEntityManager();
			
		$tipos = $this->getDoctrine()
		->getRepository('DicarsDataBundle:VenTipoigv')
		->findAll();
	
		$todo = array();
		foreach ($tipos as $key => $tipo){
			$todo[] = array('id' => $tipo -> getNtipoigv(),
					'tipo' => $tipo -> getCtipoigv(),
					'porcentaje' => $tipo -> getNtipoigvproc(),
					'fecha' => $tipo -> getDtipoigvfecreg() -> format("d/m/Y"),
					'estado' => $tipo -> getCtipoigvest(),
					'edit_btn' => "<a id-data='".$tipo -> getNtipoigv()."' class='btn btn-info btn-editar' href='#'><i class='icon-edit icon-white'></i>Editar</a>"
			);
		}
		$em->clear();
		$em->close();
		return new JsonResponse(array('aaData' => $todo));
	}
	
	public function getTablaTipoIGVByIdAction($id){
		$em = $this->getDoctrine()->getEntityManager();
			
		$tipos = $this->getDoctrine()
		->getRepository('DicarsDataBundle:VenTipoigv')
		->findOneBy(array('ntipoigv' => $id));
	
		$data = array('id' => $tipos -> getNtipoigv(),
				'tipo' => $tipos -> getCtipoigv(),
				'porcentaje' => $tipos -> getNtipoigvproc(),
				'fecha' => $tipos -> getDtipoigvfecreg() -> format("d/m/Y"),
				'estado' => $tipos -> getCtipoigvest());
		
		$em->clear();
		$em->close();
		return new JsonResponse($data);
	}
	
	public function getTablaZonasNoAsignadaAction(){
		$em = $this->getDoctrine()->getEntityManager();
	
		$sql = "select nZona_id from ven_zona 
				where not exists (
					select * from ven_zonapersonal 
					where ven_zona.nZona_id = ven_zonapersonal.nZona_id)";						
	
		$smt = $em->getConnection()->prepare($sql);
		$smt->execute();
	
		$zonas = $smt->fetchAll();
		
		$todo = array();
		
		foreach ($zonas as $key => $idzona){
			$zona = $this->getDoctrine()
				->getRepository('DicarsDataBundle:VenZona')
				->findOneBy(array('nzonaId' =>$idzona['nZona_id']));
			
			$estado = '';
			$estadochar = $zona -> getNzonaest();
			
			if($estadochar=="1")
				$estado = "<span class='label label-success'>Habilidado</span>";
			else
				$estado = "<span class='label label-important'>Inhabilitado</span>";
				
			$dist = $zona -> getNubigeo();
				
			$prov = $this->getDoctrine()
			->getRepository('DicarsDataBundle:Ubigeo')
			->findOneBy(array('nubigeoId' => $dist -> getNubigeodep()));
				
			$dep = $this->getDoctrine()
			->getRepository('DicarsDataBundle:Ubigeo')
			->findOneBy(array('nubigeoId' => $prov -> getNubigeodep()));
				
			$ubigeo =  $dist -> getCubigeodesc()." - ".$prov -> getCubigeodesc()." - ".$dep -> getCubigeodesc();
				
			$todo[] = array('id' => $zona -> getNzonaId(),
					'desc' => $zona -> getCzonadesc(),
					'selectEstado' => $zona -> getNzonaest(),
					'estado' => $estado,
					'dist' => $dist -> getNubigeoId(),
					'prov' => $prov -> getNubigeoId(),
					'dep' => $dep -> getNubigeoId(),
					'ubigeo' =>  $ubigeo
			);
		}
		
		$em->clear();
		$em->close();
		return new JsonResponse(array('aaData' => $todo));
	}
	
	public function getTablaZonaPersonalAction(){
		$em = $this->getDoctrine()->getEntityManager();
			
		$zonaspersonal = $this->getDoctrine()
		->getRepository('DicarsDataBundle:VenZonapersonal')
		->findAll();
	
		$todo = array();
		foreach ($zonaspersonal as $key => $zonapersonal){
			$estado = '';
			$zona = $zonapersonal -> getNzona();
			$personal = $zonapersonal ->getNpersonal();
			$estadochar = $zona -> getNzonaest();
			
			if($estadochar=="1")
				$estado = "<span class='label label-success'>Habilidado</span>";
			else
				$estado = "<span class='label label-important'>Inhabilitado</span>";
			
			$dist = $zona -> getNubigeo();
			
			$prov = $this->getDoctrine()
			->getRepository('DicarsDataBundle:Ubigeo')
			->findOneBy(array('nubigeoId' => $dist -> getNubigeodep()));
			
			$dep = $this->getDoctrine()
			->getRepository('DicarsDataBundle:Ubigeo')
			->findOneBy(array('nubigeoId' => $prov -> getNubigeodep()));
			
			$ubigeo =  $dist -> getCubigeodesc()." - ".$prov -> getCubigeodesc()." - ".$dep -> getCubigeodesc();
			
			$todo[] = array(
					'idzonapersonal' => $zonapersonal -> getNzonapersonalId(),
					'idzona' => $zona -> getNzonaId(),
					'idpersonal' => $personal -> getNpersonalId(),
					'nombrepersonal' => $personal -> getCpersonalnom()." ".$personal->getCpersonalape(),
					'desc' => $zona -> getCzonadesc(),
					'selectEstado' => $zona -> getNzonaest(),
					'estado' => $estado,
					'dist' => $dist -> getNubigeoId(),
					'prov' => $prov -> getNubigeoId(),
					'dep' => $dep -> getNubigeoId(),
					'ubigeo' =>  $ubigeo,
					'edit_btn' => "<a class='btn btn-info btn-editar' href='#'><i class='icon-edit icon-white'></i>Editar</a>"
			);
		}
		
		$em->clear();
		$em->close();		
		return new JsonResponse(array('aaData' => $todo));
	}
	
	public function getTablaMovAction(){
		$em = $this->getDoctrine()->getEntityManager();
			
		$movimientos = $this->getDoctrine()
		->getRepository('DicarsDataBundle:VenMovimiento')
		->findAll();
	
		$todo = array();
		foreach ($movimientos as $key => $movimiento){
			$tipo_mov = $this->getDoctrine()
			->getRepository('DicarsDataBundle:Constante')
			->findOneBy(array('nconstanteId' => $movimiento -> getNmovimientotip()));
			
			$tipo_pago = $this->getDoctrine()
			->getRepository('DicarsDataBundle:Constante')
			->findOneBy(array('nconstanteId' => $movimiento -> getNmovimientotippag()));
				
			$todo[] = array('id' => $movimiento -> getNmovimientoId(),
					'fecha_reg' => $movimiento -> getDmovimientofecreg() -> format('d/m/Y'),
					'concepto' => $movimiento -> getCmovimientoconcepto(),
					'monto' => $movimiento -> getNmovimientomonto(),
					'tipo_mov' => $tipo_mov -> getCconstantedesc(),
					'tipo_pago' => $tipo_pago -> getCconstantedesc(),
					'personal' => $movimiento -> getNpersonal() -> getCpersonalnom()." ".$movimiento -> getNpersonal() -> getCpersonalape()
			);
		}
		$em->clear();
		$em->close();
		return new JsonResponse(array('aaData' => $todo));
	}
		
}
	
