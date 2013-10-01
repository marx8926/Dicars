<?php
$nombrearchivo = $_POST['nombrearchivo'];
$tdetalle = $_POST['tdetalle'];
$tcronograma = $_POST['tcronograma'];
$tresumen = $_POST['tresumen'];

ob_start();
?>
    
    <style type="text/css">
	<!--
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
		background: #111;
		color: #fff;
		text-transform: uppercase;
	}
	#tdetalle th, #tdetalle td, #tcronograma th, #tcronograma td{
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
						<h3>REPORTE DE CRONOGRAMA DE PAGO</h3>
					</td>
				</tr>
				<tr>
					<td style="height: 20px;"></td>
				</tr>
			</table>
			<br>
			<?php echo $tresumen ?><br>
			<p>DETALLE DE CONSUMO DE PRODUCTOS</p><br>
			<?php echo $tdetalle ?><br>
			<p>DETALLE DE PAGOS</p><br>
			<?php echo $tcronograma ?>
		</div>
    </page>
    <?php 
    $content = ob_get_clean();


    require_once(dirname(__FILE__).'/../html2pdf/html2pdf.class.php');
    $html2pdf = new HTML2PDF('P','A4','es');
    $html2pdf->pdf->SetDisplayMode('fullpage');
    $html2pdf->writeHTML($content);
    $html2pdf->Output('creditos_de_'.$nombrearchivo."_".date("d-m-Y").'.pdf');
?>