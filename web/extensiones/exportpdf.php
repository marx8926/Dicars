<?php
	$title = $_POST['title'];
    $tabla = $_POST['content'];

    $content ="
<style type='text/Css'>
    table {
		border-collapse: collapse;
		border: 1px solid #000;
    	text-align: left;
    	width: 100%;
    	margin: 0 auto;
	}
	th, td {
		border: 1px solid #000;
	}
    th{
    		text-align: center;
    		font-weight: normal;
			color: #000;
			border-bottom: 1px dashed #000;
			padding: 12px 17px; /*12px 0 12px 0*/
    }
    td{
    		color: #000;
			padding: 7px 17px; /*7px 0 7px 7px*/
	}
    h1{
    		text-align: center;
    }
</style>
	
<page >
    		<h1> ".$title."</h1>
    		<table>
    		
    ".$tabla."
    		</table>
</page>
    ";



    require_once(dirname(__FILE__).'/html2pdf/html2pdf.class.php');
    $html2pdf = new HTML2PDF('P','A4','es');
    $html2pdf->pdf->SetDisplayMode('fullpage');
    $html2pdf->writeHTML($content);
    $html2pdf->Output('example.pdf');
?>