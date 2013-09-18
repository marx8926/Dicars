<?php
namespace Dicars\VentasBundle\Controller;

use Dicars\DataBundle\Entity\VenTransaccion;

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
				
			$Venta = $Credito -> getNventa();
			
			$venta_trans = $this->getDoctrine()
			->getRepository('DicarsDataBundle:VenTransaccion')
			->findOneBy(array('nventa' => $Venta -> getNventaId()));
			
			$Empleado = $venta_trans -> getNpersonal();
			$FechaReg = new \DateTime();
			
			$Porcentage = ($datos['monto'] + $Venta -> getNventatotamt()) / ($Venta -> getNventatotapag())*100;
			$Credito -> setNvencreditoppag($Porcentage);
			
			$Venta -> setNventatotamt($Venta -> getNventatotamt() + $datos['monto']);
			$Venta -> setNventasaldo($Venta -> getNventatotapag() - $Venta -> getNventatotamt());
			
			if($Porcentage >= 100)
				$Venta -> setCventaest(2);
 				
			$em = $this->getDoctrine()->getEntityManager();
			$em->beginTransaction();
		
			foreach($otherdata as $key => $data){
				if($data["band"]==1){
					$Cronograma = $this->getDoctrine()
					->getRepository('DicarsDataBundle:VenCronpago')
					->findOneBy(array('ncronogramaId' => $data["idcrono"]));
					
					$Cronograma -> setNcronpagofecreg($FechaReg);
					$Cronograma -> setNcronpagomoncouapl($data['montoapl']);
					
				}
			}
			if($datos['monto'] > 0){
				$Transaccion = new VenTransaccion();
				$Transaccion -> setCtransacciondesc("Pago de cuotas");
				$Transaccion -> setDtransaccionfecreg($FechaReg);
				$Transaccion -> setNpersonal($Empleado);
				$Transaccion -> setNtransaccionmont($datos['monto']);
				$Transaccion -> setNtransacciontippag(1);
				$Transaccion -> setNventa($Venta);
			
				$em -> persist($Transaccion);
			}
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
		$return = array("responseCode"=>200, "datos"=>$datos, "otherdata" => $otherdata);
		}
		else {
			$return = array("responseCode"=>400, "greeting"=>"Bad");
		}
		$return = json_encode($return);
		return new Response($return,200,array('Content-Type'=>'application/json'));
	}

}
