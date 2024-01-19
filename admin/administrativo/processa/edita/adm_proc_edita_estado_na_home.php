<?php
	include_once("../../../conexao/conexao.php");
	
	$id_estados = mysqli_real_escape_string($conn, $_POST['id_estados']);
	
	//Buscar os dados referente ao usuario situado neste id
	$result_categorias_produtos = "SELECT * FROM estados WHERE id = '$id_estados' LIMIT 1";
	$resultado_categorias_produtos = mysqli_query($conn, $result_categorias_produtos);
	$row_categorias_produtos = mysqli_fetch_assoc($resultado_categorias_produtos);	
	
	$nome_estado  =  $row_categorias_produtos['nome'];
	
	$result_categorias_estado_home = "UPDATE estado_na_home SET id_estados='$id_estados', nome_estado='$nome_estado'";
	
	$resultado_categorias_estado_home = mysqli_query($conn, $result_categorias_estado_home);	
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
	</head>

	<body> <?php
		if(mysqli_affected_rows($conn) != 0){
			echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=../../../administrativo.php?link=31'>
				<script type=\"text/javascript\">
					alert(\"alterado com Sucesso.\");
				</script>
			";	
		}else{
			echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=../../../administrativo.php?link=31'>
				<script type=\"text/javascript\">
					alert(\"não foi alterado.\");
				</script>
			";	
		}?>
	</body>
</html>
<?php $conn->close(); ?>