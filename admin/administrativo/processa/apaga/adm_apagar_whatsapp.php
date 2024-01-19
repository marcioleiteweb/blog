<?php
	include_once("../../../conexao/conexao.php");
	$id = $_GET['id'];
	
	$result_categorias_produtos = "DELETE FROM whatsapp WHERE id = '$id'";
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
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=../../../administrativo.php?link=68'>
				<script type=\"text/javascript\">
					alert(\"Apagado, muito bem.\");
				</script>
			";	
		}else{
			echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=../../../administrativo.php?link=68'>
				<script type=\"text/javascript\">
					alert(\"Opa, algo deu errado.\");
				</script>
			";	
		}?>
	</body>
</html>
<?php $conn->close(); ?>