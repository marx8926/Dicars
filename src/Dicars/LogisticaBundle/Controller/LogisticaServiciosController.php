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
				'stock' => $producto -> getNproductosotck(), 'precio_contado' => $producto -> getNproductopcontado(),
				'precio_credito' => $producto -> getNproductopcredito());
								
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
			$todo[] = array('id' => $local -> getNlocalId(), 
							'nombre_tienda' => $local -> getClocaldesc(),
							'estado' => $local -> getNlocalest(),
							'telefono' => $local -> getClocaltelf(), 
							'direccion' => $local -> getClocaldirec(), 
							'tiprub' => $local -> getNlocaltiprub(), 
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
		
		$ubigeo = $local -> getNubigeo();
		
		$data = array('id' => $local -> getNlocalId(),
				'nombre_tienda' => $local -> getClocaldesc(),
				'estado' => $local -> getNlocalest(),
				'direccion' => $local -> getClocaldirec(),
				'telefono' => $local -> getClocaltelf(),
				'ubigeo' => $ubigeo -> getNubigeoId(),
				'tiprub' => $local -> getNlocaltiprub());

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
					'elim_btn' => "<a id-data='".$salprod -> getNsalprodId()."' class='btn btn-danger' href='#'><i class='icon-trash icon-white'></i>Eliminar</a>");

		}
		return new JsonResponse(array('aaData' => $todo));
	}

}
