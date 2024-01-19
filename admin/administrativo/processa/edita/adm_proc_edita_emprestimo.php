<?php
	include_once("../../../conexao/conexao.php");
	$id = mysqli_real_escape_string($conn, $_POST['id']);
	$tipo_emprestimo = mysqli_real_escape_string($conn, $_POST['tipo_emprestimo']);
	$data_emprestimo = mysqli_real_escape_string($conn, $_POST['data_emprestimo']);
	$valor = mysqli_real_escape_string($conn, $_POST['valor']);
	$numero_parcelamento = mysqli_real_escape_string($conn, $_POST['numero_parcelamento']);
	$id_funcionario = mysqli_real_escape_string($conn, $_POST['id_funcionario']);
	$status_emprestimo = mysqli_real_escape_string($conn, $_POST['status_emprestimo']);
	
	
	$result_categorias_produtos = "UPDATE emprestimos SET id_funcionario='$id_funcionario',tipo_emprestimo='$tipo_emprestimo',data_emprestimo='$data_emprestimo',numero_parcelamento='$numero_parcelamento',valor='$valor',status_emprestimo='$status_emprestimo' WHERE id = '$id'";
	
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
					alert(\"alterado com Sucesso.\");
				</script>
			";	
		}else{
			echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=../../../administrativo.php?link=56'>
				<script type=\"text/javascript\">
					alert(\"não foi alterado.\");
				</script>
			";	
		}?>
	</body>
</html>
<?php $conn->close(); ?>