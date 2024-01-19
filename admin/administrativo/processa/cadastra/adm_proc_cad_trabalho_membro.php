<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
	</head>

	<body> 
		<?php
		include_once("../../../conexao/conexao.php");
		$nome = mysqli_real_escape_string($conn, $_POST['nome']);
		$descricao = mysqli_real_escape_string($conn, $_POST['descricao']);
		$membro_id = mysqli_real_escape_string($conn, $_POST['membro_id']);
		$arquivo = $_FILES['arquivo'];
		
						
		//Pasta onde o arquivo vai se salvo
		$_UP['pasta'] = '../../../../imgs-sistema/img-trabalhos/';
		
		
		
		//Tamanho máximo do arquivo em Bytes
		$_UP['tamanho'] = 100000000; //125mb
		
		//Array com as extensões permitido
		$_UP['extensoes'] = array('png','jpg','jpeg','pdf','mp3','mp4');
		
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
		
		 $extensao = strtolower(end(explode('.',$_FILES['arquivo']['name'])));
		
		echo "$extensao";
		
		exit;
		
		if(array_search($extensao, $_UP['extensoes']) === true){	
			echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=../../../administrativo.php?link=64'>
				<script type=\"text/javascript\">
					alert(\"Extensão da imagem inválida.\");
				</script>
			";	
		}
		
		//Fazer a verificação do tamanho do arquivo
		elseif($_UP['tamanho'] < $_FILES['arquivo']['size']){	
			echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=../../../administrativo.php?link=64'>
				<script type=\"text/javascript\">
					alert(\"O arquivo enviado é muito grande, envie arquivos até 125mb. \");
				</script>
			";	
		}
		
		//O arquivo passou em todas as verificações, hora de tentar move-lo para a pasta arquivo
		else{
			//Verificar se deve trocar o nome do arquivo
			if($_UP['renomeia'] == true){
				//Criar um nome baseado no UNIX TIMESTAMP atual e com a extensão jpg
			
			
			if (is_uploaded_file($_FILES['mp3']['tmp_name'])) {
					$path = '../../../../imgs-sistema/img-trabalhos/';
					if (($_FILES['mp3']['type'] == 'audio/mpeg')) {
						if ($_FILES['mp3']['size'] < 100000000) {
							move_uploaded_file($_FILES['mp3']['tmp_name'], $path . $_FILES['mp3']['name']);
							echo $_FILES['uploaded']['name'] . ' has been uploaded.\n';
						} else {
							echo 'The uploaded file size greater than 125Mb. Failed to upload the file.';
						}
					} else {
						echo 'The uploaded file is not in mpeg format. Failed to upload the file.';
					}
				}
				
				
				if (is_uploaded_file($_FILES['arquivo']['tmp_name'])) {
					$path = '../../../../imgs-sistema/img-trabalhos/';
					if (($_FILES['arquivo']['type'] == 'video/mp4')) {
						if ($_FILES['arquivo']['size'] < 100000000) {
							move_uploaded_file($_FILES['arquivo']['tmp_name'], $path . $_FILES['arquivo']['name']);
							echo $_FILES['arquivo']['name'] . ' has been uploaded.\n';
						} else {
							echo 'The uploaded file size greater than 125Mb. Failed to upload the file.';
						}
					} else {
						echo 'The uploaded file is not in mpeg format. Failed to upload the file.';
					}
				}
				
			
				$nome_final = time().'.'.$extensao;
			}else{
				//Mantem o nome original do arquivo
				$nome_final = $_FILES['arquivo']['name'];
			}
			//Verificar se é possivel mover o arquivo para a pasta escolhida
			if(move_uploaded_file($_FILES['arquivo']['tmp_name'], $_UP['pasta'].$nome_final)){
				
				//echo"$nome_final";
				//Upload efetuado com sucesso
				$result_produtos = "INSERT INTO trabalhos_membro (membro_id, nome, descricao, arquivo) VALUES ('$membro_id','$nome', '$descricao', '$nome_final')";
				$resultado_produtos = mysqli_query($conn, $result_produtos);
				
				if(mysqli_affected_rows($conn) != 0){
					//echo"foi";
			  	echo "
					<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=../../../administrativo.php?link=64'>
					<script type=\"text/javascript\">
						alert(\"foi cadastrado com sucesso!.\");
					</script>
				"; 
				}else{
					//echo"nao foi";
				 	echo "
						<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=../../../administrativo.php?link=64'>
						<script type=\"text/javascript\">
							alert(\"foi cadastrado!.\");
						</script>
					";
				}
			}else{
				//Upload não foi efetuado com sucesso
				 echo "
					<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=../../../administrativo.php?link=64'>
					<script type=\"text/javascript\">
						alert(\"não foi cadastrado.\");
					</script>
				"; 
			}
		}?>
	</body>
</html>
<?php $conn->close(); ?>