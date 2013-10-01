<?php

namespace Dicars\UserBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class UserBundle extends Bundle
{
    public function apiLoginAction()
    {
        $response = new Response();  
        $response->setContent('<html><body>OK</body></html>');  
        $response->setStatusCode(200);  
        $response->headers->set('Content-Type', 'text/html');  
   
        return $response;  
    }
    public function getParent() {
        return "FOSUserBundle";
    }
}
