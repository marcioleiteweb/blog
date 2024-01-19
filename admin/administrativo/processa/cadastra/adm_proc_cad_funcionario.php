<?php
	include_once("../../../conexao/conexao.php");
	$nome_completo = mysqli_real_escape_string($conn, $_POST['nome_completo']);
	$rg = mysqli_real_escape_string($conn, $_POST['rg']);
	$cpf = mysqli_real_escape_string($conn, $_POST['cpf']);
	$data_de_nascimento = mysqli_real_escape_string($conn, $_POST['data_de_nascimento']);
	$cargo = mysqli_real_escape_string($conn, $_POST['cargo']);
	$observacoes = mysqli_real_escape_string($conn, $_POST['observacoes']);
	
	$result_categorias_produtos = "INSERT INTO funcionarios (nome_completo, rg, cpf, data_de_nascimento, cargo, observacoes) VALUES ('$nome_completo','$rg','$cpf','$data_de_nascimento','$cargo','$observacoes')";
	$resultado_categorias_produtos = mysqli_query($conn, $result_categorias_produtos);	
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
	</head>

	<body> <?php
		if(mysqli_affected_rows($conn) != 0){
			echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=../../../administrativo.php?link=52'>
				<script type=\"text/javascript\">
					alert(\"cadastrada com Sucesso.\");
				</script>
			";	
		}else{
			echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=../../../administrativo.php?link=52'>
				<script type=\"text/javascript\">
					alert(\"não foi cadastrada.\");
				</script>
			";	
		}?>
	</body>
</html>
<?php $conn->close(); ?>