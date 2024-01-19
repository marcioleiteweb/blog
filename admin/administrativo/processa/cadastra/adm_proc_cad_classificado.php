<?php
	include_once("../../../conexao/conexao.php");
	$titulo_classificado = mysqli_real_escape_string($conn, $_POST['titulo_classificado']);
	$texto_classificado = mysqli_real_escape_string($conn, $_POST['texto_classificado']);
	$classificado_album = time();
	$contato_classificado = mysqli_real_escape_string($conn, $_POST['contato_classificado']);
	$destaque = mysqli_real_escape_string($conn, $_POST['destaque']);
	$pub = mysqli_real_escape_string($conn, $_POST['pub']);

	
	
	//cria a pasta onde serão colocados os arquivos
		mkdir("../../../../imgs-sistema/img-classificados/$classificado_album") or die("erro ao criar diretório");
						
		//Pasta onde o arquivo vai se salvo
		$_UP['pasta'] = '../../../../imgs-sistema/img-classificados/';
		
		//Tamanho máximo do arquivo em Bytes
		$_UP['tamanho'] = 1024*1024*800; //8mb
		
		//Array com as extensões permitido
		$_UP['extensoes'] = array('png','jpg','jpeg','gif');
		
		//Renomeia o arquivo? (se true, o arquivo será salvo como .jpg e em nome único)
		$_UP['renomeia'] = true;
		
		//Array com os tipos de erros de upload do PHP
		$_UP['erros'][0] = 'Não houve erro';
		$_UP['erros'][1] = 'O arquivo no upload é maior que o limite do PHP';
		$_UP['erros'][2] = 'O arquivo ultrapassa o limite de tamanho especificado no HTML';
		$_UP['erros'][3] = 'O upload do arquivo foi feito parcialmente';
		$_UP['erros'][4] = 'Não foi feito o upload do arquivo';
		
		//Verfica se houve algum erro com o upload. Se sim, exibe mensagem de erro
		if($_FILES['arquivo']['error'] != 0){
			die("Não foi possivel fazer o upload, erro: <br>". $_UP['erros'][$_FILES['arquivo']['error']]);
			exit; //para a execução do script
		}
		
		 //Fazer a verificacao da extensão do arquivo
		$extensao = strtolower(end(explode('.',$_FILES['arquivo']['name'])));
		if(array_search($extensao, $_UP['extensoes']) === false){	
			 echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=../../../administrativo.php?link=27'>
				<script type=\"text/javascript\">
					alert(\"Extensão do arquivo inválida.\");
				</script>
			"; 	
		}
		
		//Fazer a verificação do tamanho do arquivo
		elseif($_UP['tamanho'] < $_FILES['arquivo']['size']){	
			 echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=../../../administrativo.php?link=27'>
				<script type=\"text/javascript\">
					alert(\"O arquivo enviado é muito grande, envie arquivos até 8mb. \");
				</script>
			";	
		}
		
		//O arquivo passou em todas as verificações, hora de tentar move-lo para a pasta arquivo
		else{
			//Verificar se deve trocar o nome do arquivo
			if($_UP['renomeia'] == true){
				//Criar um nome baseado no UNIX TIMESTAMP atual e com a extensão jpg
				$nome_final = time().'.jpg';
			}else{
				//Mantem o nome original do arquivo
				$nome_final = $_FILES['arquivo']['name'];
			}
			//Verificar se é possivel mover o arquivo para a pasta escolhida
			if(move_uploaded_file($_FILES['arquivo']['tmp_name'], $_UP['pasta'].$nome_final)){
				
				//echo"$nome_final";
				//Upload efetuado com sucesso
				$result_produtos = "INSERT INTO classificados (titulo, texto, foto_principal, classificado_album, contato_bt, destaque, pub) VALUES ('$titulo_classificado', '$texto_classificado', '$nome_final', '$classificado_album', '$contato_classificado','$destaque','$pub')";
				$resultado_produtos = mysqli_query($conn, $result_produtos);
				
				if(mysqli_affected_rows($conn) != 0){
					//echo"foi";
			  	echo "
					<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=../../../administrativo.php?link=27'>
					<script type=\"text/javascript\">
						alert(\"cadastrado com sucesso!.\");
					</script>
				"; 
				}else{
					//echo"nao foi";
				 	echo "
						<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=../../../administrativo.php?link=27'>
						<script type=\"text/javascript\">
							alert(\"não foi cadastrado!.\");
						</script>
					";
				}
			}else{
				//Upload não foi efetuado com sucesso
				 echo "
					<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=../../../administrativo.php?link=27'>
					<script type=\"text/javascript\">
						alert(\"não foi cadastrado.\");
					</script>
				"; 
			}
		}?>
	</body>
</html>
<?php $conn->close(); ?>