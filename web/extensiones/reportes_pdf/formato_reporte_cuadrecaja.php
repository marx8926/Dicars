<?php
	$tablacuadrecaja = $_POST['table_cuadrecaja'];

    ob_start();
    
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
    <style type="text/css">
	table{	
		width: 100%;
	}
	th{
		background: #e7e6e6;
	}
	#header{
		width: 100%;
	}
	#logo{
		width:20%;
	}
	#divh3{
		background: #111;
		color: #fff;
		padding-right: 15px;
		text-align: right;
		text-transform: uppercase;
		width: 73%;
	}
	#resume, #total{
		border: #111 1px solid;
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
	</style>
	<page>
		<div style="border: 2px solid #000;padding:5px; height: 98%; width: 98.5%;">
			<table id="header">
				<tr>
					<td id="logo" rowspan="3">
						<img alt="" src="../../img/logo-dicars-200-100.png">
					</td>
				</tr>
				<tr>
					<td style="height: 20px;"></td>
				</tr>
				<tr>
					<td></td>
					<td id="divh3">
						<h3>CUADRE DE CAJA</h3>
					</td>
				</tr>
				<tr>
					<td style="height: 20px;"></td>
				</tr>
			</table>
		<br>
		<p><strong>REFERENCIA</strong></p>
		<table id="tproductos">
			<tr>
				<td style="width:70%;">VENTAS POR CONTADO</td>
				<td style="width:30%;"><?php echo $ventacontref ?></td>
			</tr>
			<tr>
				<td>VENTAS POR CRÉDITO</td>
				<td><?php echo $ventacredref ?></td>
			</tr>
			<tr>
				<td>SEPARACIÓN DE VENTAS</td>
				<td><?php echo $ventasepref ?></td>
			</tr>
			<tr>
				<td></td>
				<td><?php echo $totalref ?></td>
			</tr>
		</table>
		<p><strong>INGRESO</strong></p>
		<table id="tproductos">
			<tr>
				<td style="width:70%;">VENTAS POR CONTADO</td>
				<td style="width:30%;"><?php echo $ventaconting ?></td>
			</tr>
			<tr>
				<td>VENTAS POR CRÉDITO</td>
				<td><?php echo $ventacreding ?></td>
			</tr>
			<tr>
				<td>SEPARACIÓN DE VENTAS</td>
				<td><?php echo $ventaseping ?></td>
			</tr>
			<tr>
				<td></td>
				<td></td>
			</tr>
			<tr>
				<td>COBRO POR CUOTAS</td>
				<td><?php echo $ventacuotaing ?></td>
			</tr>
			<tr>
				<td>DEPÓSITO</td>
				<td><?php echo $depositoing ?></td>
			</tr>
			<tr>
				<td></td>
				<td><?php echo $totaling ?></td>
			</tr>
		</table>
		<p><strong>SALIDA</strong></p>
		<table id="tproductos">
			<tr>
				<td style="width:70%;">RETIRO</td>
				<td style="width:30%;"><?php echo $retiro ?></td>
			</tr>
		</table>
		<br>
		<table id="total">
			<tr>
				<td style="width:70%;" class="upbold"><strong>TOTAL DE CAJA</strong></td>
				<td style="width:30%;" class="verde"><strong><?php echo $totalcaja ?></strong></td>
			</tr>
		</table>
		</div>
	</page>
<?php 
    $content = ob_get_clean();


    require_once(dirname(__FILE__).'/../html2pdf/html2pdf.class.php');
    $html2pdf = new HTML2PDF('P','A4','es');
    $html2pdf->pdf->SetDisplayMode('fullpage');
    $html2pdf->writeHTML($content);
    $html2pdf->Output('reporte_cuadre_caja.pdf');
?>