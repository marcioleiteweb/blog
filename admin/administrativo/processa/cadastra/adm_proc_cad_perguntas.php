<?php
	include_once("../../../conexao/conexao.php");
	$pergunta = mysqli_real_escape_string($conn, $_POST['pergunta']);
	$resposta = mysqli_real_escape_string($conn, $_POST['resposta']);
						

				$result_produtos = "INSERT INTO perguntas (	pergunta, resposta) VALUES ('$pergunta', '$resposta')";
				$resultado_produtos = mysqli_query($conn, $result_produtos);
				
				if(mysqli_affected_rows($conn) != 0){
					//echo"foi";
			  	echo "
					<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=../../../administrativo.php?link=79'>
					<script type=\"text/javascript\">
						alert(\"cadastrado com sucesso!.\");
					</script>
				"; 
				}else{
				 	echo "
						<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=../../../administrativo.php?link=79'>
						<script type=\"text/javascript\">
							alert(\"não foi cadastrado!.\");
						</script>
					";
				}
			$conn->close();
?>