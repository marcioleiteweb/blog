<?php
	include_once("../../../conexao/conexao.php");
	$id = $_GET['id'];
	
	//seleciona linha do banco
	$select_produto = "SELECT * FROM blog_estados WHERE id = '$id'";
	$resultado_produto = mysqli_query($conn, $select_produto);
	$exibe_produto = mysqli_fetch_assoc($resultado_produto);
	
	$pasta_caminho = '../../../../imgs-sistema/img-estados/'.$exibe_produto['foto_principal'];
	echo "$pasta_caminho";
	
	function delTree($dir) { 
	$files = array_diff(scandir($dir), array('.','..')); 
	foreach ($files as $file) { 
	(is_dir("$dir/$file")) ? delTree("$dir/$file") : unlink("$dir/$file"); 
	} 
	return rmdir($dir); 
	}
	
	delTree($pasta_caminho);
	
	$result_categorias_produtos = "DELETE FROM blog_estados WHERE id = '$id'";
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
			
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=../../../administrativo.php?link=23'>
				
				<script type=\"text/javascript\">
					alert(\"apagado com Sucesso.\");
				</script>
			";	
		}else{
			echo "
			
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=../../../administrativo.php?link=23'>
			
				<script type=\"text/javascript\">
					alert(\"não foi apagado.\");
				</script>
			";	
		}?>
	</body>
</html>
<?php $conn->close(); ?>