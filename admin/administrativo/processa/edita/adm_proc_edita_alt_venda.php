<?php
	include_once("../../conexao/conexao.php");
	$id = mysqli_real_escape_string($conn, $_POST['id']);
	$venda_id = mysqli_real_escape_string($conn, $_POST['venda_id']);
	$situacoes_venda_id = mysqli_real_escape_string($conn, $_POST['situacoes_venda_id']);
	
	$result_vendas = "UPDATE alteracoes_sitacoes_vendas SET venda_id='$venda_id', situacoes_venda_id = '$situacoes_venda_id', modified =  NOW() WHERE id = '$id'";
	
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
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/loja/adm/administrativo.php?link=34'>
				<script type=\"text/javascript\">
					alert(\"Alteração da Venda alterada com Sucesso.\");
				</script>
			";	
		}else{
			echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/loja/adm/administrativo.php?link=34'>
				<script type=\"text/javascript\">
					alert(\"Alteração da Venda não foi alterada com Sucesso.\");
				</script>
			";	
		}?>
	</body>
</html>
<?php $conn->close(); ?>