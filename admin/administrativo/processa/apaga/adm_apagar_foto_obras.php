<?php
	include_once("../../../conexao/conexao.php");
	$id_foto = $_GET['id_foto'];
	$id_album = $_GET['id_album'];
	
	//seleciona linha do banco
	$select_blog_fotos = "SELECT * FROM fotos_obras WHERE id = '$id_foto'";
	$resultado_blog_fotos = mysqli_query($conn, $select_blog_fotos);
	$exibe_blog_fotos = mysqli_fetch_assoc($resultado_blog_fotos);
	
	//seleciona linha do banco
	$select_blog = "SELECT * FROM obras WHERE id = '$id_album'";
	$resultado_blog = mysqli_query($conn, $select_blog);
	$exibe_blog = mysqli_fetch_assoc($resultado_blog);
	
	$pasta_caminho_todas_fotos = '../../../../imgs-sistema/img-obras/'.$exibe_blog['obras_album'].'/'.$exibe_blog_fotos['foto'];
	
	$id_blog_estados = $exibe_blog['id'];
	
	
?>

<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
	</head>

	<body> <?php
		if($exibe_blog_fotos != 0){
			//deleta o arquivo na pasta
			unlink($pasta_caminho_todas_fotos);
			//deleta a linha do banco das fotos
			$result_blog_album = "DELETE FROM  fotos_obras WHERE id = '$id_foto'";
			$resultado_apagar = mysqli_query($conn, $result_blog_album);
			echo "
				
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=../../../administrativo.php?link=49&id=".$id_blog_estados."''>
					
				<script type=\"text/javascript\">
					alert(\"apagado com Sucesso.\");
				</script>
			";	 
		}else{
			 echo "
				
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=../../../administrativo.php?link=49&id=".$id_blog_estados."'''>
				
				<script type=\"text/javascript\">
					alert(\"não foi apagado.\");
				</script>
			";	 
		}
?>
	</body>
</html>
<?php $conn->close(); ?>