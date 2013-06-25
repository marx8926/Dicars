<?php
namespace Dicars\AdminBundle\Controller;

use Dicars\DataBundle\Entity\VenCategoria;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\ORM\TransactionRequiredException;

class AdministrarCategoriasController extends Controller{
	
	public function RegistrarCategoriaAction(){
		$request = $this->get('request');
		$form = $request->request->get('formulario');
	
		$datos = array();
		parse_str($form,$datos);
		
		$CategoriaNom = null;
		$CategoriaDesc = null;
		$CategoriaEst = null;
	
		if ($form!=null){
			$CategoriaNom = $datos["nom_categoria"];
			$CategoriaDesc = $datos["desc_categoria"];
			$CategoriaEst = $datos["selectEstado"];
	
			$Categoria = new VenCategoria();
			$Categoria->setCcategorianom($CategoriaNom);
			$Categoria->setCcategoriadesc($CategoriaDesc);
			$Categoria->setCcategoriaest($CategoriaEst);
	
			$em = $this->getDoctrine()->getEntityManager();
			$this->getDoctrine()->getEntityManager()->beginTransaction();
			try {
				$em->persist($Categoria);
				$em->flush();
			} catch (Exception $e) {
				$this->getDoctrine()->getEntityManager()->rollback();
				$this->getDoctrine()->getEntityManager()->close();
				$return = array("responseCode"=>400, "greeting"=>"Bad");
					
				throw $e;
			}
			$this->getDoctrine()->getEntityManager()->commit();
			$em->clear();
			$return = array("responseCode"=>200, "datos"=>$datos);
		}
		else {
			$return = array("responseCode"=>400, "greeting"=>"Bad");
		}
	
		$return = json_encode($return);
		return new Response($return,200,array('Content-Type'=>'application/json'));
	}
	
	public function EditarCategoriaAction(){
	
		$request = $this->get('request');
		$form = $request->request->get('formulario');
	
		$datos = array();
		parse_str($form,$datos);
	
		$CategoriaNom = null;
		$CategoriaDesc = null;
		$CategoriaEst = null;
	
		if ($form != null){
	
			$Categoriaid = $datos["id"];

			$CategoriaNom = $datos["nom_categoriaE"];
			$CategoriaDesc = $datos["desc_categoriaE"];
			$CategoriaEst = $datos["selectEstadoE"];
			
			$Categoria = $this->getDoctrine()
			->getRepository('DicarsDataBundle:VenCategoria')
			->findOneBy(array('ncategoriaId' => $Categoriaid));
	
			$Categoria->setCcategorianom($CategoriaNom);
			$Categoria->setCcategoriadesc($CategoriaDesc);
			$Categoria->setCcategoriaest($CategoriaEst);
	
			$em = $this->getDoctrine()->getEntityManager();
			$this->getDoctrine()->getEntityManager()->beginTransaction();
	
			try {
				$em->flush();
			} catch (Exception $e) {
				$this->getDoctrine()->getEntityManager()->rollback();
				$this->getDoctrine()->getEntityManager()->close();
				$return = array("responseCode"=>400, "greeting"=>"Bad");
	
				throw $e;
			}
			$this->getDoctrine()->getEntityManager()->commit();
			$em->clear();
			$return = array("responseCode"=>200, "datos"=>$datos);
	
		}
		else {
			$return = array("responseCode"=>400, "greeting"=>"Bad");
		}
	
		$return = json_encode($return);
		return new Response($return,200,array('Content-Type'=>'application/json'));
	}

}
