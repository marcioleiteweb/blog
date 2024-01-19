<?php
	include_once("../../conexao/conexao.php");
	$id = mysqli_real_escape_string($conn, $_POST['id']);
	$nome = mysqli_real_escape_string($conn, $_POST['nome']);
	
	$result_situacoes_produtos = "UPDATE situacoes_produtos SET nome='$nome', modified =  NOW() WHERE id = '$id'";
	
	$resultado_situacoes_produtos = mysqli_query($conn, $result_situacoes_produtos);	
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
	</head>

	<body> <?php
		if(mysqli_affected_rows($conn) != 0){
			echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/loja/adm/administrativo.php?link=22'>
				<script type=\"text/javascript\">
					alert(\"Situação do Produto alterado com Sucesso.\");
				</script>
			";	
		}else{
			echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/loja/adm/administrativo.php?link=22'>
				<script type=\"text/javascript\">
					alert(\"Situação do Produto não foi alterado com Sucesso.\");
				</script>
			";	
		}?>
	</body>
</html>
<?php $conn->close(); ?>