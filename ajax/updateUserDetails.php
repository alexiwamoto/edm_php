<?php
// include Database connection file
include("db_connection.php");
// check request
if(isset($_POST))
{
    // get values
    $id = $_POST['id'];
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

    $query = "UPDATE worker SET name = '$name', lastname = '$lastname', type = '$type', address = '$address', church = '$church', email1 = '$email1',
	email2 = '$email2', phone1 = '$phone1', phone2 = '$phone2', profession = '$profession', description = '$description' WHERE id = '$id'";
    if (!$result = mysqli_query($con, $query)) {
        exit(mysqli_error($con));
    }
}