<?php
	include_once("../../conexao/conexao.php");
	$id = mysqli_real_escape_string($conn, $_POST['id']);
	$produto_id = mysqli_real_escape_string($conn, $_POST['produto_id']);
	$situacoes_venda_id = mysqli_real_escape_string($conn, $_POST['situacoes_venda_id']);
	$usuario_id = mysqli_real_escape_string($conn, $_POST['usuario_id']);
	
	$result_vendas = "UPDATE vendas SET produto_id='$produto_id', situacoes_venda_id = '$situacoes_venda_id', usuario_id = '$usuario_id', modified =  NOW() WHERE id = '$id'";
	
	$resultado_vendas = mysqli_query($conn, $result_vendas);	
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
	</head>

	<body> <?php
		if(mysqli_affected_rows($conn) != 0){
			echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/loja/adm/administrativo.php?link=30'>
				<script type=\"text/javascript\">
					alert(\"Venda alterada com Sucesso.\");
				</script>
			";	
		}else{
			echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/loja/adm/administrativo.php?link=30'>
				<script type=\"text/javascript\">
					alert(\"Venda não foi alterada com Sucesso.\");
				</script>
			";	
		}?>
	</body>
</html>
<?php $conn->close(); ?>