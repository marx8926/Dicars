<?php
$title = $_POST['title'];
$table_clientes = $_POST['table_clientes'];

header('Content-type: application/x-msdownload; charset=utf-16');
header('Content-Disposition: attachment; filename=reporte_clientes_'.date("d-m-Y").'.xls');
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
		background: #e7e6e6;
		text-align: center;
		width: 100%;
	}
	#tclientes{
		border-collapse: collapse;
		text-align: center;
	}
	#tclientes td.head{
		background: #e7e6e6;
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
	</head>
	<body>
		<div id="divh3">
			<h3><?php echo $title ?></h3>
		</div>
		<br>
		<?php echo $table_clientes ?><br>
		<br>
		Fecha Emision: <?php echo date('d/m/Y'); ?>
    </body>
    </html>