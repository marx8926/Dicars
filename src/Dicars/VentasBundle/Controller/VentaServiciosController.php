<?php
namespace Dicars\VentasBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Normalizer\GetSetMethodNormalizer;

class VentaServiciosController extends Controller{

	public function getTablaClientesAction(){
		$em = $this->getDoctrine()->getEntityManager();
			
		$clientes = $this->getDoctrine()
		->getRepository('DicarsDataBundle:VenCliente')
		->findAll();
			
		$em->clear();
	
		$todo = array();
		foreach ($clientes as $key => $cliente){
			$todo[] = array(
					'id' => $cliente -> getNclienteId() ,
					'nombre' => $cliente -> getCclientenom() , 
					'apellido' => $cliente -> getCclienteape(),
					'dni' => $cliente -> getCclientedni(), 
					'referencia' => $cliente -> getCclienteref(),
					'direccion' => $cliente -> getCclientecdir(),
					'zonaId' => $cliente -> getNzona() -> getNzonaId(),
					'zonadesc' => $cliente -> getNzona() -> getCzonadesc(),
					'linea_credito' => $cliente -> getNclientelineaop(),
					'arccredito' => $cliente -> getCclientearccredito(),
					'ocupacion' => $cliente -> getCclienteocup(),
					'ver_pagar' => "<a class='btn btn-warning btn-pagar' href='#'>Pagar</a>",
					'ver_btn' => "<a class='btn btn-success btn-datos' href='#'><i class='icon-zoom-in icon-white'></i>Ver Datos</a>",
					'edit_btn' => "<a class='btn btn-info btn-editar' href='#'><i class='icon-edit icon-white'></i>Editar</a>",
					'elim_btn' => "<a class='btn btn-danger' href='#'><i class='icon-trash icon-white'></i>Eliminar</a>");
		}
		return new JsonResponse(array('aaData' => $todo));
	}
	
	public function getClienteByIdAction($id){
		$em = $this->getDoctrine()->getEntityManager();
			
		$cliente = $this->getDoctrine()
		->getRepository('DicarsDataBundle:VenCliente')
		->findOneBy(array('nclienteId' => $id));
	
		$em->clear();
	
		$data = array('id' => $cliente -> getNclienteId(),
				'nombres' => $cliente -> getCclientenom(),
				'apellidos' => $cliente -> getCclienteape(),
				'dni' => $cliente -> getCclientedni(),
				'referencia' => $cliente -> getCclienteref(),
				'direccion' => $cliente -> getCclientecdir(),
				'zona' => $cliente -> getNzona()-> getNzonaId(),
				'lineaop' => $cliente -> getNclientelineaop(),
				'arccredito' => $cliente -> getCclientearccredito(),
				'ocupacion' => $cliente -> getCclienteocup());
	
		return new JsonResponse($data);
	}
	
	public function getTablaEmpleadosAction(){
		$em = $this->getDoctrine()->getEntityManager();
			
		$empleados = $this->getDoctrine()
		->getRepository('DicarsDataBundle:VenPersonal')
		->findAll();
			
		$em->clear();
	
		$todo = array();
		foreach ($empleados as $key => $empleado){
			$todo[] = array('id' => $empleado -> getNpersonalId() ,
					'nombres' => $empleado -> getCpersonalnom() , 
					'apellidos' => $empleado -> getCpersonalape(),
					'dni' => $empleado -> getCpersonaldni(), 
					'telefono' => $empleado -> getCpersonaltelf(),
					'ver_btn' => "<a id-data='".$empleado -> getNpersonalId()."' class='btn btn-success btn-datos' href='#'><i class='icon-zoom-in icon-white'></i>Ver Datos</a>",
					'edit_btn' => "<a id-data='".$empleado -> getNpersonalId()."' class='btn btn-info btn-editar' href='#'><i class='icon-edit icon-white'></i>Editar</a>",
					'elim_btn' => "<a id-data='".$empleado -> getNpersonalId()."' class='btn btn-danger' href='#'><i class='icon-trash icon-white'></i>Eliminar</a>");
		}
		return new JsonResponse(array('aaData' => $todo));
	}
	
	public function getTrabajadorByIdAction($id){
		$em = $this->getDoctrine()->getEntityManager();
			
		$empleado = $this->getDoctrine()
		->getRepository('DicarsDataBundle:VenPersonal')
		->findOneBy(array('npersonalId' => $id));
	
		$em->clear();
	
		$data = array('id' => $empleado -> getNpersonalId(),
				'cargo' => $empleado -> getNcargo()-> getNcargoId(),
				'dni' => $empleado -> getCpersonaldni(),
				'nombres' => $empleado -> getCpersonalnom(),
				'apellidos' => $empleado -> getCpersonalape(),				
				'telefono' => $empleado -> getCpersonaltelf(),
				'email' => $empleado -> getCpersonalemail(),
				'fechanacimiento' => $empleado -> getDpersonalfec() -> format('d/m/Y'),
				'sexo' => $empleado -> getCpersonalsexo(),
				'estado' => $empleado -> getCpersonalest(),
				'edad' => $empleado -> getCpersonaledad());
	
		return new JsonResponse($data);
	}
	
	public function getTablaOfertasAction(){
		$em = $this->getDoctrine()->getEntityManager();
			
		$ofertas = $this->getDoctrine()
		->getRepository('DicarsDataBundle:Oferta')
		->findAll();
			
		$em->clear();
	
		$todo = array();
		foreach ($ofertas as $key => $oferta){
			
			$FechaHoy = new \DateTime();
			
			$estado = '';
			if($FechaHoy<=$oferta -> getDofertafecvigente())
				$estado = "<span class='label label-warning'>Pendiente</span>";
			else if ($FechaHoy >= $oferta -> getDofertafecvigente() && $FechaHoy <= $oferta -> getDofertafecvencto())
				$estado = "<span class='label label-success'>Vigente</span>";
			else
				$estado = "<span class='label label-important'>No Vigentete</span>";
			
			$todo[] = array(
					'idoferta' => $oferta -> getNofertaId() ,
					'desc' => $oferta -> getCofertadesc(),
					'descuento' => $oferta -> getNofertaporc(),
					'estado' => $estado,
					'fecvigente' => $oferta -> getDofertafecvigente() -> format('d/m/Y'),
					'fecvencimiento' => $oferta -> getDofertafecvencto() -> format('d/m/Y'),
					'edit_btn' => "<a id-data='".$oferta -> getNofertaId()."' class='btn btn-info btn-editar' href='#'><i class='icon-edit icon-white'></i>Editar</a>",
					'elim_btn' => "<a id-data='".$oferta -> getNofertaId()."' class='btn btn-danger' href='#'><i class='icon-trash icon-white'></i>Eliminar</a>");
		}
		return new JsonResponse(array('aaData' => $todo));
	}
	
	public function getTablaVentaProductoOfertaAction(){
		$em = $this->getDoctrine()->getEntityManager();
		
		$sql = "SELECT * from Ven_productosoferta";
		
		$smt = $em->getConnection()->prepare($sql);
		$smt->execute();
		
		$productos = $smt->fetchAll();
		$em->clear();
	
		$todo = array();
		foreach ($productos as $key => $producto){
			$todo[] = array(
					'id' => $producto['nProducto_id'] ,
					'talla' => $producto['cProductoTalla'] ,
					'nombre' => $producto['cProductoDesc'],
					'pcontado' => $producto['PrecioContado_Dscto'],
					'pcredito' => $producto['PrecioCredito_Dscto'],
					'stock' => $producto['nProductoStock'],
					'talla' => $producto['cProductoTalla'],
					'marcaId' => $producto['nProductoMarca'],
					'descoferta' => $producto['DescripcionOferta'],
					'marca' => $producto['cMarcaDesc'],
					'categoriaId' => $producto['nCategoria_id'],
					'categoria' => $producto['cCategoriaNom'],
					'descuento' => $producto['nOfertaProductoPorc'] ,
					'ver_btn' => "<a class='btn btn-success btn-datos' href='#'><i class='icon-zoom-in icon-white'></i>Ver Datos</a>",
					'edit_btn' => "<a class='btn btn-info btn-editar' href='#'><i class='icon-edit icon-white'></i>Editar</a>",
					'elim_btn' => "<a class='btn btn-danger' href='#'><i class='icon-trash icon-white'></i>Eliminar</a>");
		}
		return new JsonResponse(array('aaData' => $todo));
	}
	
	public function getTablaVentaProductoSinOfertaAction(){
		$em = $this->getDoctrine()->getEntityManager();
	
		$sql = "SELECT * from Ven_productossinoferta";
	
		$smt = $em->getConnection()->prepare($sql);
		$smt->execute();
	
		$productos = $smt->fetchAll();
		$em->clear();
	
		$todo = array();
		foreach ($productos as $key => $producto){
			$todo[] = array(
					'idproducto' => $producto['nProducto_id'] ,
					'talla' => $producto['cProductoTalla'] ,
					'nombre' => $producto['cProductoDesc'],
					'pcontado' => $producto['nProductoPContado'],
					'pcredito' => $producto['nProductoPCredito'],
					'stock' => $producto['nProductoStock'],
					'talla' => $producto['cProductoTalla'],
					'marcaId' => $producto['nProductoMarca'],
					'marca' => $producto['cMarcaDesc'],
					'categoriaId' => $producto['nCategoria_id'],
					'categoria' => $producto['cCategoriaNom'],
					'ver_btn' => "<a class='btn btn-success btn-datos' href='#'><i class='icon-zoom-in icon-white'></i>Ver Datos</a>",
					'edit_btn' => "<a class='btn btn-info btn-editar' href='#'><i class='icon-edit icon-white'></i>Editar</a>",
					'elim_btn' => "<a class='btn btn-danger' href='#'><i class='icon-trash icon-white'></i>Eliminar</a>");
		}
		return new JsonResponse(array('aaData' => $todo));
	}
	
	public function getTablaOfertaProductoByIdAction($idOferta){
		$em = $this->getDoctrine()->getEntityManager();
			
		$OfertasProductos = $this->getDoctrine()
		->getRepository('DicarsDataBundle:OfertaProducto')
		->findBy(array('noferta' => $idOferta ));
			
		$em->clear();
		
		$todo = array();
		foreach ($OfertasProductos as $key => $OfertaProducto){
			$Producto = $OfertaProducto -> getNproducto();
			
			if($OfertaProducto -> getCofertaproductoest() == 0)
				$estado = "<span class='label label-important'>Eliminar</span>";
			else
				$estado = "<span class='label label-success'>Activo</span>";
			
			$todo[] = array(
				'idofertaproducto' => $OfertaProducto -> getNofertaproductoId(), 
				'idproducto' => $Producto -> getNproductoId(),
				'talla' => $Producto -> getCproductotalla() ,
				'band'=> 0,
				'nombre' => $Producto -> getCproductodesc(),
				'pcontado' => $Producto -> getNproductopcontado(),
				'pcredito' => $Producto -> getNproductopcredito(),
				'stock' => $Producto -> getNproductostock(),
				'marca' => $Producto -> getNproductomarca() -> getCmarcadesc(),
				'labelestado' => $estado,
				'estado' => $OfertaProducto -> getCofertaproductoest(),
				'elim_btn' => "<a class='btn btn-danger' href='#'><i class='icon-trash icon-white'></i>Eliminar</a>");
		}
		
		return new JsonResponse(array('aaData' => $todo));
	}
	
	public function getTablaCreditosByIdAction($idcliente){
		$em = $this->getDoctrine()->getEntityManager();
			
		$Ventas = $this->getDoctrine()
		->getRepository('DicarsDataBundle:VenVenta')
		->findBy(array('ncliente' => $idcliente ,
						'nventatippag' => 2
				));
			
		$em->clear();
	
		$todo = array();
		foreach ($Ventas as $key => $Venta){
			
			$Credito = $this->getDoctrine()
			->getRepository('DicarsDataBundle:VenCredito')
			->findOneBy(array('nventa' => $Venta -> getNventaId()));
			
			$todo[] = array(
					'idventa' => $Venta -> getNventaId(),
					'idcredito' => $Credito -> getNvencreditoId(),
					'montototal' => $Venta -> getNventatotapag(),
					'montopagado' => $Venta -> getNventatotamt() ,
					'cuotas' => $Credito -> getNvencreditoncuota(),
					'ver_pagar' => "<a class='btn btn-warning btn-pagar' href='#'>Pagar</a>",
					);
		}
	
		return new JsonResponse(array('aaData' => $todo));
	}
	
	public function getTablaCuotasByIdAction($idcredito){
		$em = $this->getDoctrine()->getEntityManager();
			
		$Cronogramas = $this->getDoctrine()
		->getRepository('DicarsDataBundle:VenCronpago')
		->findBy(array('nvencredito' => $idcredito),array('ncronpagofecpago' => 'ASC'));
			
		$em->clear();
	
		$todo = array();
		foreach ($Cronogramas as $key => $Cronograma){
				
			$todo[] = array(
					'fecpago' => $Cronograma -> getNcronpagofecpago() -> format('d/m/Y'),
					'nrocuota' => $Cronograma -> getNcronpagonrocuota(),
					'monto' => $Cronograma -> getNcronpagomoncouapg(),
					'idcrono' => $Cronograma -> getNcronogramaId()
			);
		}
	
		return new JsonResponse(array('aaData' => $todo));
	}
	
}
