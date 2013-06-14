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
		 
		$cantidad = count($productos);
		
		$todo = array();
		foreach ($productos as $key => $producto){
			$todo[] = array('id' => $producto -> getNproductoId(), 'nombre' => $producto -> getCproductodesc(),
					'stock' => $producto -> getNproductosotck(), 'precio_contado' => $producto -> getNproductopcontado(),
					'precio_credito' => $producto -> getNproductopcredito(), 'Acciones' => "<a id-data='".$producto -> getNproductoId()."' class='btn btn-success btn-datos' href='#'><i class='icon-zoom-in icon-white'></i>Ver Datos</a>
					<a id-data='".$producto -> getNproductoId()."' class='btn btn-info btn-editar' href='#'><i class='icon-edit icon-white'></i>Editar</a>
					<a id-data='".$producto -> getNproductoId()."' class='btn btn-danger' href='#'><i class='icon-trash icon-white'></i>Eliminar</a>");
		}
		return new JsonResponse(array('aaData' => $todo));
	}
	

	public function getProductoByIdAction($id){
		$em = $this->getDoctrine()->getEntityManager();
			
		$producto = $this->getDoctrine()
		
		->getRepository('DicarsDataBundle:Producto')
		->findOneBy(array('nproductoId' => $id));
		
		$data = array('id' => $producto -> getNproductoId(), 'nombre' => $producto -> getCproductodesc(),
				'stock' => $producto -> getNproductosotck(), 'precio_contado' => $producto -> getNproductopcontado(),
				'precio_credito' => $producto -> getNproductopcredito());
								
		return new JsonResponse($data);
	}

}
