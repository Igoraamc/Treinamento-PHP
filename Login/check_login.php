<?php
	include("../config.php");

	$user = $_POST["username"];
	$pass = $_POST["senha"];

	$objResp = new \stdClass();

	$sql = "SELECT * FROM `usuario` WHERE `nome`='$user' AND `senha`='$pass'";

	if($result = mysqli_query($conn, $sql)){
	    if(mysqli_num_rows($result) == 1){
	        $objResp->message = "Login realizado com sucesso!";
	        $objResp->code = 200;

	        mysqli_free_result($result);
	    } else{
	        $objResp->message = "Este usuario não foi encontrado em nossa base de dados.";
	        $objResp->code = 500;
	    }
	} else{
	    $objResp->message = "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
	    $objResp->code = 404;
	}

	$respJSON = json_encode($objResp); 

	echo $respJSON;

	
?>