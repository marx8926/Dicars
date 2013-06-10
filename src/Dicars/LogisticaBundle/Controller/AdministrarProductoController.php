<?php
namespace Dicars\LogisticaBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\ORM\TransactionRequiredException;


class AdministrarProductoController extends Controller{

	public function RegistrarProductoAction(){
		$request=$this->get('request');
		$form=$request->request->get('formulario');
		
		$datos=array();
		
		parse_str($form,$datos);
		
		$return = array("responseCode"=>200, "datos"=>$datos);
		
		$return = json_enconde($return);
		return new Response($return,200,array('Content-Type'=>'application/json'));
	}
	
	
}
