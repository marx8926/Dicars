<?php
namespace Dicars\AdminBundle\Controller;

use Dicars\DataBundle\Entity\Usuario;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\ORM\TransactionRequiredException;
use FOS\UserBundle\FOSUserBundle;
use FOS\UserBundle\Model\UserManager;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class AdministrarUsuarioController  extends Controller {
    
    
        public function AdminRolesAction(){
            
                $request = $this->get('request');
		$form = $request->request->get('formulario');
	
		$datos = array();
		parse_str($form,$datos);  
                             
                
                $usuario = $datos['code_user'];
                $userManager = $this->get('fos_user.user_manager');
                $user = $userManager->findUserByUsername($usuario);
                
                if($form!=NULL && $user!= NULL)
                {
                    $em = $this->getDoctrine()->getEntityManager();
                    $em -> beginTransaction();
                                               
                     if(strpos($form, 'administrador')!==false)              
                         $user->addRole("ROLE_ADMIN");
                     else $user->removeRole("ROLE_ADMIN");
                     
                     if(strpos($form, 'jventas')!==false)
                         $user->addRole("ROLE_JVENTA"); 
                     else $user->removeRole("ROLE_JVENTA");
                     
                     if(strpos($form, 'jlogistica')!==false)
                         $user->addRole("ROLE_JLOG");
                     else $user->removeRole("ROLE_JLOG");
                     
                     if(strpos($form, 'jsoporte')!==false)
                         $user->addRole("ROLE_JSOP"); 
                     else $user->removeRole("ROLE_JSOP");
                     
                     if(strpos($form, 'vendedor')!==false)
                         $user->addRole("ROLE_VENDEDOR");
                     else $user->removeRole("ROLE_VENDEDOR");
                     
                     if(strpos($form, 'cobranza')!==false)
                         $user->addRole("ROLE_COBRANZA");  
                     else $user->removeRole("ROLE_COBRANZA");
                     
                     if(strpos($form, 'asistalmacen')!==false)
                         $user->addRole("ROLE_ASIST_ALM"); 
                     else $user->removeRole("ROLE_ASIST_ALM");
                     
                     if(strpos($form, 'asistkardex')!==false)
                         $user->addRole("ROLE_ASIST_KARD"); 
                     else $user->removeRole("ROLE_ASIST_KARD");
                     
                     if(strpos($form, 'soporteventas')!==false)
                         $user->addRole("ROLE_SUPORT_VENTA");
                     else $user->removeRole("ROLE_SUPORT_VENTA");
                     
                     if(strpos($form, 'soporterh')!==false)
                         $user->addRole("ROLE_SUPORT_RH");
                     else $user->removeRole("ROLE_SUPORT_RH");
                             
                    try {                            
				$userManager->updateUser($user);                                
				$em->flush();
			} catch (Exception $e){
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
	
                $return = array("responseCode"=>200, "datos"=>$datos);
		$return = json_encode($return);
		return new Response($return,200,array('Content-Type'=>'application/json'));
             
        }

	public function RegistrarUsuarioAction(){
		$request = $this->get('request');
		$form = $request->request->get('formulario');
	
		$datos = array();
		parse_str($form,$datos);
	
		$Usuario_trabajador = null;
		$Usuario_id = null;
		$Usuario_clave = null;
		$Usuario_estado = null;
		$Usuario_fechareg = null;
                
                $userManager = $this->get('fos_user.user_manager');
	
		if ($form!=null){
			
			$Usuario_trabajador = $this->getDoctrine()
			->getRepository('DicarsDataBundle:VenPersonal')
			->findOneBy(array('npersonalId'  => $datos["trabajador"]));
			
			$Usuario_id = $datos["usuario_id"];
			$Usuario_clave = $datos["contrasena"];
			$Usuario_estado = $datos["estado"];
                        $Usuario_email = $datos["email"];
			
			$Usuario_fechareg = new \DateTime();
			
                        /*
			$Usuario = new Usuario();
			$Usuario->setNpersonal($Usuario_trabajador);
			$Usuario->setCusuarioid($Usuario_id);
			$Usuario->setCusuarioclave($Usuario_clave);
			$Usuario->setCusuarioest($Usuario_estado);
			$Usuario->setCusuariofecreg($Usuario_fechareg);
                         * 
                         */
                     
			
			$em = $this->getDoctrine()->getEntityManager();
			$em -> beginTransaction();
                        
                        $user = $userManager->createUser();
                        $user->setUsername($Usuario_id);
                        $user->setPlainPassword($Usuario_clave);
                        $user->setEnabled(TRUE);
                        $user->setEmail($Usuario_email);
                        $user->setNpersonal($Usuario_trabajador);
                       
                        $datos = $user->getUsername();
                        
			try {
                            
				$userManager->updateUser($user);
                                
				$em->flush();
			} catch (Exception $e){
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
	
	public function EditarUsuarioAction(){
	
		$request = $this->get('request');
		$form = $request->request->get('formulario');
	
		$datos = array();
		parse_str($form,$datos);
		
		$Usuario_cod = null;
		$Usuario_trabajador = null;
		$Usuario_id = null;
		$Usuario_clave = null;
		$Usuario_estado = null;
		$Usuario_fechareg = null;
	
		if ($form != null){
			
			$Usuario_cod = $datos["idE"];
			$Usuario_id = $datos["usuario_idE"];
			$Usuario_clave = $datos["contrasenaE"];
			$Usuario_estado = $datos["estadoE"];
			
			$Usuario = $this->getDoctrine()
			->getRepository('DicarsDataBundle:Usuario')
			->findOneBy(array('nusuarioId' => $Usuario_cod));
				
			$Usuario->setCusuarioid($Usuario_id);
			$Usuario->setCusuarioclave($Usuario_clave);
			$Usuario->setCusuarioest($Usuario_estado);
			
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
			$em->close();
			$em->clear();
			$return = array("responseCode"=>200, "datos"=>$datos);	
		}
		else {
			$return = array("responseCode"=>400, "greeting"=>"Bad");
		}	
		$return = json_encode($return);
		return new Response($return,200,array('Content-Type'=>'application/json'));
	}
        
        
        public function getParent() {
            return "FOSUserBundle";
        }
	
        
        
}
