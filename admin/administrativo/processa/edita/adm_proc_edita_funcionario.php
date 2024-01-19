<?php
	include_once("../../../conexao/conexao.php");
	$id = mysqli_real_escape_string($conn, $_POST['id']);
	$nome_completo = mysqli_real_escape_string($conn, $_POST['nome_completo']);
	$rg = mysqli_real_escape_string($conn, $_POST['rg']);
	$cpf = mysqli_real_escape_string($conn, $_POST['cpf']);
	$data_de_nascimento = mysqli_real_escape_string($conn, $_POST['data_de_nascimento']);
	$cargo = mysqli_real_escape_string($conn, $_POST['cargo']);
	$observacoes = mysqli_real_escape_string($conn, $_POST['observacoes']);
	
	$result_categorias_produtos = "UPDATE funcionarios SET nome_completo='$nome_completo', rg='$rg', cpf='$cpf', data_de_nascimento='$data_de_nascimento', cargo='$cargo', observacoes='$observacoes' WHERE id = '$id'";
	
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
					alert(\"alterado com Sucesso.\");
				</script>
			";	
		}else{
			echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=../../../administrativo.php?link=52'>
				<script type=\"text/javascript\">
					alert(\"não foi alterado.\");
				</script>
			";	
		}?>
	</body>
</html>
<?php $conn->close(); ?>