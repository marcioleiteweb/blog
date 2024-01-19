<?php
	include_once("../../../conexao/conexao.php");
	$id = $_GET['id'];
	
		//seleciona linha do banco
	$select_produto = "SELECT * FROM  produtos WHERE id = '$id'";
	$resultado_produto = mysqli_query($conn, $select_produto);
	$exibe_produto = mysqli_fetch_assoc($resultado_produto);
	
	$pasta_caminho = '../../../../imagem_produto/'.$exibe_produto['foto'];
	$pasta_caminho_todas_fotos = '../../../../imagem_produto/'.$exibe_produto['produto_album'].'/';
	
	function delTree($dir) { 
	$files = array_diff(scandir($dir), array('.','..')); 
	foreach ($files as $file) { 
	(is_dir("$dir/$file")) ? delTree("$dir/$file") : unlink("$dir/$file"); 
	} 
	return rmdir($dir); 
	}
	
	delTree($pasta_caminho_todas_fotos);
	
	rmdir($pasta_caminho_todas_fotos);
		
?>

<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
	</head>

	<body> <?php
		if($exibe_produto != 0){
			
			
			//deleta o arquivo na pasta
			unlink($pasta_caminho);
			//deleta a linha do banco
			$result_produtos = "DELETE FROM produtos WHERE id = '$id'";
			$resultado_apagar = mysqli_query($conn, $result_produtos);
			
			//deleta a linha do banco das fotos
			$result_blog_album = "DELETE FROM fotos_produtos WHERE id_produto = '$id'";
			$resultado_apagar = mysqli_query($conn, $result_blog_album);
			echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=../../../administrativo.php?link=56'>
				<script type=\"text/javascript\">
					alert(\"Produto apagado com Sucesso.\");
				</script>
			";	
		}else{
			echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=../../../administrativo.php?link=56'>
				<script type=\"text/javascript\">
					alert(\"Produto não foi apagado com Sucesso.\");
				</script>
			";	
		}?>
	</body>
</html>
<?php $conn->close(); ?>