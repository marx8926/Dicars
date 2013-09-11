<?php
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
		<div id="divh3">
			<h3>REPORTE DE CRONOGRAMA DE PAGO</h3>
		</div>
		<br>
		<?php echo $tresumen ?><br>
		<p>DETALLE DE CONSUMO DE PRODUCTOS</p><br>
		<?php echo $tdetalle ?><br>
		<p>DETALLE DE PAGOS</p><br>
		<?php echo $tcronograma ?>
    </page>
    <?php 
    $content = ob_get_clean();


    require_once(dirname(__FILE__).'/../html2pdf/html2pdf.class.php');
    $html2pdf = new HTML2PDF('P','A4','es');
    $html2pdf->pdf->SetDisplayMode('fullpage');
    $html2pdf->writeHTML($content);
    $html2pdf->Output('example.pdf');
?>