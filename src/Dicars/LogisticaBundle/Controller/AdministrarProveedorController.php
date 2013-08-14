<?php
namespace Dicars\LogisticaBundle\Controller;

use Dicars\DataBundle\Entity\LogProveedor;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\ORM\TransactionRequiredException;

class AdministrarProveedorController extends Controller {
	
	public function RegistrarProveedorAction(){
		$request = $this->get('request');
		$form = $request->request->get('formulario');
		
		$datos = array();
		parse_str($form,$datos);
		
		$ProveedorRuc = null;
		$ProveedorRazonSocial = null;
		$ProveedorTel = null;
		$ProveedorEmail = null;
		$ProveedorSitioWeb = null;
		$ProveedorDirec = null;
		$ProveedorCCorriente = null;
		
		if ($form!=null){
			$ProveedorRuc = $datos["ruc"];
			$ProveedorRazonSocial = $datos["razonsocial"];
			$ProveedorTel = $datos["telefono"];
			$ProveedorEmail = $datos["email"];
			$ProveedorSitioWeb = $datos["paginaweb"];
			$ProveedorDirec = $datos["direccion"];
			$ProveedorCCorriente = $datos["ccorriente"];
			
			$Proveedor = new LogProveedor();
			$Proveedor->setCproveedorruc($ProveedorRuc);
			$Proveedor->setCproveedorrazsocial($ProveedorRazonSocial);
			$Proveedor->setCproveedortel($ProveedorTel);
			$Proveedor->setCproveedoremail($ProveedorEmail);
			$Proveedor->setCproveedorsitioweb($ProveedorSitioWeb);
			$Proveedor->setCproveedordirec($ProveedorDirec);
			$Proveedor->setCproveedorccorriente($ProveedorCCorriente);
			
			$em = $this->getDoctrine()->getEntityManager();
			$em->beginTransaction();
			try {
				$em->persist($Proveedor);
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
	
	public function EditarProveedorAction(){
		$request = $this->get('request');
		$form = $request->request->get('formulario');
	
		$datos = array();
		parse_str($form,$datos);
	
		$ProveedorRuc = null;
		$ProveedorRazonSocial = null;
		$ProveedorTel = null;
		$ProveedorEmail = null;
		$ProveedorSitioWeb = null;
		$ProveedorDirec = null;
		$ProveedorCCorriente = null;
	
		if ($form!=null){
			$ProveedorId = $datos["idE"];
			$ProveedorRuc = $datos["rucE"];
			$ProveedorRazonSocial = $datos["razonsocialE"];
			$ProveedorTel = $datos["telefonoE"];
			$ProveedorEmail = $datos["emailE"];
			$ProveedorSitioWeb = $datos["paginawebE"];
			$ProveedorDirec = $datos["direccionE"];
			$ProveedorCCorriente = $datos["ccorrienteE"];
				
			$Proveedor = $this->getDoctrine()
			->getRepository('DicarsDataBundle:LogProveedor')
			->findOneBy(array('nproveedorId' => $ProveedorId));
			
			$Proveedor->setCproveedorruc($ProveedorRuc);
			$Proveedor->setCproveedorrazsocial($ProveedorRazonSocial);
			$Proveedor->setCproveedortel($ProveedorTel);
			$Proveedor->setCproveedoremail($ProveedorEmail);
			$Proveedor->setCproveedorsitioweb($ProveedorSitioWeb);
			$Proveedor->setCproveedordirec($ProveedorDirec);
			$Proveedor->setCproveedorccorriente($ProveedorCCorriente);
				
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
