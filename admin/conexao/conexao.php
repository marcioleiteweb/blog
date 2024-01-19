<?php
	/* aqui ficam os dados de conexao com seu sistema*/
	
	$servidor = "localhost";// coloque aqui o servidor MYSQL do seu servidor;
	$usuario = "root";      // coloque aqui o usuario do banco criado;
	$senha = "";			// coloque aqui a senha do banco criado;
	$dbname = "blog_babi";// coloque aqui o nome do banco criado;
	
	
	//Criar a conexão
	$conn = mysqli_connect($servidor, $usuario, $senha, $dbname);
	if(!$conn){
		die("Falha na conexao: " . mysqli_connect_error());
	}else{
		//echo "Conexao realizada com sucesso";
	}
?>
