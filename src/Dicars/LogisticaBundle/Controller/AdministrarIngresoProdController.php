<?php
namespace Dicars\LogisticaBundle\Controller;

use Dicars\DataBundle\Entity\LogDetingprod;

use Dicars\DataBundle\Entity\LogIngprod;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\ORM\TransactionRequiredException;

class AdministrarIngresoProdController extends Controller{
	
	public function RegistrarIngresoProdAction(){
		$request = $this->get('request');
		$form = $request->request->get('formulario');
		$otherdata = $request->request->get('otherdata');
	
		$datos = array();
		parse_str($form,$datos);
	
		$Registrante = null;
		$Local = null;
		$Serie = null;
		$Numero = null;
		$Motivo = null;
		$SerieDoc = null;
		$Fecha_reg = null;
		$NumeroDoc = null;		
		$Observacion = null;
		$Estado = null;
	
		if ($form != null){
				
			$Registrante = $this->getDoctrine()
			->getRepository('DicarsDataBundle:VenPersonal')
			->findOneBy(array('npersonalId' => 1));
				
			$Local = $this->getDoctrine()
			->getRepository('DicarsDataBundle:Local')
			->findOneBy(array('nlocalId' => 2));
				
			$Serie = $datos["serie"];
			$Numero = $datos["numero"];
			$Motivo = $datos["tipo"];
			$SerieDoc = $datos["docserie"];
			$Fecha_reg = date_create_from_format('d/m/Y', $datos["fecharegistro"]);						
			$NumeroDoc = $datos["docnumero"];
			$Observacion = $datos["observacion"];
			$Estado = 1;
			
			$IngProd = new  LogIngprod();
			$IngProd -> setNpersonal($Registrante);
			$IngProd -> setNlocal($Local);
			$IngProd -> setCingprodserie($Serie);
			$IngProd -> setCingprodnro($Numero);
			$IngProd -> setNingprodmotivo($Motivo);
			$IngProd -> setCingproddocserie($SerieDoc);
			$IngProd -> setDingprodfecreg($Fecha_reg);
			$IngProd -> setCingproddocnro($NumeroDoc);
			$IngProd -> setCingprodobsv($Observacion);
			$IngProd -> setCingprodest($Estado);
			
			$em = $this->getDoctrine()->getEntityManager();
			$em->beginTransaction();
			
			try {
				
				$em->persist($IngProd);
				$em->flush();
				
				foreach($otherdata as $key => $data){
					$Producto = $this->getDoctrine()
					->getRepository('DicarsDataBundle:Producto')
					->findOneBy(array('nproductoId' => $data["idproducto"]));
					
					$DetalleIngProd = new LogDetingprod();
					$DetalleIngProd -> setNingprod($IngProd);
					$DetalleIngProd -> setNproducto($Producto);
					$DetalleIngProd -> setNdetingprodcant($data["cantidad"]);
					$DetalleIngProd -> setNdetingprodprecunt($data["precio_uni"]);
					$DetalleIngProd -> setNdetingprodtot($data["total"]);
					
					$em->persist($DetalleIngProd);
					$em->flush(); 
					
					$stock = $Producto -> getNproductostock();
					$stockn = $stock + $data['cantidad'];
						
					$Producto -> setNproductostock($stockn);
					$em->flush();
				}
			
			} catch (Exception $e) {
				$em->rollback();
				$em->close();
				$return = array("responseCode"=>400, "greeting"=>"Bad");
					
				throw $e;
			}
			$em->commit();
			$em->clear();
			$em->close();
			$return = array("responseCode"=>200, "datos"=>$datos, 'otherdata'=>$otherdata);
	
		}
		else {
			$return = array("responseCode"=>400, "greeting"=>"Bad");
		}
	
		$return = json_encode($return);
		return new Response($return,200,array('Content-Type'=>'application/json'));
	}
		
	public function EditarIngresoProdAction(){
		$request = $this->get('request');
		$form = $request->request->get('formulario');
		$otherdata = $request->request->get('otherdata');
		$datos = array();
		parse_str($form,$datos);
				
		$Ingreso_motivo = null;
		
		if($form =! null){
			
			$Ingreso_id = $datos["idingprod"];
			$Ingreso_motivo = $datos["motivo"];			
			$Ingreso = $this->getDoctrine()
			->getRepository('DicarsDataBundle:LogIngprod')
			->findOneBy(array('ningprodId' => $Ingreso_id));
			
			$Ingreso->setNingprodmotivo($Ingreso_motivo);
				
			$em = $this->getDoctrine()->getEntityManager();
			$em->beginTransaction();
			
			try {				
				$em->flush();				
				foreach($otherdata as $key => $data){
					
					if($data["band"]==1){						
						$DetalleIngProd = $this->getDoctrine()
						->getRepository('DicarsDataBundle:LogDetingprod')
						->findOneBy(array('ndetingprodId' => $data["iddetingreso"]));
											
						$DetalleIngProd -> setNdetingprodcant($data["cantidad"]);
						$DetalleIngProd -> setNdetingprodprecunt($data["precio_uni"]);
						$DetalleIngProd -> setNdetingprodtot($data["total"]);										
						$em->flush();						
					} else if($data["band"]==2){
						$Producto = $this->getDoctrine()
						->getRepository('DicarsDataBundle:Producto')
						->findOneBy(array('nproductoId' => $data["idproducto"]));
																	
						$DetalleIngProd = new LogDetingprod();
						$DetalleIngProd -> setNingprod($Ingreso);
						$DetalleIngProd -> setNproducto($Producto);
						$DetalleIngProd -> setNdetingprodcant($data["cantidad"]);
						$DetalleIngProd -> setNdetingprodprecunt($data["precio_uni"]);
						$DetalleIngProd -> setNdetingprodtot($data["total"]);
						$em->persist($DetalleIngProd);
						$em->flush();				
						
					}									
					
				}
			} catch (Exception $e) {
				$em->rollback();
				$em->close();
				$return = array("responseCode"=>400, "greeting"=>"Bad");			
				throw $e;
			}
			$em->commit();
			$em->clear();
			$em->close();
			$return = array("responseCode"=>200, "datos"=>$datos, "otherdata"=>$otherdata);
				
			}
			else {
				$return = array("responseCode"=>400, "greeting"=>"Bad");
			}
			
			$return = json_encode($return);
			return new Response($return,200,array('Content-Type'=>'application/json'));		
	}
	
}