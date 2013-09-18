<?php
	$tablacuadrecaja = $_POST['table_cuadrecaja'];

    header('Content-type: application/x-msdownload; charset=utf-16');
	header('Content-Disposition: attachment; filename=reporte_cuadre_caja.xls');
	header('Pragma: no-cache');
	header('Expires: 0');
	
	$objcuadrecaja = json_decode($tablacuadrecaja);
	$ventacontref = 0;
	$ventacredref = 0;
	$ventasepref = 0;
	$totalref = 0;
	
	$ventaconting = 0;
	$ventacreding = 0;
	$ventaseping = 0;
	$ventacuotaing = 0;
	$depositoing = 0;
	$totaling = 0;
	
	$retiro = 0;
	
	$totalcaja = 0;
	
	foreach ($objcuadrecaja as $key => $row){
		if ($row -> {'Tipo'} == 'Credito') {
			$ventacredref = $ventacredref + $row -> {'Referencia'};
			$ventacreding = $ventacreding + $row -> {'PagoCredito'};
			$ventacuotaing = $ventacuotaing + $row -> {'PagoCuota'};
		}
		else if ($row -> {'Tipo'} == 'Contado') {
			$ventacontref = $ventacontref + $row -> {'Referencia'};
			$ventaconting = $ventaconting + $row -> {'PagoContado'};
		}
		else if ($row -> {'Tipo'} == 'Separacion') {
			$ventasepref = $ventasepref + $row -> {'Referencia'};
			$ventaseping = $ventaseping + $row -> {'PagoSeparacion'};
		}
		else if ($row -> {'Tipo'} == 'Deposito') {
			$depositoing = $depositoing + $row -> {'Referencia'};
		}
		else if ($row -> {'Tipo'} == 'Retiro') {
			$retiro = $retiro + $row -> {'Referencia'};
		}
	}
	
	$totalref = $ventacontref + $ventacredref + $ventasepref;
	$totaling = $ventaconting + $ventacreding + $ventaseping + $ventacuotaing + $depositoing;
	
	$totalcaja = $totaling - $retiro;
	
?>
<html>
	<head>
	<meta charset="utf-8">
    <style type="text/css">
	<!--
	table{	
		width: 100%;
	}
	th{
		background: #e7e6e6;
	}
	#divh3{
		background: #ff0;
		border-radius: 5px;
		text-align: center;
		text-transform: uppercase;
		width: 100%;
	}
	#resume, #total{
		border: #41719c 1px solid;
		border-radius: 10px;
		padding: 10px;
	}
	#resume td.impar, .upbold{
		font-weight: bold; 
		text-transform: uppercase;
	}
	#tdetalle, #tcronograma{
		border-collapse: collapse;
		text-align: center;
	}
	#tdetalle td.prodth, #tcronograma td.prodth{
		background: #e7e6e6;
		text-transform: uppercase;
	}
	#tdetalle th, #tdetalle td, #tcronograma th, #tcronograma td{
		border: black 1px solid;
	}
	#tproductos{
		border-collapse: collapse;
		text-align: center;
	}
	#tproductos th, #tproductos td{
		border: black 1px solid;
	}
	#tproductos td.izquierda{
		text-align: left;
		padding-left: 17px;
	}
	#total td.verde{
		padding-left: 17px;
		font-weight: bold;
		text-align: center;
	}
	.upbold{
		text-align: right;
	}
	-->
	</style>
	</head>
	<body>
		<div id="divh3">
			<h3>CUADRE DE CAJA</h3>
		</div>
		<br>
		<p><strong>REFERENCIA</strong></p>
		<table>
			<tr>
				<td></td>
				<td>VENTAS POR CONTADO</td>
				<td><?php echo $ventacontref ?></td>
			</tr>
			<tr>
				<td></td>
				<td>VENTAS POR CRÉDITO</td>
				<td><?php echo $ventacredref ?></td>
			</tr>
			<tr>
				<td></td>
				<td>SEPARACIÓN DE VENTAS</td>
				<td><?php echo $ventasepref ?></td>
			</tr>
			<tr>
				<td></td>
				<td></td>
				<td><?php echo $totalref ?></td>
			</tr>
		</table>
		<p><strong>INGRESO</strong></p>
		<table>
			<tr>
				<td></td>
				<td>VENTAS POR CONTADO</td>
				<td><?php echo $ventaconting ?></td>
			</tr>
			<tr>
				<td></td>
				<td>VENTAS POR CRÉDITO</td>
				<td><?php echo $ventacreding ?></td>
			</tr>
			<tr>
				<td></td>
				<td>SEPARACIÓN DE VENTAS</td>
				<td><?php echo $ventaseping ?></td>
			</tr>
			<tr>
				<td></td>
				<td></td>
			</tr>
			<tr>
				<td></td>
				<td>COBRO POR CUOTAS</td>
				<td><?php echo $ventacuotaing ?></td>
			</tr>
			<tr>
				<td></td>
				<td>DEPÓSITO</td>
				<td><?php echo $depositoing ?></td>
			</tr>
			<tr>
				<td></td>
				<td></td>
				<td><?php echo $totaling ?></td>
			</tr>
		</table>
		<p><strong>SALIDA</strong></p>
		<table>
			<tr>
				<td></td>
				<td>RETIRO</td>
				<td><?php echo $retiro ?></td>
			</tr>
			<tr>
				<td></td>
				<td></td>
			</tr>
			<tr>
				<td><strong>TOTAL DE CAJA</strong></td>
				<td></td>
				<td><strong><?php echo $totalcaja ?></strong></td>
			</tr>
		</table>
	</body>
</html>