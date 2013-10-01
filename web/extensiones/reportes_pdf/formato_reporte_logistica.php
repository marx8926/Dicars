<?php
$nombrearchivo = $_POST['nombrearchivo'];
$title = $_POST['title'];
$table_resumen = $_POST['table_resumen'];
$table_producto = $_POST['table_producto'];
$table_total = $_POST['table_total'];

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
	sume, #total{
		border: #111 1px solid;
		padding: 10px;
	}
	#resume td.impar, .upbold{
		font-weight: bold; 
		text-transform: uppercase;
	}
	#tproductos{
		border-collapse: collapse;
		text-align: center;
	}
	#tproductos td.prodth{
		background: #111;
		color: #fff;
		text-transform: uppercase;
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
						<h3><?php echo $title ?></h3>
					</td>
				</tr>
				<tr>
					<td style="height: 20px;"></td>
				</tr>
			</table>
			<br>
			<?php echo $table_resumen ?><br>
			<?php echo $table_producto ?> <br>
			<?php echo $table_total ?>
		</div>
    </page>
    <?php 
    $content = ob_get_clean();


    require_once(dirname(__FILE__).'/../html2pdf/html2pdf.class.php');
    $html2pdf = new HTML2PDF('P','A4','es');
    $html2pdf->pdf->SetDisplayMode('fullpage');
    $html2pdf->writeHTML($content);
    $html2pdf->Output($nombrearchivo.date("d-m-Y").'.pdf');
?>