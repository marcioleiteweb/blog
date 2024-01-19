<?php
	include_once("../../../conexao/conexao.php");
	$tipo_emprestimo = mysqli_real_escape_string($conn, $_POST['tipo_emprestimo']);
	$data_emprestimo = mysqli_real_escape_string($conn, $_POST['data_emprestimo']);
	$valor = mysqli_real_escape_string($conn, $_POST['valor']);
	$numero_parcelamento = mysqli_real_escape_string($conn, $_POST['numero_parcelamento']);
	$id_funcionario = mysqli_real_escape_string($conn, $_POST['id_funcionario']);
	$status_emprestimo = mysqli_real_escape_string($conn, $_POST['status_emprestimo']);
	
	$result_categorias_produtos = "INSERT INTO emprestimos (id_funcionario, tipo_emprestimo, data_emprestimo, numero_parcelamento, valor, status_emprestimo) VALUES ('$id_funcionario','$tipo_emprestimo','$data_emprestimo','$numero_parcelamento','$valor','$status_emprestimo')";
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
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=../../../administrativo.php?link=56'>
				<script type=\"text/javascript\">
					alert(\"cadastrada com Sucesso.\");
				</script>
			";	
		}else{
			echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=../../../administrativo.php?link=56'>
				<script type=\"text/javascript\">
					alert(\"não foi cadastrada.\");
				</script>
			";	
		}?>
	</body>
</html>
<?php $conn->close(); ?>