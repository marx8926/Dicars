<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Dicars\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    public function apiLoginAction()
    {
        $response = new Response();  
        $response->setContent('<html><body>OK</body></html>');  
        $response->setStatusCode(200);  
        $response->headers->set('Content-Type', 'text/html');  
   
        return $response;  
    }
}
?>
