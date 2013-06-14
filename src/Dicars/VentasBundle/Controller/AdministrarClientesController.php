<?php
namespace Dicars\VentasBundle\Controller;
use Dicars\DataBundle\Entity\VenCliente;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\ORM\TransactionRequiredException;

class AdministrarClientesController extends Controller{
	
	public function RegistrarClienteAction(){
	
		$request = $this->get('request');
		$form = $request->request->get('formulario');
	
		$datos = array();
		parse_str($form,$datos);
			
		$Cliente_nombre = null;
		$Cliente_apellido = null;
		$Cliente_dni = null;
		$Cliente_referencia = null;
		$Cliente_direccion = null;
		
		$Cliente_zona = null;
		
		$Cliente_linea_op = null;
		$Cliente_arc_credito = null;
		$Cliente_ocup = null;					
	
		if ($form!=null){			
			$Cliente_nombre = $datos["nombres"];
			$Cliente_apellido = $datos["apellidos"];
				
			$Producto_marca = $this->getDoctrine()
			->getRepository('DicarsDataBundle:VenMarca')
			->findOneBy(array('nmarcaId'  => 1));
				
			$Cliente_dni = $datos["dni"];
			$Cliente_referencia = $datos["caracteristica"];
			$Cliente_direccion = $datos["minimocontado"];
			$Cliente_zona = $datos["minimocredito"];
			$Cliente_linea_op = $datos["preciocosto"];
			$Cliente_arc_credito = "AER1234";
			$Cliente_ocup = "Hola soy el archivo";
				
			$Producto_categoria =  $this->getDoctrine()
			->getRepository('DicarsDataBundle:VenCategoria')
			->findOneBy(array('ncategoriaId' => 1));
				
			$Producto_stock_min = 10;
			$Producto_stock_max = 40;
			$Producto_stock = 25;
			$Producto_est = 1;
			$Producto_porc_uti = 18;
			$Producto_porc_uti_bruta = 20;
				
			$Producto = new Producto();
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
			$Producto->setNproductosotck($Producto_stock);
			$Producto->setCproductoest($Producto_est);
			$Producto->setNproductoporcuti($Producto_porc_uti);
			$Producto->setNproductoutibruta($Producto_porc_uti_bruta);
				
			$em = $this->getDoctrine()->getEntityManager();
			$this->getDoctrine()->getEntityManager()->beginTransaction();
			try {
				$em->persist($Producto);
				$em->flush();
			} catch (Exception $e) {
				$this->getDoctrine()->getEntityManager()->rollback();
				$this->getDoctrine()->getEntityManager()->close();
				$return = array("responseCode"=>400, "greeting"=>"Bad");
					
				throw $e;
			}
			$this->getDoctrine()->getEntityManager()->commit();
			$return = array("responseCode"=>200, "datos"=>$datos);
				
		}
		else {
			$return = array("responseCode"=>400, "greeting"=>"Bad");
		}
	
		$return = json_encode($return);
		return new Response($return,200,array('Content-Type'=>'application/json'));
	}

}
