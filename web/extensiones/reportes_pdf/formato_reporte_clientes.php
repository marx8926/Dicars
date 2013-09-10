<?php
$title = $_POST['title'];
$table_clientes = $_POST['table_clientes'];

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
	#tclientes{
		border-collapse: collapse;
		text-align: center;
	}
	#tclientes td.head{
		background: #e7e6e6;
		text-transform: uppercase;
	}
	#tclientes th, #tclientes td{
		border: black 1px solid;
	}
	#tclientes td.izquierda{
		text-align: left;
		padding-left: 17px;
	}
	.upbold{
		text-align: right;
	}
	-->
	</style>
	<page>
		<div id="divh3">
			<h3><?php echo $title ?></h3>
		</div>
		<br>
		<?php echo $table_clientes ?><br>
		<br>
		Fecha Emision: <?php echo date('d/m/Y'); ?>
    </page>
    <?php 
    $content = ob_get_clean();

    require_once(dirname(__FILE__).'/../html2pdf/html2pdf.class.php');
    $html2pdf = new HTML2PDF('L','A4','es');
    $html2pdf->pdf->SetDisplayMode('fullpage');
    $html2pdf->writeHTML($content);
    $html2pdf->Output('example.pdf');
?>
