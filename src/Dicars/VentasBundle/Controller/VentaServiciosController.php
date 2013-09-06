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
	
		$todo = array();
		foreach ($clientes as $key => $cliente){
			$todo[] = array(
					'id' => $cliente -> getNclienteId() ,
					'nombre' => $cliente -> getCclientenom() , 
					'apellido' => $cliente -> getCclienteape(),
					'nomape' => $cliente -> getCclientenom()." ".$cliente -> getCclienteape(),
					'dni' => $cliente -> getCclientedni(), 
					'referencia' => $cliente -> getCclienteref(),
					'direccion' => $cliente -> getCclientecdir(),
					'zonaId' => $cliente -> getNzona() -> getNzonaId(),
					'zonadesc' => $cliente -> getNzona() -> getCzonadesc(),
					'linea_credito' => $cliente -> getNclientelineaop(),
					'arccredito' => $cliente -> getCclientearccredito(),
					'ocupacion' => $cliente -> getCclienteocup(),
					'doc_btn' => "<a class='btn btn-success btn-doc' href='#'><i class='icon-zoom-in icon-white'></i>Ver Documento</a>",
					'ver_pagar' => "<a class='btn btn-success btn-pagar' href='#'><i class='icon-zoom-in icon-white'></i> Ver Creditos</a>",
					'ver_btn' => "<a class='btn btn-success btn-datos' href='#'><i class='icon-zoom-in icon-white'></i>Ver Datos</a>",
					'edit_btn' => "<a class='btn btn-info btn-editar' href='#'><i class='icon-edit icon-white'></i>Editar</a>",
					'elim_btn' => "<a class='btn btn-danger' href='#'><i class='icon-trash icon-white'></i>Eliminar</a>");
		}
		$em->clear();
		$em->close();
		return new JsonResponse(array('aaData' => $todo));
	}
	
	public function getClienteByIdAction($id){
		$em = $this->getDoctrine()->getEntityManager();
			
		$cliente = $this->getDoctrine()
		->getRepository('DicarsDataBundle:VenCliente')
		->findOneBy(array('nclienteId' => $id));
	
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
	
		$em->clear();
		$em->close();
		return new JsonResponse($data);
	}
	
	public function getTablaEmpleadosAction(){
		$em = $this->getDoctrine()->getEntityManager();
			
		$empleados = $this->getDoctrine()
		->getRepository('DicarsDataBundle:VenPersonal')
		->findAll();
	
		$todo = array();
		foreach ($empleados as $key => $empleado){
			$sexo = "";
			$estadodesc = "";
			
			if ($empleado -> getCpersonalsexo() == "M")
				$sexo = "Masculino";
			else
				$sexo = "Femenino";
			
			if ($empleado ->  getCpersonalest() == 1)
				$estadodesc = "<span class='label label-success'>Habilitado</span>";
			else 
				$estadodesc = "<span class='label label-warning'>Inhabilitado</span>";
			
			$todo[] = array('id' => $empleado -> getNpersonalId() ,
					'cargo' => $empleado -> getNcargo() -> getNcargoId(),
					'cargodesc' => $empleado -> getNcargo() -> getNcargodesc(),
					'nombres' => $empleado -> getCpersonalnom() , 
					'apellidos' => $empleado -> getCpersonalape(),
					'nomape' => $empleado -> getCpersonalnom()." ".$empleado -> getCpersonalape(),
					'dni' => $empleado -> getCpersonaldni(), 
					'email' => $empleado -> getCpersonalemail(),
					'telefono' => $empleado -> getCpersonaltelf(),
					'fechanacimiento' => $empleado -> getDpersonalfec() -> format('d/m/Y'),
					'sexo' => $sexo,
					'estado' => $empleado ->  getCpersonalest(),
					'estadodesc' => $estadodesc, 
					'edad' => $empleado -> getCpersonaledad(),
					'ver_btn' => "<a id-data='".$empleado -> getNpersonalId()."' class='btn btn-success btn-datos' href='#'><i class='icon-zoom-in icon-white'></i>Ver Datos</a>",
					'edit_btn' => "<a id-data='".$empleado -> getNpersonalId()."' class='btn btn-info btn-editar' href='#'><i class='icon-edit icon-white'></i>Editar</a>",
					'elim_btn' => "<a id-data='".$empleado -> getNpersonalId()."' class='btn btn-danger' href='#'><i class='icon-trash icon-white'></i>Eliminar</a>");
		}
		$em->clear();
		$em->close();
		return new JsonResponse(array('aaData' => $todo));
	}
	
	public function getTrabajadorByIdAction($id){
		$em = $this->getDoctrine()->getEntityManager();
			
		$empleado = $this->getDoctrine()
		->getRepository('DicarsDataBundle:VenPersonal')
		->findOneBy(array('npersonalId' => $id));
	
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
	
		$em->clear();
		$em->close();
		return new JsonResponse($data);
	}
	
	public function getTablaOfertasAction(){
		$em = $this->getDoctrine()->getEntityManager();
			
		$ofertas = $this->getDoctrine()
		->getRepository('DicarsDataBundle:Oferta')
		->findAll();
	
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
		$em->clear();
		$em->close();
		return new JsonResponse(array('aaData' => $todo));
	}
	
	public function getTablaVentaProductoOfertaAction(){
		$em = $this->getDoctrine()->getEntityManager();
		
		$sql = "SELECT * from Ven_productosoferta";
		
		$smt = $em->getConnection()->prepare($sql);
		$smt->execute();
		
		$productos = $smt->fetchAll();
	
		$todo = array();
		foreach ($productos as $key => $producto){
			$todo[] = array(
					'id' => $producto['nProducto_id'] ,
					'desc' => $producto['cProductoDesc']." - ".$producto['cMarcaDesc']." - ".$producto['cProductoTalla'],
					'pcontado' => $producto['PrecioContado_Dscto'],
					'pcredito' => $producto['PrecioCredito_Dscto'],
					'codigo' => $producto['cProductoCodBarra'],
					'pcosto' => $producto['nProductoPCosto'],
					'stock' => $producto['nProductoStock'],
					'marcaId' => $producto['nProductoMarca'],
					'descoferta' => $producto['DescripcionOferta'],
					'categoriaId' => $producto['nCategoria_id'],
					'categoria' => $producto['cCategoriaNom'],
					'descuento' => $producto['nOfertaProductoPorc'] ,
					'ver_btn' => "<a class='btn btn-success btn-datos' href='#'><i class='icon-zoom-in icon-white'></i>Ver Datos</a>",
					'edit_btn' => "<a class='btn btn-info btn-editar' href='#'><i class='icon-edit icon-white'></i>Editar</a>",
					'elim_btn' => "<a class='btn btn-danger' href='#'><i class='icon-trash icon-white'></i>Eliminar</a>");
		}
		$em->clear();
		$em->close();
		return new JsonResponse(array('aaData' => $todo));
	}
	
	public function getTablaVentaProductoSinOfertaAction(){
		$em = $this->getDoctrine()->getEntityManager();
	
		$sql = "SELECT * from Ven_productossinoferta";
	
		$smt = $em->getConnection()->prepare($sql);
		$smt->execute();
	
		$productos = $smt->fetchAll();
	
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
		$em->clear();
		$em->close();
		return new JsonResponse(array('aaData' => $todo));
	}
	
	public function getTablaOfertaProductoByIdAction($idOferta){
		$em = $this->getDoctrine()->getEntityManager();
			
		$OfertasProductos = $this->getDoctrine()
		->getRepository('DicarsDataBundle:OfertaProducto')
		->findBy(array('noferta' => $idOferta ));
		
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
		$em->clear();
		$em->close();
		return new JsonResponse(array('aaData' => $todo));
	}
	
	public function getTablaCreditosByIdAction($idcliente){
		$em = $this->getDoctrine()->getEntityManager();
			
		$Ventas = $this->getDoctrine()
		->getRepository('DicarsDataBundle:VenVenta')
		->findBy(array('ncliente' => $idcliente ,
						'nventatippag' => 2
				));
		
		$pagado = null;
	
		$todo = array();
		foreach ($Ventas as $key => $Venta){
			
			$Credito = $this->getDoctrine()
			->getRepository('DicarsDataBundle:VenCredito')
			->findOneBy(array('nventa' => $Venta -> getNventaId()));
			
			if($Venta -> getNventasaldo() == 0)
				$pagado = "<span class='label label-success'>Pagada</span>";
			else
				$pagado = "<span class='label label-important'>Pendiente</span>";
			
			$todo[] = array(
					'idventa' => $Venta -> getNventaId(),
					'fecha_venta' => $Venta -> getCventafecreg() -> format('d/m/Y'),
					'pagado' => $pagado,
					'idcredito' => $Credito -> getNvencreditoId(),
					'montototal' => $Venta -> getNventatotapag(),
					'montopagado' => $Venta -> getNventatotamt() ,
					'cuotas' => $Credito -> getNvencreditoncuota(),
					'ver_pagar' => "<a class='btn btn-success btn-pagar' href='#'>Pagar Cuotas</a>",
					);
		}
		$em->clear();
		$em->close();
		return new JsonResponse(array('aaData' => $todo));
	}
	
	public function getTablaCuotasByIdAction($idcredito){
		$em = $this->getDoctrine()->getEntityManager();
			
		$Cronogramas = $this->getDoctrine()
		->getRepository('DicarsDataBundle:VenCronpago')
		->findBy(array('nvencredito' => $idcredito),array('ncronpagofecpago' => 'ASC'));
	
		$todo = array();
		foreach ($Cronogramas as $key => $Cronograma){
				
			$todo[] = array(
					'fecpago' => $Cronograma -> getNcronpagofecpago() -> format('d/m/Y'),
					'nrocuota' => $Cronograma -> getNcronpagonrocuota(),
					'monto' => $Cronograma -> getNcronpagomoncouapg(),
					'idcrono' => $Cronograma -> getNcronogramaId()
			);
		}
		$em->clear();
		$em->close();
		return new JsonResponse(array('aaData' => $todo));
	}
	
	public function getTablaClientesByZonaAction($idzona){		
		$em = $this->getDoctrine()->getEntityManager();
		
		$clientes = $this->getDoctrine()
		->getRepository('DicarsDataBundle:VenCliente')
		->findBy(array('nzona' => $idzona));
	
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
					'ocupacion' => $cliente -> getCclienteocup());
		}
		$em->clear();
		$em->close();
		return new JsonResponse(array('aaData' => $todo));
	}
	
	public function getTablaVentasAction($fecmin,$fecmax){
		$em = $this->getDoctrine()->getEntityManager();
		
		$fecmin = date_create_from_format('Y-m-d', $fecmin);
		$fecmax = date_create_from_format('Y-m-d', $fecmax);
		
		$VentasRepositore = $this->getDoctrine()
		->getRepository('DicarsDataBundle:VenVenta');
		
		$query = $VentasRepositore->createQueryBuilder('v')
		->where('v.cventafecreg > :fecmin')
		->andWhere('v.cventafecreg < :fecmax')
		->setParameter('fecmin', $fecmin)
		->setParameter('fecmax', $fecmax)
		->getQuery();
		
		$Ventas = $query->getResult();
	
		$todo = array();
		foreach ($Ventas as $key => $Venta){
			$VentaProductos = $this->getDoctrine()
			->getRepository('DicarsDataBundle:VenDetventa')
			->findBy(array('nventa' => $Venta -> getNventaId() ));
			
			$cantidad = 0;

			foreach ($VentaProductos as $key => $VentaProducto){
				$cantidad = $cantidad + 1;
			}
			
			/*
			anulada 0
			pendiente/deuda 1
			pagada/cancelada 2
			separada 3
			*/
			$elim = ''; //SOLO SE ANULAN LAS VENTAS AL CONTADO
			$edit = '';
			$estado = '';
			if($Venta -> getCventaest() == 0)
				$estado = "<span class='label'>Anulada</span>";
			else if ($Venta -> getCventaest() == 1)
				$estado = "<span class='label label-important'>Pendiente/Deuda</span>";
			else if ($Venta -> getCventaest() == 2)
				$estado = "<span class='label label-success'>Pagada/Cancelada</span>";
			else{
				$estado = "<span class='label label-warning'>Separada</span>";
				$edit = "<a id-data='".$Venta -> getNventaId()."' class='btn btn-info btn-editar' href='#'><i class='icon-edit icon-white'></i>Editar</a>";
			}
			
			$venta_trans = $this->getDoctrine()
			->getRepository('DicarsDataBundle:VenTransaccion')
			->findOneBy(array('nventa' => $Venta -> getNventaId()));
			
			$tipo_pago = $this->getDoctrine()
			->getRepository('DicarsDataBundle:Constante')
			->findOneBy(array('nconstanteId' => $Venta -> getNventatippag()));
			
			$tipo_moneda = $this->getDoctrine()
			->getRepository('DicarsDataBundle:VenTipomoneda')
			->findOneBy(array('ntipomoneda' => $Venta -> getNtipomoneda()));
			
			$local = $this->getDoctrine()
			->getRepository('DicarsDataBundle:Local')
			->findOneBy(array('nlocalId' => $Venta -> getNlocal()));
			
			$tipo_IGV = $this->getDoctrine()
			->getRepository('DicarsDataBundle:VenTipoigv')
			->findOneBy(array('ntipoigv' => $Venta -> getNtipoigv()));
			
			$todo[] = array(
					'id' => $Venta -> getNventaId(),
					'fecha_reg' => $Venta -> getCventafecreg() -> format('d/m/Y'),
					'cliente' => $Venta -> getNcliente() -> getCclientenom()." ".$Venta -> getNcliente() -> getCclienteape() ,
					'vendedor' => $venta_trans -> getNpersonal() -> getCpersonalnom()." ".$venta_trans -> getNpersonal() -> getCpersonalape(), 
					'tipo_pagoId' => $Venta -> getNventatippag(),
					'tipo_pago' => $tipo_pago -> getCconstantedesc(),
					'total' => $Venta -> getNventatotapag(), 
					'estadoId' => $Venta -> getCventaest(),
					'estado' => $estado,
					'tipo_monedaId' => $Venta -> getNtipomoneda(),
					'tipo_moneda' => $tipo_moneda -> getCtipomonedadesc(),
					'subtotal' => $Venta -> getNventasubtotal(),
					'descuento' => $Venta -> getNventadscto(),
					'observacion' => $Venta -> getCventaobsv(),
					'amortizado' => $Venta -> getNventatotamt(),
					'saldo' => $Venta -> getNventasaldo(),
					'localId' => $Venta -> getNlocal(),
					'local' => $local,
					'tipo_IGVId' => $Venta -> getNtipoigv(),
					'tipo_IGV' => $tipo_IGV -> getNtipoigvproc(),
					'cant_prod' => $cantidad,
					'ver_pagar' => "<a class='btn btn-success btn-pagar' href='#'><i class='icon-zoom-in icon-white'></i> Ver Creditos</a>",
					'ver_btn' => "<a class='btn btn-success btn-datos' href='#'><i class='icon-zoom-in icon-white'></i>Ver Datos</a>",
					'edit_btn' => $edit,
					'elim_btn' => "<a class='btn btn-danger btn-elim' href='#'><i class='icon-trash icon-white'></i>Anular</a>");
		}
		$em->clear();
		$em->close();
		return new JsonResponse(array('aaData' => $todo));
	}
	
	public function getTablaVentaProductosByIdAction($idventa){
		$em = $this->getDoctrine()->getEntityManager();
			
		$VentaProductos = $this->getDoctrine()
		->getRepository('DicarsDataBundle:VenDetventa')
		->findBy(array('nventa' => $idventa ));
	
		$todo = array();
		foreach ($VentaProductos as $key => $VentaProducto){
			$Producto = $VentaProducto -> getNproducto();
				
			$todo[] = array(
					'idproducto' => $Producto -> getNproductoId(),
					'productodesc' => $Producto -> getCproductodesc(),
					'cantidad' => $VentaProducto -> getNdetventacant() ,
					'precio'=> $VentaProducto -> getNdetventaprecunt(),
					'importe' => $VentaProducto -> getNdetventatot(),
					'elim_btn' => "<a class='btn btn-danger' href='#'><i class='icon-trash icon-white'></i>Eliminar</a>"
					);
		}
		$em->clear();
		$em->close();
		return new JsonResponse(array('aaData' => $todo));
	}
	
	public function getTablaDeudoresGenAction(){
		$em = $this->getDoctrine()->getEntityManager();
	
		$sql = "SELECT * FROM dicarsbd.ven_listaclientedeudores";
	
		$smt = $em->getConnection()->prepare($sql);
		$smt->execute();
	
		$deudores = $smt->fetchAll();
	
		$todo = array();
		foreach ($deudores as $key => $deudor){
			$todo[] = array(
					'idcliente' => $deudor['id'] ,
					'nombre' => $deudor['Cliente'] ,
					'dni' => $deudor['DNI'],
					'zona' => $deudor['Zona'],
					'direccion' => $deudor['Direccion'],
					'totalcredito' => $deudor['TotalCredito'],
					'totalpagorealizado' => $deudor['TotalPagoRealizado'],
					'saldo' => $deudor['Saldo'],
					'estado' => $deudor['Estado'],
					'responsable' => $deudor['Responsable']);
		}
		$em->clear();
		$em->close();
		return new JsonResponse(array('aaData' => $todo));
	}
	
	public function getTablaDeudoresDetAction(){
		$em = $this->getDoctrine()->getEntityManager();
	
		$sql = "SELECT * FROM dicarsbd.ven_listaclientedeudores_detallado";
	
		$smt = $em->getConnection()->prepare($sql);
		$smt->execute();
	
		$deudores = $smt->fetchAll();
	
		$todo = array();
		foreach ($deudores as $key => $deudor){
			$todo[] = array(
					'idcliente' => $deudor['id'] ,
					'nombre' => $deudor['Cliente'] ,
					'dni' => $deudor['DNI'],
					'zona' => $deudor['Zona'],
					'direccion' => $deudor['Direccion'],
					'fecha_venta' => $deudor['FecVenta'],
					'totalcredito' => $deudor['TotalCredito'],
					'totalpagorealizado' => $deudor['TotalPagoRealizado'],
					'fechafinal' => $deudor['FecFinalizacion'],
					'saldo' => $deudor['Saldo'],
					'estado' => $deudor['Estado'],
					'responsable' => $deudor['Responsable']);
		}
		$em->clear();
		$em->close();
		return new JsonResponse(array('aaData' => $todo));
	}
}
