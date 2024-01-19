<?php
	include_once("../../../conexao/conexao.php");
	$dono_whatsapp = mysqli_real_escape_string($conn, $_POST['dono_whatsapp']);
	$numero_whatsapp = mysqli_real_escape_string($conn, $_POST['numero_whatsapp']);
	
	$result_categorias_produtos = "INSERT INTO whatsapp (dono_whatsapp, numero_whatsapp) VALUES ('$dono_whatsapp', '$numero_whatsapp')";
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
					alert(\"cadastrada com Sucesso.\");
				</script>
			";	
		}else{
			echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=../../../administrativo.php?link=68'>
				<script type=\"text/javascript\">
					alert(\"não foi cadastrada.\");
				</script>
			";	
		}?>
	</body>
</html>
<?php $conn->close(); ?>