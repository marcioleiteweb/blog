<?php
	include_once("../../conexao/conexao.php");
	$id = mysqli_real_escape_string($conn, $_POST['id']);
	$nome = mysqli_real_escape_string($conn, $_POST['nome']);
	
	$result_situacoes_vendas = "UPDATE situacoes_vendas SET nome='$nome', modified =  NOW() WHERE id = '$id'";
	
	$resultado_situacoes_vendas = mysqli_query($conn, $result_situacoes_vendas);	
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
	</head>

	<body> <?php
		if(mysqli_affected_rows($conn) != 0){
			echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/loja/adm/administrativo.php?link=26'>
				<script type=\"text/javascript\">
					alert(\"Situação de Venda alterada com Sucesso.\");
				</script>
			";	
		}else{
			echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/loja/adm/administrativo.php?link=26'>
				<script type=\"text/javascript\">
					alert(\"Situação de Venda não foi alterada com Sucesso.\");
				</script>
			";	
		}?>
	</body>
</html>
<?php $conn->close(); ?>