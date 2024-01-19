<?php
	include_once("../../../conexao/conexao.php");
	$id = mysqli_real_escape_string($conn, $_POST['id']);
	$titulo = mysqli_real_escape_string($conn, $_POST['titulo']);
	$texto = mysqli_real_escape_string($conn, $_POST['texto']);
	
	$result_categorias_produtos = "UPDATE servicos SET titulo='$titulo', texto='$texto' WHERE id = '$id'";
	
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
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=../../../administrativo.php?link=14'>
				<script type=\"text/javascript\">
					alert(\"alterado com Sucesso.\");
				</script>
			";	
		}else{
			echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=../../../administrativo.php?link=14'>
				<script type=\"text/javascript\">
					alert(\"não foi alterado.\");
				</script>
			";	
		}?>
	</body>
</html>
<?php $conn->close(); ?>