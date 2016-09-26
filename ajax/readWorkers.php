<?php
// include Database connection file
include("db_connection.php");

// check request
if(isset($_GET['profession']) && isset($_GET['profession']) != "")
{
    // get User ID
    $user_profession = $_GET['profession'];

    // Get User Details
    
	
	$data = '<table class="table table-bordered table-striped">
						<tr>
							<th>No.</th>
							<th>Nome</th>
							<th>Sobrenome</th>
							<th>Tipo de Prestador</th>
							<th>Profissão</th>
							<th>E-mail</th>
							<th>Telefone</th>
							<th>Gerar Pdf</th>							
						</tr>';

	$query = "SELECT * FROM worker WHERE LOWER(profession) = '$user_profession'";

	if (!$result = mysqli_query($con, $query)) {
        exit(mysqli_error($con));
    }

    // if query results contains rows then featch those rows 
    if(mysqli_num_rows($result) > 0)
    {
    	$number = 1;
    	while($row = mysqli_fetch_assoc($result))
    	{
    		$data .= '<tr>
				<td>'.$number.'</td>
				<td>'.$row['name'].'</td>
				<td>'.$row['lastname'].'</td>
				<td>'.$row['type'].'</td>
				<td>'.$row['profession'].'</td>
				<td>'.$row['email1'].'</td>
				<td>'.$row['phone1'].'</td>				
				<td>
					<button onclick="toPdf('.$row['id'].')" class="btn btn-warning">Gerar Pdf</button>
				</td>
    		</tr>';
    		$number++;
    	}
    }
    else
    {
    	// records now found 
    	$data .= '<tr><td colspan="6">Records not found!</td></tr>';
    }

    $data .= '</table>';

    echo $data;
}