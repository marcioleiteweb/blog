<?php
class Redimensiona{
	public function Redimensionar($imagem, $largura, $pasta){
		
		$name = md5(uniqid(rand(),true));
		
		if ($imagem['type']=="image/jpeg"){
			$img = imagecreatefromjpeg($imagem['tmp_name']);
		}else if ($imagem['type']=="image/gif"){
			$img = imagecreatefromgif($imagem['tmp_name']);
		}else if ($imagem['type']=="image/png"){
			$img = imagecreatefrompng($imagem['tmp_name']);
		}
		$x   = imagesx($img);
		$y   = imagesy($img);
		$autura = ($largura * $y)/$x;
		
		$nova = imagecreatetruecolor($largura, $autura);
		imagecopyresampled($nova, $img, 0, 0, 0, 0, $largura, $autura, $x, $y);
		
		if ($imagem['type']=="image/jpeg"){
			$local="$pasta/$name".".jpg";
			$nome="$name".".jpg";
			imagejpeg($nova, $local);
		}else if ($imagem['type']=="image/gif"){
			$local="$pasta/$name".".gif";
			$nome="$name".".gif";
			imagejpeg($nova, $local);
		}else if ($imagem['type']=="image/png"){
			$local="$pasta/$name".".png";
			$nome="$name".".png";
			imagejpeg($nova, $local);
		}

		echo "$nome";

		$result_produtos = "INSERT INTO fotos_classificados (id_classificados, foto) VALUES ('$id_blog_classificados', '$nome')";
		$resultado_produtos = mysqli_query($conn, $result_produtos);

				if(mysqli_affected_rows($conn) != 0){
					echo "
					
					<script type=\"text/javascript\">
						alert(\"foi cadastrado com sucesso!.\");
					</script>
				"; 
				}else{
				 	echo "
					
						<script type=\"text/javascript\">
							alert(\"nao foi cadastrado!.\");
						</script>
					";
				}		
		
		imagedestroy($img);
		imagedestroy($nova);	
		
		return $local;
	}
}
?>