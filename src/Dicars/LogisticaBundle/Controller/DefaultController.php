<?php

namespace Dicars\LogisticaBundle\Controller;

use Symfony\Component\BrowserKit\Request;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\ORM\TransactionRequiredException;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('DicarsLogisticaBundle:Default:index.html.twig');
    }
    public function productosAction()
    {
    	return $this->render('DicarsLogisticaBundle:Default:productos.html.twig');
    }
    public function proveedoresAction()
    {
    	return $this->render('DicarsLogisticaBundle:Default:proveedores.html.twig');
    }
    public function localesAction()
    {
    	return $this->render('DicarsLogisticaBundle:Default:locales.html.twig');
    }
    public function cons_salidaproductosAction()
    {
    	return $this->render('DicarsLogisticaBundle:Default:salida_productos_consultar.html.twig');
    }
    public function reg_salidaproductosAction()
    {
    	return $this->render('DicarsLogisticaBundle:Default:salida_productos_registrar.html.twig');
    }
    public function ver_salidaproductosAction($idsalprod)
    {
    	$SalProd = $this->getDoctrine()
    	->getRepository('DicarsDataBundle:LogSalprod')
    	->findOneBy(array('nsalprodId' => $idsalprod));
    	
    	$solicitante = $this->getDoctrine()
    	->getRepository('DicarsDataBundle:VenPersonal')
    	->findOneBy(array('npersonalId' => $SalProd->getNsolicitanteId()));
    	
    	$motivo = $this->getDoctrine()
			->getRepository('DicarsDataBundle:Constante')
			->findOneBy(array('nconstanteclase' => '4', 'cconstantevalor' =>$SalProd -> getNsalprodmotivo()));
    	
    	return $this->render('DicarsLogisticaBundle:Default:salida_productos_ver.html.twig',array(
    			'id' => $idsalprod,
    			'personal' => $SalProd->getNpersonal()->getCpersonalnom()." ".$SalProd->getNpersonal()->getCpersonalape(),
    			'local' => $SalProd->getNlocal()->getClocaldesc(),
    			'serie' => $SalProd->getCsalprodserie(),
    			'nro' => $SalProd->getCsalprodnro(),
    			'fecha_reg' => $SalProd->getDsalprodfecreg()->format('d/m/Y'),
    			'motivo' => $motivo -> getCconstantedesc(),
    			'solicitante' => $solicitante->getCpersonalnom()." ".$solicitante->getCpersonalape(),
    			'observacion' => $SalProd->getCsalprodobsv()
    			));
    }
    public function ver_ingresoproductosAction($idingprod)
    {
    	$IngProd = $this->getDoctrine()
    	->getRepository('DicarsDataBundle:LogIngprod')
    	->findOneBy(array('ningprodId' => $idingprod));

    	$motivo = $this->getDoctrine()
			->getRepository('DicarsDataBundle:Constante')
			->findOneBy(array('nconstanteclase' => '3', 'cconstantevalor' =>$IngProd -> getNingprodmotivo()));
    	 
    	return $this->render('DicarsLogisticaBundle:Default:ingreso_productos_ver.html.twig',array(
    			'id' => $idingprod,
    			'personal' => $IngProd->getNpersonal()->getCpersonalnom()." ".$IngProd->getNpersonal()->getCpersonalape(),
    			'local' => $IngProd->getNlocal()->getClocaldesc(),
    			'serie' => $IngProd->getCingprodserie(),
    			'nro' => $IngProd->getCingprodnro(),
    			'motivo' => $motivo -> getCconstantedesc(),
    			'serie_doc' => $IngProd->getCingproddocserie(),
    			'fecha_reg' => $IngProd->getDingprodfecreg()->format('d/m/Y'),
    			'nro_doc' => $IngProd->getCingproddocnro(),    			
    			'observacion' => $IngProd->getCingprodobsv(),
    			'estado' => $IngProd->getCingprodest()
    	));
    }
    public function editar_ingresoproductosAction($idingprode)
    {
    	$IngProd = $this->getDoctrine()
    	->getRepository('DicarsDataBundle:LogIngprod')
    	->findOneBy(array('ningprodId' => $idingprode));
    
    	return $this->render('DicarsLogisticaBundle:Default:ingreso_productos_editar.html.twig',array(
    			'id' => $idingprode,
    			'personal' => $IngProd->getNpersonal()->getCpersonalnom()." ".$IngProd->getNpersonal()->getCpersonalape(),
    			'local' => $IngProd->getNlocal()->getClocaldesc(),
    			'serie' => $IngProd->getCingprodserie(),
    			'nro' => $IngProd->getCingprodnro(),
    			'motivo' => $IngProd->getNingprodmotivo(),
    			'serie_doc' => $IngProd->getCingproddocserie(),
    			'fecha_reg' => $IngProd->getDingprodfecreg()->format('d/m/Y'),
    			'nro_doc' => $IngProd->getCingproddocnro(),
    			'observacion' => $IngProd->getCingprodobsv(),
    			'estado' => $IngProd->getCingprodest()
    	));
    }
    public function cons_ingresoproductosAction()
    {
    	return $this->render('DicarsLogisticaBundle:Default:ingreso_productos_consultar.html.twig');
    }
    public function reg_ingresoproductosAction()
    {
    	return $this->render('DicarsLogisticaBundle:Default:ingreso_productos_registrar.html.twig');
    }
    public function pedidosAction()
    {
    	return $this->render('DicarsLogisticaBundle:Default:pedidos.html.twig');
    }
    public function pedidos_registrarAction()
    {
    	return $this->render('DicarsLogisticaBundle:Default:pedidos_registrar.html.twig');
    }
    public function pedidos_verAction($idpedido)
    {
    	$Pedido = $this->getDoctrine()
    	->getRepository('DicarsDataBundle:LogOrdped')
    	->findOneBy(array('nordpedId' => $idpedido));
    	 
    	return $this->render('DicarsLogisticaBundle:Default:pedidos_ver.html.twig',array(
    			'id' => $idpedido,
    			'personal' => $Pedido->getNpersonal()->getCpersonalnom()." ".$Pedido->getNpersonal()->getCpersonalape(),
    			'serie' => $Pedido->getCordpedserie(),
    			'nro' => $Pedido->getCordpednro(),
    			'email' => $Pedido->getCordpedenvemail(),
    			'local' => $Pedido->getNlocal()->getClocaldesc(),
    			'fecha_reg' => $Pedido->getDordpedfecreg()->format('d/m/Y'),
    			'fecha_ent' => $Pedido->getDordepedfecent()->format('d/m/Y'),
    			'observacion' => $Pedido->getCordpedobsv(),
    			'estado' => $Pedido->getCordpedest()
    	));
    }
    public function orden_compra_registrarAction()
    {
    	return $this->render('DicarsLogisticaBundle:Default:orden_compra_registrar.html.twig');
    }
    public function orden_compra_consultarAction()
    {
    	return $this->render('DicarsLogisticaBundle:Default:orden_compra_consultar.html.twig');
    }
    public function orden_compra_verAction($idordcom)
    {
    	$OrdCom = $this->getDoctrine()
    	->getRepository('DicarsDataBundle:LogOrdcom')
    	->findOneBy(array('nordencomId' => $idordcom));
    	
    	$personal = $OrdCom->getNpersonal();
    	$proveedor = $OrdCom -> getNproveedor();
    	
    	$subtotal = $OrdCom->getNordcomsubtotal();
    
    	return $this->render('DicarsLogisticaBundle:Default:orden_compra_ver.html.twig',array(
    			'id' => $idordcom,
    			'personal' => $personal->getCpersonalnom()." ".$personal->getCpersonalape(),
    			'proveedor' => $proveedor->getCproveedorrazsocial(),
    			'fecha_reg' => $OrdCom->getOrdcomfecreg()->format('d/m/Y'),
    			'serie' => $OrdCom->getCordcomserie(),
    			'nro' => $OrdCom->getCordcomnro(),
    			'subtotal' => $OrdCom->getNordcomsubtotal(),
    			'igv' => $OrdCom->getNordcomigv(),
    			'montoigv' => $OrdCom->getNordcomigv()*$OrdCom->getNordcomsubtotal()/100,
    			'total' => $OrdCom->getNordcomtotal(),
    			'observacion' => $OrdCom->getCordcomobsv(),
    			'estado' => $OrdCom->getCordcomest(),
    			'descuento' => $OrdCom->getNordcomdesct(),
    			'montodescuento' => $OrdCom->getNordcomsubtotal()*$OrdCom->getNordcomsubtotal()/100,
    			'recequiv' => $OrdCom->getNordcomreceqv(),
    			'retencion' => $OrdCom->getNordcomretencion()
    	));
    }

    public function saldo_inicialAction()
    {
    	return $this->render('DicarsLogisticaBundle:Default:saldo_inicial.html.twig');
    }
    public function kardexAction()
    {
    	return $this->render('DicarsLogisticaBundle:Default:generar_kardex.html.twig');
    }
}
