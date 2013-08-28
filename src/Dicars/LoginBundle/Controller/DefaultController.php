<?php

namespace Dicars\LoginBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Dicars\DataBundle\Entity\Usuario;
use Dicars\DataBundle\Entity\Rol;
use Symfony\Component\Security\Core\SecurityContext;

class DefaultController extends Controller
{
    public function indexAction()
    {
        $request = $this->getRequest();
        $session = $request->getSession();
        
        $securityContext = $this->get('security.context');

        // get the login error if there is one
        if ($request->attributes->has(SecurityContext::AUTHENTICATION_ERROR)) {
            $error = $request->attributes->get(SecurityContext::AUTHENTICATION_ERROR);
        } else {
            $error = $session->get(SecurityContext::AUTHENTICATION_ERROR);
        }
 
        $resultado = $this->render('DicarsLoginBundle:Default:login.html.twig');
        
        $resultado->setMaxAge(60);
        
        $resultado->setPublic();
        
        return $resultado;
    }
    
    public function crearAction()
    {
        $user = new Usuario();
        
        $user->setCusuarioclave('root');
        $user->setCusuarioest('T');
        $user->setCusuariofecreg(new \DateTime());
        $user->setCusuarioid('root');
        $user->setNpersonal(NULL);
        
        
        $rol = new Rol();
        $rol->setNombre('ROLE_USER');
        
        $em = $this->getDoctrine()->getEntityManager();
	$em ->beginTransaction();
        
        $em->persist($rol);
        
        $em->flush();
        $user->addIdRol($rol);
        $em->persist($user);
        $em->flush();
        
        $em->commit();
        
        return new \Symfony\Component\HttpFoundation\Response('ook');
    }
    
    public function mainAction()
    {
        return new \Symfony\Component\HttpFoundation\Response('ingreso');
    }
    public function checkAction()
    {
        $request = $this->get('request');
        
        return $this->redirect($this->generateUrl('main'));

    }
}
