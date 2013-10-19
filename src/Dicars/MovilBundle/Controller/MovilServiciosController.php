<?php

namespace Dicars\MovilBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Normalizer\GetSetMethodNormalizer;
use Dicars\DataBundle\Entity\UsuarioLocal;

class MovilServiciosController extends Controller{
    
    public function lugarAction()
    {
       //cambiar la consulta sql a un procedimiento almacenado
        
       $userManager = $this->container->get('fos_user.user_manager');
       $user = $userManager->findUserByUsername($this->container->get('security.context')
					->getToken()
				->getUser());
       $todo = array();
       if($user!= NULL)
       {
         
           $em = $this->getDoctrine()->getEntityManager();
           try
            {
                $em->beginTransaction();
            
                $sql = " SELECT * FROM usuario_local u inner join local l on l.nLocal_id=u.nLocal_id 
                and u.nUsuario_id=:id and u.cUsuarioLocalEstado=:est " ;
                
                $smt = $em->getConnection()->prepare($sql);
                $smt->execute(array(':id'=>$user->getId(),':est'=>'H'));
        
                $todo = $smt->fetchAll();
            
                $em->commit();
                $em->clear();
            
            }
            catch(Exception $e)
            {
                $em->rollback();
                $em->close();
                
                throw $e;
            }
           
       }
       
        return new JsonResponse($todo);     
    }
}
