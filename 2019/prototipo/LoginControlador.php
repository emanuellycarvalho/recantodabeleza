<?php

	if(!isset($_SESSION)) { 
		session_start(); 
	} 

	$operacao = $_GET["operacao"];

	$_SESSION["teste"] = false;
	$_SESSION["status"] = "";


	switch($operacao) 
	{
        case 'autenticar':

			$email = $_POST["email"];
			$senha = $_POST["senha"];  

			if( (($email == 'secretaria@secretaria') && ($senha=='123456')) ){
				$_SESSION["teste"]=true;
				$_SESSION["status"] = "admin";

				echo "<script>location.href='HomeFuncionario.php';</script>"; 
			}      

			if((($email == 'cliente@cliente') && ($senha=='123456'))) {
				$_SESSION["teste"]=true;	
				$_SESSION["status"] = "cliente";
							
				echo "<script>location.href='MinhaConta.php';</script>"; 
			}else{
				echo "<script>alert('Usuário ou senha inválido!'); location.href='Login.php';</script>"; 			
			}

        	break; 

        case 'encerrar':

			session_unset();	
			session_destroy();	

			$_SESSION["status"] = "";	
			header('Location: Login.php');	

        	break;         	

        	          	
	}
			
?>