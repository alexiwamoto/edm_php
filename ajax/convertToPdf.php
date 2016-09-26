<?php

include("db_connection.php");
define('MPDF_PATH', 'MPDF57/');		
include(MPDF_PATH.'mpdf.php');		
date_default_timezone_set('America/Sao_Paulo');

if(isset($_GET['id']) && isset($_GET['id']) != "")
{    
    $user_id = $_GET['id'];

    $query = "SELECT * FROM worker WHERE id = '$user_id'";
    if (!$result = mysqli_query($con, $query)) {
        exit(mysqli_error($con));
    }
    if(mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $name = $row['name'];
       		$lastname = $row['lastname'];
	        $type = $row['type'];
    	    $address = $row['address'];
			$church = $row['church'];
			$email1 = $row['email1'];
			$email2 = $row['email2'];
			$phone1 = $row['phone1'];
			$phone2 = $row['phone2'];
			$profession = $row['profession'];
			$description = $row['description'];
        }
    }
}

$html = '<div id="image"><img src="icones/logoback.png" alt="Logo" style="width:100px;height:100px;"></div>
		<br /> <br />
		<strong><p id="bold" style="text-align:center,font-size: 14px">Dados Pessoais: </p></strong>
		<hr />
		<b><p id="bold2" style="text-align:center,font-size: 13px">'.$name.' '.$lastname.'</p></b>
		<p style="text-align:center,font-size: 12px">E-mail: '.$email1.'</p>
		<p style="text-align:center,font-size: 12px">E-mail alternativo: '.$email2.'</p>
		<p style="text-align:center,font-size: 12px">Celular/Whatsapp: '.$phone1.'</p>
		<p style="text-align:center,font-size: 12px">Telefone: '.$phone2.'</p>
		<p style="text-align:center,font-size: 12px">Endereço: '.$address.'</p>
		<p style="text-align:center,font-size: 12px">Igreja: '.$church.'</p>
		<hr />
		<b><p id="bold">Dados Profissionais: </p></b>
		<p style="text-align:center,font-size: 12px">Profissão: '.$profession.'</p>
		<p style="text-align:center,font-size: 12px">Tipo: '.$type.'</p>
		<p style="text-align:center,font-size: 12px">Descrição: '.$description.'</p>';


		$stylesheet = file_get_contents('../css/stylesheet.css');
		$mpdf = new mPDF('utf-8', 'A4');
		$mpdf->SetDisplayMode('fullpage');		
		$mpdf->useOnlyCoreFonts = true;
		$mpdf->watermark_font = 'DejaVuSansCondensed';		
		$mpdf->showWatermarkText = true;
		$mpdf->SetWatermarkText('Escola de Ministérios');
		$mpdf->SetFooter('{DATE j/m/Y  H:i}||Pagina {PAGENO}/{nb}');
		$mpdf->WriteHTML($stylesheet,1);
		$mpdf->WriteHTML($html,2); 
		$mpdf->Output();		
		exit();
?>