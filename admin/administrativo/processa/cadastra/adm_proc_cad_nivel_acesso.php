<?php
	include_once("../../../conexao/conexao.php");
	$nome = mysqli_real_escape_string($conn, $_POST['nome']);
	
	if(isset($_POST['visualizar'])){
	$visualizar = $_POST['visualizar'];
	}else{
	$visualizar = "0";	
	}
	
	if(isset($_POST['gravar'])){
	$gravar = $_POST['gravar'];
	}else{
	$gravar = "0";	
	}
	
	if(isset($_POST['deletar'])){
	$deletar = $_POST['deletar'];
	}else{
	$deletar = "0";	
	}
	
	$result_niveis_acessos = "INSERT INTO niveis_acessos (nome, created, visualizar, gravar, deletar) VALUES ('$nome', NOW(), '$visualizar', '$gravar', '$deletar')";
	$resultado_niveis_acessos = mysqli_query($conn, $result_niveis_acessos);	
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
	</head>

	<body> <?php
		if(mysqli_affected_rows($conn) != 0){
			echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=../../../administrativo.php?link=6'>
				<script type=\"text/javascript\">
					alert(\"Cadastrado com Sucesso.\");
				</script>
			";	
		}else{
			echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=../../../administrativo.php?link=6'>
				<script type=\"text/javascript\">
					alert(\"Não foi cadastrado.\");
				</script>
			";	
		}?>
	</body>
</html>
<?php $conn->close(); ?>