<?php
namespace Dicars\LogisticaBundle\Controller;

use Dicars\DataBundle\Entity\Producto;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\ORM\TransactionRequiredException;



class AdministrarProductoController extends Controller{

	public function RegistrarProductoAction(){		
		
		$request = $this->get('request');
		$form = $request->request->get('formulario');
		
		$datos = array();		
		parse_str($form,$datos);
		
		//$Producto_id = null;
		$Producto_serie = null;
		$Producto_talla = null;
		$Producto_marca = null;
		$Producto_tipo = null;
		$Producto_desc = null;
		$Producto_prec_contado = null;
		$Producto_prec_credito = null;
		$Producto_prec_costo = null;
		$Producto_cod_barra = null;
		$Producto_archivo = null;
		$Producto_categoria=null;
		$Producto_stock_min = null;
		$Producto_stock_max = null;
		$Producto_stock = null;
		$Producto_est = null;
		$Producto_porc_uti = null;
		$Producto_porc_uti_bruta = null;		
		
		if ($form != null){			
			$Producto_talla = $datos["talla"];
			$Producto_serie = $datos["serie"];
			
			$Producto_marca = $this->getDoctrine()
    		->getRepository('DicarsDataBundle:VenMarca')
			->findOneBy(array('nmarcaId'  => 1));
			
			$Producto_tipo = $datos["tipprod"];
			$Producto_desc = $datos["descripcion"];
			$Producto_prec_contado = $datos["preciocontado"];
			$Producto_prec_credito = $datos["preciocredito"];
			$Producto_prec_costo = $datos["preciocosto"];
			$Producto_archivo = "Hola soy el archivo";
			
			$Producto_categoria =  $this->getDoctrine()
	    	->getRepository('DicarsDataBundle:VenCategoria')
			->findOneBy(array('ncategoriaId' => $datos["categoria"]));
			
			$Producto_stock_min = $datos["stockmin"];
			$Producto_stock_max = $datos["stockmax"];
			$Producto_stock = $datos["stock"];
			$Producto_est = $datos["estado"];
			$Producto_porc_uti = $datos["porcuti"];
			$Producto_porc_uti_bruta = $datos["utibruta"];
			$Producto_cod_barra = $datos['codigo'];
			
			$Producto = new Producto();
			$Producto->setCproductotalla($Producto_talla);
			$Producto->setCproductoserie($Producto_serie);
			$Producto->setNproductomarca($Producto_marca);
			$Producto->setNproductotipo($Producto_tipo);
			$Producto->setCproductodesc($Producto_desc);
			$Producto->setNproductopcontado($Producto_prec_contado);
			$Producto->setNproductopcredito($Producto_prec_credito);
			$Producto->setNproductopcosto($Producto_prec_costo);
			$Producto->setCproductoimage($Producto_archivo);
			$Producto->setNcategoria($Producto_categoria);
			$Producto->setNproductostockmin($Producto_stock_min);
			$Producto->setNproductostockmax($Producto_stock_max);
			$Producto->setNproductostock($Producto_stock);
			$Producto->setCproductoest($Producto_est);
			$Producto->setNproductoporcuti($Producto_porc_uti);
			$Producto->setNproductoutibruta($Producto_porc_uti_bruta);
			$Producto->setCproductocodbarra($Producto_cod_barra);
			
			$em = $this->getDoctrine()->getEntityManager();
			$em->beginTransaction();			
			try {
				$em->persist($Producto);
				$em->flush();
				
			} catch (Exception $e) {
				$em->rollback();
				$em->close();
				$return = array("responseCode"=>400, "greeting"=>"Bad");
							
				throw $e;			
			}
			$em->commit();
			$em->clear();
			$em->close();
			$return = array("responseCode"=>200, "datos"=>$datos);
					
		}
		else {
			$return = array("responseCode"=>400, "greeting"=>"Bad");
		}		
		
		$return = json_encode($return);
		return new Response($return,200,array('Content-Type'=>'application/json'));
	}
	
	
	public function EditarProductoAction(){
	
		$request = $this->get('request');
		$form = $request->request->get('formulario');
	
		$datos = array();
		parse_str($form,$datos);
		
		$Producto_serie = null;
		$Producto_talla = null;
		$Producto_marca = null;
		$Producto_tipo = null;
		$Producto_desc = null;
		$Producto_prec_contado = null;
		$Producto_prec_credito = null;
		$Producto_prec_costo = null;
		$Producto_cod_barra = null;
		$Producto_archivo = null;
		$Producto_categoria=null;
		$Producto_stock_min = null;
		$Producto_stock_max = null;
		$Producto_stock = null;
		$Producto_est = null;
		$Producto_porc_uti = null;
		$Producto_porc_uti_bruta = null;
		
		if ($form != null){
			
			$Producto_id = $datos["idE"];
			$Producto_talla = $datos["tallaE"];
			$Producto_serie = $datos["serieE"];
				
			$Producto_marca = $this->getDoctrine()
			->getRepository('DicarsDataBundle:VenMarca')
			->findOneBy(array('nmarcaId'  => 1));
				
			$Producto_tipo = 1;
			$Producto_desc = $datos["descripcionE"];
			$Producto_prec_contado = $datos["preciocontadoE"];
			$Producto_prec_credito = $datos["preciocreditoE"];
			$Producto_prec_costo = $datos["preciocostoE"];
			$Producto_cod_barra = "AER1234";
			$Producto_archivo = "Hola soy el archivo";
				
			$Producto_categoria =  $this->getDoctrine()
			->getRepository('DicarsDataBundle:VenCategoria')
			->findOneBy(array('ncategoriaId' => 1));
				
			$Producto_stock_min = $datos["stockminE"];
			$Producto_stock_max = $datos["stockmaxE"];
			$Producto_stock = $datos["stockE"];
			$Producto_est = $datos["estadoE"];
			$Producto_porc_uti = $datos["porcutiE"];
			$Producto_porc_uti_bruta = $datos["utibrutaE"];

			$Producto = $this->getDoctrine()
			->getRepository('DicarsDataBundle:Producto')
			->findOneBy(array('nproductoId' => $Producto_id));
			
			$Producto->setCproductotalla($Producto_talla);
			$Producto->setCproductoserie($Producto_serie);
			$Producto->setNproductomarca($Producto_marca);
			$Producto->setNproductotipo($Producto_tipo);
			$Producto->setCproductodesc($Producto_desc);
			$Producto->setNproductopcontado($Producto_prec_contado);
			$Producto->setNproductopcredito($Producto_prec_credito);
			$Producto->setNproductopcosto($Producto_prec_costo);
			$Producto->setCproductocodbarra($Producto_cod_barra);
			$Producto->setCproductoimage($Producto_archivo);
			$Producto->setNcategoria($Producto_categoria);
			$Producto->setNproductostockmin($Producto_stock_min);
			$Producto->setNproductostockmax($Producto_stock_max);
			$Producto->setNproductostock($Producto_stock);
			$Producto->setCproductoest($Producto_est);
			$Producto->setNproductoporcuti($Producto_porc_uti);
			$Producto->setNproductoutibruta($Producto_porc_uti_bruta);
				
			$em = $this->getDoctrine()->getEntityManager();
			$em->beginTransaction();
			
		try {
			$em->flush();
		} catch (Exception $e) {
			$em->rollback();
			$em->close();
			$return = array("responseCode"=>400, "greeting"=>"Bad");
				
			throw $e;
		}
		$em->commit();
		$em->clear();
		$em->close();
		$return = array("responseCode"=>200, "datos"=>$datos);
			
		}
		else {
			$return = array("responseCode"=>400, "greeting"=>"Bad");
		}
		
		$return = json_encode($return);
		return new Response($return,200,array('Content-Type'=>'application/json'));
	}
	
}
