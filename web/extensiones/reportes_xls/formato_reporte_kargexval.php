<?php
$tkardexgen = $_POST['table_kardexgenval'];
$local = $_POST['local'];

$filename = 'reporte_kardex_valorizado_'.date("d-m-Y");
	
    header('Content-type: application/x-msdownload; charset=utf-16');
	header('Content-Disposition: attachment; filename='.$filename.'.xls');
	header('Pragma: no-cache');
	header('Expires: 0');
	
$objkardex = json_decode($tkardexgen);
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
			<h3>REGISTRO DE INVENTARIO PERMANENTE VALORIZADO - DETALLE DEL INVENTARIO VALORIZADO <?php echo date("d-m-Y")?></h3>
		</div>
		<br>
		<?php
		
		$id = -1;
		
		$totalentcant = 0;
		$totalentcosttotal = 0;
		
		$totalsalcant = 0;
		$totalsalcosttotal = 0;

		foreach ($objkardex as $key => $producto){
			if ($producto->{'id'} != $id) {
				if ($id != -1) { /* FIN DE LA TABLA */
					echo "	<tr>
								<td colspan='2'>TOTAL:</td>
								<td>$totalentcant</td>
								<td></td>
								<td>$totalentcosttotal</td>
								<td>$totalsalcant</td>
								<td></td>
								<td>$totalsalcosttotal</td>
								<td></td>
								<td></td>
								<td></td>
							</tr>
						</table>
   						<br>
   					";
					$totalentcant = 0;
					$totalentcosttotal = 0;
					
					$totalsalcant = 0;
					$totalsalcosttotal = 0;
				}
				$id = $producto->{'id'};
				/* TABLA DE RESUMEN, INICIO DE TABLA PRODUCTOS (CABECERA Y PRIMER TR) */
				echo "	<table id='resume'>
							<tr>
								<td class='impar'>PERÍODO:</td>
								<td>".$producto->{'Mes'}." - ".$producto->{'Anio'}."</td>
							</tr>
							<tr>
								<td class='impar'>ESTABLECIMIENTO:</td>
								<td>".$local."</td>
							</tr>
							<tr>
								<td class='impar'>CÓDIGO:</td>
								<td>".(string)$producto->{'codigoBarra'}."-</td>
							</tr>
							<tr>
								<td class='impar'>DESCRIPCIÓN:</td>
								<td>".$producto->{'Producto'}."</td>
							</tr>
							<tr> 
								<td class='impar'>MÉTODO DE EVALUACIÓN:</td>
								<td>PROMEDIO PONDERADO</td>
							</tr>
						</table>
						<br>
						
						<table id='tproductos'>
							<tr>
								<th colspan='2'>COMPROBANTE DE PAGO<br>DOCUMENTO INTERIOR O SIMILAR</th>
								<th colspan='3'>ENTRADAS</th>
								<th colspan='3'>SALIDAS</th>
								<th colspan='3'>SALDO FINAL</th>
							</tr>
							<tr>
								<th>FECHA</th>
								<th>DOCUMENTO</th>
								<th>CANTIDAD</th>
								<th>COSTO UNITARIO</th>
								<th>COSTO TOTAL</th>
								<th>CANTIDAD</th>
								<th>COSTO UNITARIO</th>
								<th>COSTO TOTAL</th>
								<th>CANTIDAD</th>
								<th>COSTO UNITARIO</th>
								<th>COSTO TOTAL</th>
							</tr>
							<tr>
								<td>".$producto->{'Mes'}." - ".$producto->{'Anio'}."</td>
								<td>".$producto->{'Documento'}."</td>
				";
				if ($producto->{'TipoIngreso'} == 'Ingreso') {
					echo "	<td>".$producto->{'Cantidad'}."</td>
							<td>".$producto->{'PrecUnit'}."</td>
							<td>".$producto->{'PrecTot'}."</td>
							<td></td>
							<td></td>
							<td></td>";
					$totalentcant = $totalentcant + $producto->{'Cantidad'};
					$totalentcosttotal = $totalentcosttotal + $producto->{'PrecTot'};
				}
				else if ($producto->{'TipoIngreso'} == 'Salida') {
					echo "	<td></td>
							<td></td>
							<td></td>
							<td>".$producto->{'Cantidad'}."</td>
							<td>".$producto->{'PrecUnit'}."</td>
							<td>".$producto->{'PrecTot'}."</td>";
					$totalsalcant = $totalsalcant + $producto->{'Cantidad'};
					$totalsalcosttotal = $totalsalcosttotal + $producto->{'PrecTot'};
				}
				else{
					echo "	<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>";
				}
				echo "<td>".$producto->{'Cantidad'}."</td>
					<td>".$producto->{'PrecUnit'}."</td>
	   				<td>".$producto->{'PrecTot'}."</td>
				</tr>
				";
			}
			else{
				echo "<tr>
							<td>".$producto->{'Mes'}." ".$producto->{'Anio'}."</td>
							<td>".$producto->{'Documento'}."</td>
				";
				if ($producto->{'TipoIngreso'} == 'Ingreso') {
					echo "	<td>".$producto->{'Cantidad'}."</td>
							<td>".$producto->{'PrecUnit'}."</td>
							<td>".$producto->{'PrecTot'}."</td>
							<td></td>
							<td></td>
							<td></td>";
					$totalentcant = $totalentcant + $producto->{'Cantidad'};
					$totalentcosttotal = $totalentcosttotal + $producto->{'PrecTot'};
				}
				else if ($producto->{'TipoIngreso'} == 'Salida') {
					echo "	<td></td>
							<td></td>
							<td></td>
							<td>".$producto->{'Cantidad'}."</td>
							<td>".$producto->{'PrecUnit'}."</td>
							<td>".$producto->{'PrecTot'}."</td>";
					$totalsalcant = $totalsalcant + $producto->{'Cantidad'};
					$totalsalcosttotal = $totalsalcosttotal + $producto->{'PrecTot'};
				}
				echo "<td>".$producto->{'Cantidad'}."</td>
					<td>".$producto->{'PrecUnit'}."</td>
	   				<td>".$producto->{'PrecTot'}."</td>
				</tr>
				";
			}
		}
		
		echo "<tr>
				<td colspan='2'>TOTAL:</td>
				<td>$totalentcant</td>
				<td></td>
				<td>$totalentcosttotal</td>
				<td>$totalsalcant</td>
				<td></td>
				<td>$totalsalcosttotal</td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
		</table>";
		?>		
	</body>
</html>