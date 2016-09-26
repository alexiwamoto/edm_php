<?php
	
	if(isset($_POST['name']) && isset($_POST['lastname']) && isset($_POST['rbtype']) && isset($_POST['address']) && 
	   isset($_POST['rbchurch']) && isset($_POST['email1']) && isset($_POST['email2']) && isset($_POST['phone1']) && 
	   isset($_POST['phone2']) && isset($_POST['profession']) && isset($_POST['description']))
	{
		
		// include Database connection file 
		include("db_connection.php");

		// get values 		
		$name = $_POST['name'];
		$lastname = $_POST['lastname'];
		$type = $_POST['rbtype'];
		$address = $_POST['address'];
		$church = $_POST['rbchurch'];
		$email1 = $_POST['email1'];
		$email2 = $_POST['email2'];
		$phone1 = $_POST['phone1'];
		$phone2 = $_POST['phone2'];
		$profession = $_POST['profession'];
		$description = $_POST['description'];

		
		if($type == 1){
			$type = 'Autônomo';
		}elseif($type == 2){
			$type = 'Empresário';
		}else{
			$type = 'Freelancer';
		}

		if($church == 1){
			$church = 'Sede';
		}elseif($church == 2){
			$church = 'Zona Leste';
		}else{
			$church = 'Zona Sul';
		}

		$query = "INSERT INTO worker(name,lastname,type, address, church, email1, email2, phone1, phone2, profession, description) 
values('$name','$lastname','$type','$address','$church','$email1','$email2','$phone1','$phone2','$profession','$description')";
		if (!$result = mysqli_query($con, $query)) {
	        exit(mysqli_error($con));
	    }
	    echo "1 Record Added!";
	}
?>