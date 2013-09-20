<?php
	$nombrearchivo = $_POST['nombrearchivo'];
	$title = $_POST['title'];
	$table_resumen = $_POST['table_resumen'];
	$table_producto = $_POST['table_producto'];
	$table_total = $_POST['table_total'];
	
    header('Content-type: application/x-msdownload; charset=utf-16');
	header('Content-Disposition: attachment; filename='.$nombrearchivo.date("d-m-Y").'.xls');
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
	#resume, #total{
		border: #41719c 1px solid;
		border-radius: 10px;
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
		background: #e7e6e6;
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
	</head>
	<body>
		<div id="divh3">
			<h3><?php echo $title ?></h3>
		</div>
		<br>
		<?php echo $table_resumen ?><br>
		<?php echo $table_producto ?> <br>
		<?php echo $table_total ?>
	</body>
</html>
