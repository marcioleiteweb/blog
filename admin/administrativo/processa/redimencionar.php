<?php
	include_once("../../conexao/conexao.php");
		$id = $_GET['id'];

		//seleciona linha do banco
		$select_produto = "SELECT * FROM artigos WHERE id = '$id'";
		$resultado_produto = mysqli_query($conn, $select_produto);
		$exibe_produto = mysqli_fetch_assoc($resultado_produto);
		
		$pasta_caminho = '../../../imagem_geral/'.$exibe_produto['album'];
		echo "$pasta_caminho";
		
		
	function redimencionarImagemJPG($imagem, $largura, $altura){	
	echo "Altura pretendida: $altura - largura pretendida: $largura <br>";
	
	switch($imagem):
		case 'image/jpeg';
		case 'image/pjpeg';
			$imagem_temporaria = imagecreatefromjpeg($imagem);
			
			$largura_original = imagesx($imagem_temporaria);
			
			$altura_original = imagesy($imagem_temporaria);
			
			echo "largura original: $largura_original - Altura original: $altura_original <br>";
			
			$nova_largura = $largura ? $largura : floor (($largura_original / $altura_original) * $altura);
			
			$nova_altura = $altura ? $altura : floor (($altura_original / $largura_original) * $largura);
			
			$imagem_redimensionada = imagecreatetruecolor($nova_largura, $nova_altura);
			imagecopyresampled($imagem_redimensionada, $imagem_temporaria, 0, 0, 0, 0, $nova_largura, $nova_altura, $largura_original, $altura_original);
			
			imagejpeg($imagem_redimensionada, $imagem);
			
			//echo "<img src='arquivo/".$_FILES['arquivo']['name']."'>";
			
			
		break;
		
		//Caso a imagem seja extensão PNG cai nesse CASE
		case 'image/png':
		case 'image/x-png';
			$imagem_temporaria = imagecreatefrompng($imagem);
			
			$largura_original = imagesx($imagem_temporaria);
			$altura_original = imagesy($imagem_temporaria);
			echo "Largura original: $largura_original - Altura original: $altura_original <br> ";
			
			/* Configura a nova largura */
			$nova_largura = $largura ? $largura : floor(( $largura_original / $altura_original ) * $altura);

			/* Configura a nova altura */
			$nova_altura = $altura ? $altura : floor(( $altura_original / $largura_original ) * $largura);
			
			/* Retorna a nova imagem criada */
			$imagem_redimensionada = imagecreatetruecolor($nova_largura, $nova_altura);
			
			/* Copia a nova imagem da imagem antiga com o tamanho correto */
			//imagealphablending($imagem_redimensionada, false);
			//imagesavealpha($imagem_redimensionada, true);

			imagecopyresampled($imagem_redimensionada, $imagem_temporaria, 0, 0, 0, 0, $nova_largura, $nova_altura, $largura_original, $altura_original);
			
			//função imagejpeg que envia para o browser a imagem armazenada no parâmetro passado
			imagepng($imagem_redimensionada, $imagem);
			
			//echo "<img src='arquivo/" .$_FILES['arquivo']['name']. "'>";
		break;
	endswitch;
	}
		
	$files = glob("$pasta_caminho/*.*");
	for ($i=0; $i<count($files); $i++) { 
		$num = $files[$i];
		echo "<br> $num <br>";
		echo '<img src="'.$num.'" alt="" title="Img#1" />';
		echo redimencionarImagemJPG('../../../imagem_geral/12345/banner artesa --7 de setembro.jpg', 800, 600);	
	}
?>