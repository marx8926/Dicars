<?php
namespace Dicars\VentasBundle\Controller;

use Dicars\DataBundle\Entity\OfertaProducto;

use Dicars\DataBundle\Entity\Oferta;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\ORM\TransactionRequiredException;

class AdministrarOfertasController extends Controller{
	
	public function RegistrarOfertaAction(){
		$request = $this->get('request');
		$form = $request->request->get('formulario');
		$otherdata = $request->request->get('otherdata');
		
		$datos = array();
		parse_str($form,$datos);
		$OfertaDescripcion = null;
		$OfertaPorcentaje = null;
		$OfertaFechaVigente = null;
		$OfertaFechaVencimiento = null;
		$OfertaEstado = null;
		
		if ($form!=null){
			
			$OfertaDescripcion = $datos['descripcion'];
			$OfertaPorcentaje = $datos['descuento'];
			$OfertaFechaVigente = date_create_from_format('d/m/Y',$datos["fecha_ini"]);
			$OfertaFechaVencimiento = date_create_from_format('d/m/Y',$datos["fecha_fin"]);
			$OfertaEstado = $datos['estado'];
			
			$Oferta = new Oferta();
			$Oferta -> setCofertadesc($OfertaDescripcion);
			$Oferta -> setDofertafecvencto($OfertaFechaVencimiento);
			$Oferta -> setDofertafecvigente($OfertaFechaVigente);
			
			$em = $this->getDoctrine()->getEntityManager();
			$this->getDoctrine()->getEntityManager()->beginTransaction();
			try {
				$em->persist($Oferta);
				$em->flush();
				
				foreach($otherdata as $key => $data){
					$Producto = $this->getDoctrine()
					->getRepository('DicarsDataBundle:Producto')
					->findOneBy(array('nproductoId' => $data['id']));
						
					$OfertaProducto = new OfertaProducto();
					$OfertaProducto -> setNoferta($Oferta);
					$OfertaProducto -> setNproducto($Producto);
					$OfertaProducto -> setCofertaproductoest($OfertaEstado);
					$OfertaProducto -> setNofertaproductoporc($OfertaPorcentaje);
					$em->persist($OfertaProducto);
					$em->flush();
						
				}
			} catch (Exception $e) {
				$this->getDoctrine()->getEntityManager()->rollback();
				$this->getDoctrine()->getEntityManager()->close();
				$return = array("responseCode"=>400, "greeting"=>"Bad");
				throw $e;
			}
			$this->getDoctrine()->getEntityManager()->commit();
			$em->clear();
			$return = array("responseCode"=>200, "datos"=>$otherdata);
		}
		else {
			$return = array("responseCode"=>400, "greeting"=>"Bad");
		}
		$return = json_encode($return);
		return new Response($return,200,array('Content-Type'=>'application/json'));
	}
	
	public function EditarOfertaAction(){
		$request = $this->get('request');
		$form = $request->request->get('formulario');
		$otherdata = $request->request->get('otherdata');
		
		$datos = array();
		parse_str($form,$datos);
		
		$OfertaDescripcion = null;
		$OfertaPorcentaje = null;
		$OfertaFechaVigente = null;
		$OfertaFechaVencimiento = null;
		$OfertaEstado = null;
		
		if ($form!=null){
			$Oferta = $this->getDoctrine()
			->getRepository('DicarsDataBundle:Oferta')
			->findOneBy(array('nofertaId' => $datos['idoferta']));
			
			$OfertaPorcentaje = $datos['descuento'];
			$OfertaDescripcion = $datos['descripcion'];
			$OfertaFechaVigente = date_create_from_format('d/m/Y',$datos["fecha_ini"]);
			$OfertaFechaVencimiento = date_create_from_format('d/m/Y',$datos["fecha_fin"]);
			
			$Oferta -> setCofertadesc($OfertaDescripcion);
			$Oferta -> setDofertafecvencto($OfertaFechaVencimiento);
			$Oferta -> setDofertafecvigente($OfertaFechaVigente);
			
			$em = $this->getDoctrine()->getEntityManager();
			$this->getDoctrine()->getEntityManager()->beginTransaction();
			try {
				$em->flush();				
				foreach($otherdata as $key => $data){
					if($data['band']=='2'){
						$Producto = $this->getDoctrine()
						->getRepository('DicarsDataBundle:Producto')
						->findOneBy(array('nproductoId' => $data['idproducto']));
					
						$OfertaProducto = new OfertaProducto();
						$OfertaProducto -> setNoferta($Oferta);
						$OfertaProducto -> setNproducto($Producto);
						$OfertaProducto -> setCofertaproductoest(1);
						$OfertaProducto -> setNofertaproductoporc($OfertaPorcentaje);
						
						$em->persist($OfertaProducto);
						$em->flush();
					}
					else if($data['band']=='1'){
						$OfertaProducto = $this->getDoctrine()
						->getRepository('DicarsDataBundle:OfertaProducto')
						->findOneBy(array('nofertaproductoId' => $data['idofertaproducto']));
						
						$em-> remove($OfertaProducto);						
						$em->flush();
					}
				
				}
				
			} catch (Exception $e) {
				$this->getDoctrine()->getEntityManager()->rollback();
				$this->getDoctrine()->getEntityManager()->close();
				$return = array("responseCode"=>400, "greeting"=>"Bad");
				throw $e;
			}
			$this->getDoctrine()->getEntityManager()->commit();
			$em->clear();
			$return = array("responseCode"=>200,"datos"=>$datos, "otherdata"=>$otherdata);
		}
		else {
			$return = array("responseCode"=>400, "greeting"=>"Bad");
		}
		$return = json_encode($return);
		return new Response($return,200,array('Content-Type'=>'application/json'));
	}
}
