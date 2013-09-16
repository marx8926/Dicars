<?php
$title = $_POST['title'];
$table_ingresos = $_POST['table_ingresos'];
$table_salidas = $_POST['table_salidas'];
$total = $_POST['total'];

header('Content-type: application/x-msdownload; charset=utf-16');
header('Content-Disposition: attachment; filename=reporte_excel.xls');
header('Pragma: no-cache');
header('Expires: 0');
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
	#divh3 , .title {
		background: #ff0;
		border-radius: 5px;
		text-align: center;
		text-transform: uppercase;
		width: 100%;
	}
	#tmovimiento{
		border-collapse: collapse;
		text-align: center;
	}
	#tmovimiento td.head{
		background: #e7e6e6;
		text-transform: uppercase;
	}
	#tmovimiento th, #tmovimiento td, #total td{
		border: black 1px solid;
	}
	#total td.izquierda{
		text-align: left;
		padding-left: 17px;
	}
	.upbold{
		text-align: right;
	}
	-->
	</style>
	</head>
	<body>
		Fecha Emision: <?php echo date('d/m/Y'); ?>
		<br>
		<div id="divh3">
			<h3><?php echo $title ?></h3>
		</div>
		<br>
		<table>
			<tr>
				<td  class="title">INGRESOS</td>
			</tr>
		</table>
		<?php echo $table_ingresos ?><br>
		<table>
			<tr>
				<td  class="title">SALIDAS</td>
			</tr>
		</table>
		<?php echo $table_salidas ?><br>
		<table id="total">
			<tr>
				<td style="width: 80%;" class="izquierda">Total</td>
				<td style="width: 20%;"><?php echo $table_total ?></td>
			</tr>
		</table>
		<br>
    </body>
    </html>