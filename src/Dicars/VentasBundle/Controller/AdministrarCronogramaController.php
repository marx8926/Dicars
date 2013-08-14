<?php
namespace Dicars\VentasBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\ORM\TransactionRequiredException;

class AdministrarCronogramaController extends Controller{
	
	public function PagarCuotaAction(){
		$request = $this->get('request');
		$form = $request->request->get('formulario');
		$otherdata = $request->request->get('otherdata');
		$datos = array();
		parse_str($form, $datos);
		
		$Credito = null;
		
		if ($form!=null){
			
			$Credito = $this->getDoctrine()
			->getRepository('DicarsDataBundle:VenCredito')
			->findOneBy(array('nvencreditoId' => $datos["idcredito"]));
			
			$Pagado = $datos['monto']+$Credito -> getNvencreditoppag();
			$Credito -> setNvencreditoppag($Pagado);
				
			$Venta = $Credito -> getNventa();
			
			$Saldo = $Venta ->getNventasaldo() - $datos['monto'];
			
			if($Saldo < 0){
				$Venta -> setNventasaldo(0);
				$Saldo = 0;
			}else
				$Venta -> setNventasaldo($Saldo);
			
			$VentaPagado = ($Venta -> getNventatotapag() - $Saldo);
			$Venta -> setNventatotamt($VentaPagado);
			
			$em = $this->getDoctrine()->getEntityManager();
			$em->beginTransaction();
		try {
			$em->flush();
			foreach($otherdata as $key => $data){
				if($data["band"]==1){
					$Cronograma = $this->getDoctrine()
					->getRepository('DicarsDataBundle:VenCronpago')
					->findOneBy(array('ncronogramaId' => $data["idcrono"]));
					
					$Cronograma -> setNcronpagofecreg(new \DateTime());
					$Cronograma -> setNcronpagomoncouapg($data['monto']);
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
		$return = array("responseCode"=>200, "datos"=>$datos, "otherdata" => $otherdata);
		}
		else {
			$return = array("responseCode"=>400, "greeting"=>"Bad");
		}
		$return = json_encode($return);
		return new Response($return,200,array('Content-Type'=>'application/json'));
	}

}
