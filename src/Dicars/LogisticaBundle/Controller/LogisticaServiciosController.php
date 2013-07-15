<?php
namespace Dicars\LogisticaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Normalizer\GetSetMethodNormalizer;

class LogisticaServiciosController extends Controller{
	
	public function getTablaProductosAction(){
		$em = $this->getDoctrine()->getEntityManager();
		 
		$productos = $this->getDoctrine()
    		->getRepository('DicarsDataBundle:Producto')
			->findAll();
		$em->clear();
		
		$todo = array();
		foreach ($productos as $key => $producto){
			$todo[] = array('id' => $producto -> getNproductoId(), 'nombre' => $producto -> getCproductodesc(),
					'stock' => $producto -> getNproductosotck(), 'precio_contado' => $producto -> getNproductopcontado(),
					'precio_credito' => $producto -> getNproductopcredito(),
					'ver_btn' => "<a id-data='".$producto -> getNproductoId()."' class='btn btn-success btn-datos' href='#'><i class='icon-zoom-in icon-white'></i>Ver Datos</a>",
					'edit_btn' => "<a id-data='".$producto -> getNproductoId()."' class='btn btn-info btn-editar' href='#'><i class='icon-edit icon-white'></i>Editar</a>",
					'elim_btn' => "<a id-data='".$producto -> getNproductoId()."' class='btn btn-danger' href='#'><i class='icon-trash icon-white'></i>Eliminar</a>");
		}
		return new JsonResponse(array('aaData' => $todo));
	}
	

	public function getProductoByIdAction($id){
		$em = $this->getDoctrine()->getEntityManager();
			
		$producto = $this->getDoctrine()		
		->getRepository('DicarsDataBundle:Producto')
		->findOneBy(array('nproductoId' => $id));
		
		$em->clear();
		
		$data = array('id' => $producto -> getNproductoId(),'serie' => $producto -> getCproductoserie(),'talla' => $producto -> getCproductotalla(),
				'nombre' => $producto -> getCproductodesc(),'pcosto' => $producto -> getNproductopcosto(),'pcontado' => $producto -> getNproductopcontado(),
				'pcredito' => $producto -> getNproductopcredito(),'tipo' => $producto -> getNproductotipo(),'codigobarras' => $producto -> getCproductocodbarra(),
				'stockmin' => $producto -> getNproductostockmin(),'stock' => $producto -> getNproductosotck(),'stockmax' => $producto -> getNproductostockmax(), 
				'estado' => $producto -> getCproductoest(),'porcuti' => $producto -> getNproductoporcuti(),				
				'utibruta' => $producto -> getNproductoutibruta(), 'marca' => $producto -> getNproductomarca() -> getNmarcaId());
								
		return new JsonResponse($data);
	}
	
	public function getTablaProveedoresAction(){
		$em = $this->getDoctrine()->getEntityManager();
			
		$proveedores = $this->getDoctrine()
		->getRepository('DicarsDataBundle:LogProveedor')
		->findAll();
		
		$em->clear();
		
		$todo = array();
		foreach ($proveedores as $key => $proveedor){
			$todo[] = array('id' => $proveedor -> getNproveedorId(), 'ruc' => $proveedor -> getCproveedorruc(),
					'razonsocial' => $proveedor -> getCproveedorrazsocial(), 'telefono' => $proveedor -> getCproveedortel(),
					'email' => $proveedor -> getCproveedoremail(), 
					'sitioweb' => $proveedor -> getCproveedorsitioweb(), 
					'ver_btn' => "<a id-data='".$proveedor -> getNproveedorId()."' class='btn btn-success btn-datos' href='#'><i class='icon-zoom-in icon-white'></i>Ver Datos</a>",
					'edit_btn' => "<a id-data='".$proveedor -> getNproveedorId()."' class='btn btn-info btn-editar' href='#'><i class='icon-edit icon-white'></i>Editar</a>",
					'elim_btn' => "<a id-data='".$proveedor -> getNproveedorId()."' class='btn btn-danger' href='#'><i class='icon-trash icon-white'></i>Eliminar</a>"
					);
		}
		return new JsonResponse(array('aaData' => $todo));
	}
	
	public function getProveedorByIdAction($id){
		$em = $this->getDoctrine()->getEntityManager();
			
		$proveedor = $this->getDoctrine()
		->getRepository('DicarsDataBundle:LogProveedor')
		->findOneBy(array('nproveedorId' => $id));
		
		$em->clear();
		
		$data = array('id' => $proveedor -> getNproveedorId(),
					'ruc' => $proveedor -> getCproveedorruc(),
					'razonsocial' => $proveedor -> getCproveedorrazsocial(),
					'telefono' => $proveedor -> getCproveedortel(),
					'email' => $proveedor -> getCproveedoremail(),
					'sitioweb' => $proveedor -> getCproveedorsitioweb(),
					'direccion' => $proveedor -> getCproveedordirec(),
					'ccorriente' => $proveedor -> getCproveedorccorriente());
	
		return new JsonResponse($data);
	}
	
	public function getTablaLocalesAction(){
		$em = $this->getDoctrine()->getEntityManager();
			
		$locales = $this->getDoctrine()
		->getRepository('DicarsDataBundle:Local')
		->findAll();
		
		$em->clear();
		
		$todo = array();
		foreach ($locales as $key => $local){
			if($local -> getNlocalest() == 1){
				$estado = "<span class='label label-success'>Habilitado</span>";
			}
			else{
				$estado = "<span class='label label-important'>Inhabilitado</span>";
			}
			$tiporubro = $this->getDoctrine()
			->getRepository('DicarsDataBundle:Constante')
			->findOneBy(array('nconstanteId' => $local -> getNlocaltiprub()));
			
			$todo[] = array('id' => $local -> getNlocalId(), 
							'nombre_tienda' => $local -> getClocaldesc(),
							'estado' => $estado,
							'telefono' => $local -> getClocaltelf(), 
							'direccion' => $local -> getClocaldirec(), 
							'tiprub' => $tiporubro->getCconstantedesc(), 
							'Acciones' => "<a id-data='".$local -> getNlocalId()."' class='btn btn-success btn-datos' href='#'><i class='icon-zoom-in icon-white'></i>Ver Datos</a>
					<a id-data='".$local -> getNlocalId()."' class='btn btn-info btn-editar' href='#'><i class='icon-edit icon-white'></i>Editar</a>
					<a id-data='".$local -> getNlocalId()."' class='btn btn-danger' href='#'><i class='icon-trash icon-white'></i>Eliminar</a>"
			);
		}
		return new JsonResponse(array('aaData' => $todo));
	}
	
	public function getLocalByIdAction($id){
		$em = $this->getDoctrine()->getEntityManager();

		$local = $this->getDoctrine()
		->getRepository('DicarsDataBundle:Local')
		->findOneBy(array('nlocalId' => $id));

		$em->clear();
		
		$dist = $local -> getNubigeo();
		
		$prov = $this->getDoctrine()
		->getRepository('DicarsDataBundle:Ubigeo')
		->findOneBy(array('nubigeoId' => $dist -> getNubigeodep()));
		
		$dep = $this->getDoctrine()
		->getRepository('DicarsDataBundle:Ubigeo')
		->findOneBy(array('nubigeoId' => $prov -> getNubigeodep()));
		
		$tiporubro = $this->getDoctrine()
		->getRepository('DicarsDataBundle:Constante')
		->findOneBy(array('nconstanteId' => $local -> getNlocaltiprub()));
		
		$data = array('id' => $local -> getNlocalId(),
				'nombre_tienda' => $local -> getClocaldesc(),
				'estado' => $local -> getNlocalest(),
				'direccion' => $local -> getClocaldirec(),
				'telefono' => $local -> getClocaltelf(),
				'dist' => $dist -> getNubigeoId(),
				'prov' => $prov -> getNubigeoId(),
				'dep' => $dep -> getNubigeoId(),
				'tiprub' => $tiporubro->getCconstantedesc());

		return new JsonResponse($data);
	}
	
	public function getTablaIngresoProductoAction(){
		$em = $this->getDoctrine()->getEntityManager();
			
		$ingprods = $this->getDoctrine()
		->getRepository('DicarsDataBundle:LogIngprod')
		->findAll();
		$em->clear();
	
		$todo = array();
		foreach ($ingprods as $key => $ingprod){			
			
			$todo[] = array('id' => $ingprod -> getNingprodId(),
					'serie' => $ingprod -> getCingprodserie(),
					'numero' => $ingprod -> getCingprodnro(),
					'serie_doc' => $ingprod -> getCingproddocserie(),					
					'ver_btn' => "<a id-data='".$ingprod -> getNingprodId()."' class='btn btn-success btn-datos' href='#'><i class='icon-zoom-in icon-white'></i>Ver Datos</a>",
					'edit_btn' => "<a id-data='".$ingprod -> getNingprodId()."' class='btn btn-info btn-editar' href='#'><i class='icon-edit icon-white'></i>Editar</a>",
					'elim_btn' => "<a id-data='".$ingprod -> getNingprodId()."' class='btn btn-danger' href='#'><i class='icon-trash icon-white'></i>Eliminar</a>");
		}
		return new JsonResponse(array('aaData' => $todo));
	}

	public function getTablaSalProdAction(){
		$em = $this->getDoctrine()->getEntityManager();
			
		$salprods = $this->getDoctrine()
		->getRepository('DicarsDataBundle:LogSalProd')
		->findAll();
			
		$em->clear();
	
		$todo = array();
		foreach ($salprods as $key => $salprod){
			$personal = $salprod -> getNpersonal();
			
			$solicitante = $this->getDoctrine()
			->getRepository('DicarsDataBundle:VenPersonal')
			->findOneBy(array('npersonalId' => $salprod -> getNsolicitanteId()));
			 
			$todo[] = array('id' => $salprod -> getNsalprodId(),
					'registrante' => $personal -> getCpersonalnom()." ".$personal -> getCpersonalape(),
					'local' => $salprod -> getNlocal() -> getClocaldesc(),
					'solicitante' => $solicitante -> getCpersonalnom()." ".$solicitante -> getCpersonalape(),
					'serie' => $salprod -> getCsalprodserie(),
					'numero' => $salprod -> getCsalprodnro(),
					'fecha_reg' => $salprod -> getDsalprodfecreg() -> format("d/m/Y"),
					'ver_btn' => "<a id-data='".$salprod -> getNsalprodId()."' class='btn btn-success btn-datos' href='#'><i class='icon-zoom-in icon-white'></i>Ver Datos</a>",
					'edit_btn' => "<a id-data='".$salprod -> getNsalprodId()."' class='btn btn-info btn-editar' href='#'><i class='icon-edit icon-white'></i>Editar</a>",
					'elim_btn' => "<a id-data='".$salprod -> getNsalprodId()."' class='btn btn-danger' href='#'><i class='icon-trash icon-white'></i>Eliminar</a>");

		}
		return new JsonResponse(array('aaData' => $todo));
	}
	
	public function getTablaPedidosAction(){
		$em = $this->getDoctrine()->getEntityManager();
			
		$ordpeds = $this->getDoctrine()
		->getRepository('DicarsDataBundle:LogOrdped')
		->findAll();
			
		$em->clear();
		
		$todo = array();
		foreach ($ordpeds as $key => $ordped){
			$registrante = $ordped -> getNpersonal();
	
			$todo[] = array('id' => $ordped -> getNordpedId(),
					'registrante' => $registrante -> getCpersonalnom()." ".$registrante -> getCpersonalape(),
					'local' => $ordped -> getNlocal() -> getClocaldesc(),
					'serie' => $ordped -> getCordpedserie(),
					'numero' => $ordped -> getCordpednro(),
					'fecha_reg' => $ordped -> getDordpedfecreg() -> format("d/m/Y"),
					'fecha_ent' => $ordped -> getDordepedfecent() -> format("d/m/Y"),
					'ver_btn' => "<a id-data='".$ordped -> getNordpedId()."' class='btn btn-success btn-datos' href='#'><i class='icon-zoom-in icon-white'></i>Ver Datos</a>",
					'edit_btn' => "<a id-data='".$ordped -> getNordpedId()."' class='btn btn-info btn-editar' href='#'><i class='icon-edit icon-white'></i>Editar</a>",
					'elim_btn' => "<a id-data='".$ordped -> getNordpedId()."' class='btn btn-danger' href='#'><i class='icon-trash icon-white'></i>Eliminar</a>");
	
		}
		return new JsonResponse(array('aaData' => $todo));
	}
	
	public function getTablaDetSalProdAction($id){
		$em = $this->getDoctrine()->getEntityManager();
			
		$detsalprods = $this->getDoctrine()
		->getRepository('DicarsDataBundle:LogDetSalProd')
		->findBy(array('nsalprod'=>$id));
			
		$em->clear();
	
		$todo = array();
		foreach ($detsalprods as $key => $detsalprod){
			$producto = $detsalprod -> getNproducto();
	
			$todo[] = array('id' => $detsalprod -> getNdetsalprodId(),
					'producto_serie' => $producto -> getCproductoserie(),
					'cantidad' => $detsalprod -> getDetsalprodcant(),
					'estado' => $detsalprod -> getCdetsalprodest(),
					'ver_btn' => "<a id-data='".$detsalprod -> getNdetsalprodId()."' class='btn btn-success btn-datos' href='#'><i class='icon-zoom-in icon-white'></i>Ver Datos</a>",
					'edit_btn' => "<a id-data='".$detsalprod -> getNdetsalprodId()."' class='btn btn-info btn-editar' href='#'><i class='icon-edit icon-white'></i>Editar</a>",
					'elim_btn' => "<a id-data='".$detsalprod -> getNdetsalprodId()."' class='btn btn-danger' href='#'><i class='icon-trash icon-white'></i>Eliminar</a>");
	
		}
		return new JsonResponse(array('aaData' => $todo));
	}
	
	public function getTablaDetOrdPedAction($id){
		$em = $this->getDoctrine()->getEntityManager();
			
		$detordpeds = $this->getDoctrine()
		->getRepository('DicarsDataBundle:LogDetordped')
		->findBy(array('nordped'=>$id));
	
		$todo = array();
		foreach ($detordpeds as $key => $detordped){
			$producto = $detordped -> getNproducto();
	
			$todo[] = array('id' => $detordped -> getNdetordpedId(),
					'producto_serie' => $producto -> getCproductoserie(),
					'cantidad' => $detordped -> getNdetordpedcant(),
					'estado' => $detordped -> getCdetordpedest(),
					'cantidad_rec' => $detordped -> getNdetordpedcantacept(),
					'ver_btn' => "<a id-data='".$detordped -> getNdetordpedId()."' class='btn btn-success btn-datos' href='#'><i class='icon-zoom-in icon-white'></i>Ver Datos</a>",
					'edit_btn' => "<a id-data='".$detordped -> getNdetordpedId()."' class='btn btn-info btn-editar' href='#'><i class='icon-edit icon-white'></i>Editar</a>",
					'elim_btn' => "<a id-data='".$detordped -> getNdetordpedId()."' class='btn btn-danger' href='#'><i class='icon-trash icon-white'></i>Eliminar</a>");			
		}
		return new JsonResponse(array('aaData' => $todo));
	}
	
		public function getTablaDetIngProdAction($id){
			$em = $this->getDoctrine()->getEntityManager();
				
			$detingprods = $this->getDoctrine()
			->getRepository('DicarsDataBundle:LogDetingProd')
			->findBy(array('ningprod'=>$id));
					
			$em->clear();
			
		foreach ($detingprods as $key => $detingprod){
			$producto = $detingprod -> getNproducto();
	
			$todo[] = array('id' => $detingprod -> getNdetingprodId(),
					'producto_serie' => $producto -> getCproductoserie(),
					'cantidad' => $detingprod -> getNdetingprodcant(),
					'precio_uni' => $detingprod -> getNdetingprodprecunt(),
					'total' => $detingprod -> getNdetingprodtot(),
					'ver_btn' => "<a id-data='".$detingprod -> getNdetingprodId()."' class='btn btn-success btn-datos' href='#'><i class='icon-zoom-in icon-white'></i>Ver Datos</a>",
					'edit_btn' => "<a id-data='".$detingprod -> getNdetingprodId()."' class='btn btn-info btn-editar' href='#'><i class='icon-edit icon-white'></i>Editar</a>",
					'elim_btn' => "<a id-data='".$detingprod -> getNdetingprodId()."' class='btn btn-danger' href='#'><i class='icon-trash icon-white'></i>Eliminar</a>");	
		}
		return new JsonResponse(array('aaData' => $todo));
	}

}
