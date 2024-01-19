<?php
	include_once("../../../conexao/conexao.php");
	$titulo_servicos = mysqli_real_escape_string($conn, $_POST['titulo_servicos']);
	$texto_servicos = mysqli_real_escape_string($conn, $_POST['texto_servicos']);
						

				$result_produtos = "INSERT INTO servicos (titulo, texto) VALUES ('$titulo_servicos', '$texto_servicos')";
				$resultado_produtos = mysqli_query($conn, $result_produtos);
				
				if(mysqli_affected_rows($conn) != 0){
					//echo"foi";
			  	echo "
					<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=../../../administrativo.php?link=17'>
					<script type=\"text/javascript\">
						alert(\"cadastrado com sucesso!.\");
					</script>
				"; 
				}else{
				 	echo "
						<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=../../../administrativo.php?link=17'>
						<script type=\"text/javascript\">
							alert(\"não foi cadastrado!.\");
						</script>
					";
				}
			$conn->close();
?>