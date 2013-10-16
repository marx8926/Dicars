<?php
namespace Dicars\AdminBundle\Controller;
use Dicars\DataBundle\Entity\VenMovimiento;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Symfony\Component\HttpFoundation\Response;
use Doctrine\ORM\TransactionRequiredException;

class AdministrarMovimientoController extends Controller {
	
	public function RegistrarMovAction(){
		$request = $this->get('request');
		$form = $request->request->get('formulario');
	
		$datos = array();
		parse_str($form,$datos);
	
		$fecha_reg = null;
		$personal = null; 
		$monto = null;
		$concepto = null;
		$tipo_mov = null;
		$tipo_pag = null;
	
		if ($form!=null){
			$fecha_reg = new \DateTime();
			
			$userManager = $this->container->get('fos_user.user_manager');
			$user = $userManager->findUserByUsername($this->container->get('security.context')
					->getToken()
					->getUser());
			$personal = $user->getNPersonal();
			
			$monto = $datos["monto"];
			$concepto = $datos["concepto"];
			$tipo_mov = $datos["selectTipoMov"];
			$tipo_pag = $datos["selectTipoPag"];
	
			$Movimiento = new VenMovimiento();
			$Movimiento->setDmovimientofecreg($fecha_reg);
			$Movimiento->setNpersonal($personal);
			$Movimiento->setNmovimientomonto($monto);
			$Movimiento->setCmovimientoconcepto($concepto);
			$Movimiento->setNmovimientotip($tipo_mov);
			$Movimiento->setNmovimientotippag($tipo_pag);
	
			$em = $this->getDoctrine()->getEntityManager();
			$em->beginTransaction();
			try {
				$em->persist($Movimiento);
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
