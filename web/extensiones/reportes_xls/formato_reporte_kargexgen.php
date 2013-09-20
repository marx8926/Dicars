<?php
$tkardexgen = $_POST['table_kardexgen'];
$titulo = $_POST['titulo'];

$filename = 'reporte_kardex_general_'.date("d-m-Y");
	
    header('Content-type: application/x-msdownload; charset=utf-16');
	header('Content-Disposition: attachment; filename='.$filename.'.xls');
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
	</head>
	<body>
		<div id="divh3">
			<h3><?php echo $titulo?></h3>
		</div>
		<br>
		<?php echo $tkardexgen ?>
	</body>
</html>