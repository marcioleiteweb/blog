<?php
	include_once("../../../conexao/conexao.php");
	$id = mysqli_real_escape_string($conn, $_POST['id']);
	$nome = mysqli_real_escape_string($conn, $_POST['nome']);
	$profissao = mysqli_real_escape_string($conn, $_POST['profissao']);
	
	//echo "id do produto". $id."<br><br>";
	
		 //Pasta onde o arquivo vai se salvo
		$_UP['pasta'] = '../../../../imgs-sistema/img-membro/';
		
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
		
		//seleciona linha do banco
		$select_produto = "SELECT * FROM membro WHERE id = '$id'";
		$resultado_produto = mysqli_query($conn, $select_produto);
		$exibe_produto = mysqli_fetch_assoc($resultado_produto);
	
		$caminho_produto = $exibe_produto['foto'];
		//echo "$caminho_produto";
	
		//exit;
		
		$result_usuario = "UPDATE membro SET nome = '$nome', profissao = '$profissao',foto = '$caminho_produto' WHERE id = '$id'";
		$resultado_usuario = mysqli_query($conn, $result_usuario);
		echo "
			
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=../../../administrativo.php?link=60'>
			
				<script type=\"text/javascript\">
					alert(\"Somente dados alterados.\");
				</script>
			";
		die("Não foi possivel fazer o upload, erro: <br>". $_UP['erros'][$_FILES['arquivo']['error']]);	
		exit; //para a execução do script
		}
		
		 //Fazer a verificacao da extensão do arquivo
		$extensao = strtolower(end(explode('.',$_FILES['arquivo']['name'])));
		if(array_search($extensao, $_UP['extensoes']) === false){	
			echo "
			
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=../../../administrativo.php?link=60'>
			
				<script type=\"text/javascript\">
					alert(\"Extensão da imagem inválida.\");
				</script>
			";	
		}
		
		//Fazer a verificação do tamanho do arquivo
		elseif($_UP['tamanho'] < $_FILES['arquivo']['size']){	
			echo "
			
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=../../../administrativo.php?link=60'>
				
				<script type=\"text/javascript\">
					alert(\"O arquivo enviado é muito grande, envie arquivos até 2mb. \");
				</script>
			";	
		}
		
		//O arquivo passou em todas as verificações, hora de tentar move-lo para a pasta foto
		else{
			//seleciona linha do banco
			$select_produto = "SELECT * FROM membro WHERE id = '$id'";
			$resultado_produto = mysqli_query($conn, $select_produto);
			$exibe_produto = mysqli_fetch_assoc($resultado_produto);
			
			$caminho_pasta2 = '../../../../imgs-sistema/img-membro/'.$exibe_produto['foto'];
			$foto_produto = $exibe_produto['foto'];
			
			//echo "$caminho_pasta2";
			//Verificar se deve trocar o nome do arquivo
			if($_UP['renomeia'] == true){
				//Criar um nome baseado no UNIX TIMESTAMP atual e com a extensão jpg
				$nome_final = time().'.jpg';
				//verifica se existe a foto antiga
				if($foto_produto != 0){
				//echo"deleta foto antiga";
				//deleta foto antiga
				echo unlink("$caminho_pasta2");	
				} 
				
			}else{
				//Mantem o nome original do arquivo
				$nome_final = $_FILES['arquivo']['name'];
				
			}
			
		}
		
		if(move_uploaded_file($_FILES['arquivo']['tmp_name'], $_UP['pasta'].$nome_final)){
			
				$result_usuario = "UPDATE membro SET nome = '$nome', profissao = '$profissao', foto = '$nome_final' WHERE id = '$id'";
			$resultado_usuario = mysqli_query($conn, $result_usuario);
				
				if(mysqli_affected_rows($conn) != 0){
			 	echo "
					
					<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=../../../administrativo.php?link=60'>
					
					<script type=\"text/javascript\">
						alert(\"foi cadastrado com sucesso.\");
					</script>
				";
				}else{
				 	echo "
					
						<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=../../../administrativo.php?link=60'>
						
						<script type=\"text/javascript\">
							alert(\"não foi cadastrado1.\");
						</script>
					";
				}
			}else{
				//Upload não foi efetuado com sucesso
				 echo "
				 
					<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=../../../administrativo.php?link=60'>
					
					<script type=\"text/javascript\">
						alert(\"não foi cadastrado2.\");
					</script>
				";
			}
?>