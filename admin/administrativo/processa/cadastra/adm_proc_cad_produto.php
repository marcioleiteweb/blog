<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
	</head>

	<body> 
		<?php
		include_once("../../../conexao/conexao.php");
		$nome = mysqli_real_escape_string($conn, $_POST['nome']);
		$quantidade = mysqli_real_escape_string($conn, $_POST['quantidade']);
		$preco = mysqli_real_escape_string($conn, $_POST['preco']);
		$descricao = mysqli_real_escape_string($conn, $_POST['descricao']);
		$categorias_produto_id = mysqli_real_escape_string($conn, $_POST['categorias_produto_id']);
		$situacoes_produto_id = mysqli_real_escape_string($conn, $_POST['situacoes_produto_id']);
		$produto_album = time();
		
		//cria a pasta onde serão colocados os arquivos
		mkdir("../../../../imagem_produto/$produto_album/") or die("erro ao criar diretório");
		//Pasta onde o arquivo vai se salvo
		$_UP['pasta'] = '../../../../imagem_produto/';
		
		//Tamanho máximo do arquivo em Bytes
		$_UP['tamanho'] = 1024*1024*200; //2mb
		
		//Array com as extensões permitido
		$_UP['extensoes'] = array('png','jpg','jpeg');
		
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
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=../../../administrativo.php?link=56'>
				<script type=\"text/javascript\">
					alert(\"Extensão da imagem inválida.\");
				</script>
			";	
		}
		
		//Fazer a verificação do tamanho do arquivo
		elseif($_UP['tamanho'] < $_FILES['arquivo']['size']){	
			echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=../../../administrativo.php?link=56'>
				<script type=\"text/javascript\">
					alert(\"O arquivo enviado é muito grande, envie arquivos até 2mb. \");
				</script>
			";	
		}
		
		//O arquivo passou em todas as verificações, hora de tentar move-lo para a pasta foto
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
				$result_produtos = "INSERT INTO produtos (nome, quantidade, preco, descricao, categorias_produto_id, situacoes_produto_id, foto, produto_album, created) VALUES ('$nome', '$quantidade', '$preco', '$descricao', '$categorias_produto_id', '$situacoes_produto_id', '$nome_final','$produto_album', NOW())";
				$resultado_produtos = mysqli_query($conn, $result_produtos);
				
				if(mysqli_affected_rows($conn) != 0){
			 	echo "
					<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=../../../administrativo.php?link=56'>
					<script type=\"text/javascript\">
						alert(\"foi cadastrado\");
					</script>
				";
				}else{
				 	echo "
						<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=../../../administrativo.php?link=56'>
						<script type=\"text/javascript\">
							alert(\"não foi cadastrado\");
						</script>
					";
				}
			}else{
				//Upload não foi efetuado com sucesso
				 echo "
					<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=../../../administrativo.php?link=56'>
					<script type=\"text/javascript\">
						alert(\"não foi cadastrado2\");
					</script>
				";
			}
		}?>
	</body>
</html>
<?php $conn->close(); ?>