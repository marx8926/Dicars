<?php
$title = $_POST['title'];
$table_ventas = $_POST['table_venta'];

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
	#divh3{
		background: #ff0;
		border-radius: 5px;
		text-align: center;
		text-transform: uppercase;
		width: 100%;
	}
	#tventas{
		border-collapse: collapse;
		text-align: center;
	}
	#tventas td.head{
		background: #e7e6e6;
		text-transform: uppercase;
	}
	#tventas th, #tventas td{
		border: black 1px solid;
	}
	#tventas td.izquierda{
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
		<div id="divh3">
			<h3><?php echo $title ?></h3>
		</div>
		<br>
		<?php echo $table_ventas ?><br>
		<br>
		Fecha Emision: <?php echo date('d/m/Y'); ?>
    </body>
    </html>