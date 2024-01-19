<?php
	include_once("../../../conexao/conexao.php");
	$nome_anexo = mysqli_real_escape_string($conn, $_POST['nome_anexo']);
	$id_tarefa = mysqli_real_escape_string($conn, $_POST['id_tarefa']);
	
	///////////////////////////////////////////////////////////////////////////////////////
						
		//Pasta onde o arquivo vai se salvo
		$_UP['pasta'] = '../../../imgs-sistema/img-anexos/';
		
		//Tamanho máximo do arquivo em Bytes
		$_UP['tamanho'] = 1024*1024*800; //8mb
		
		//Array com as extensões permitido
		$_UP['extensoes'] = array('doc', 'docx', 'txt', 'pdf', 'xlsx', 'xls', 'jpg', 'jpeg', 'png', 'pptx','mp3');
		
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
		//$extensao = strtolower(end(explode('.',$_FILES['arquivo']['name'])));
			$arquivo_up = $_FILES['arquivo']['name'];
			$extensao_arq = pathinfo($arquivo_up);
			$extensao_arq = $extensao_arq['extension'];
			
			//exit();
		if(array_search($extensao_arq, $_UP['extensoes']) === false){	
			 echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=../../../administrativo.php?link=76&id=".$id_tarefa."'>
				<script type=\"text/javascript\">
					alert(\"Extensão do arquivo inválida.\");
				</script>
			"; 	
		}
		
		//Fazer a verificação do tamanho do arquivo
		elseif($_UP['tamanho'] < $_FILES['arquivo']['size']){	
			 echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=../../../administrativo.php?link=76&id=".$id_tarefa."'>
				<script type=\"text/javascript\">
					alert(\"O arquivo enviado é muito grande, envie arquivos até 8mb. \");
				</script>
			";	
		}
		
		//O arquivo passou em todas as verificações, hora de tentar move-lo para a pasta arquivo
		else{
			//Verificar se deve trocar o nome do arquivo
			if($_UP['renomeia'] == true){
				//Criar um nome baseado no UNIX TIMESTAMP atual e com a extensão
				
				//$old_name = $_FILES['arquivo']['name'];
				//$new_name = time().'.'.$extensao_arq; 
				//$nome_final = rename( $new_name, $old_name);		
				$nome_final = time().'.'.$extensao_arq;	
				//echo "$nome_final";
				
				//exit();
			}else{
				//Mantem o nome original do arquivo
				$nome_final = $_FILES['arquivo']['name'];
			}
			//Verificar se é possivel mover o arquivo para a pasta escolhida
			if(move_uploaded_file($_FILES['arquivo']['tmp_name'], $_UP['pasta'].$nome_final)){
				
				
					//echo"$nome_final";
				//Upload efetuado com sucesso
				$result_usuario = "INSERT INTO anexos (id_tarefa, arquivo, nome_anexo) VALUES ('$id_tarefa', '$nome_final', '$nome_anexo')";
				$resultado_usuario = mysqli_query($conn, $result_usuario);	
				
				
				if(mysqli_affected_rows($conn) != 0){
					//echo"foi";
					//<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=../../../administrativo.php?link=68&dir=$voltar_caminho_correto'>
					//<META HTTP-EQUIV=REFRESH CONTENT = "0;URL=adm_proc_cad_arquivos_b.php?selecao_pasta='.$selecao_pasta.'">
			  	echo "
					<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=../../../administrativo.php?link=76&id=".$id_tarefa."'>
					<script type=\"text/javascript\">
						alert(\"foi cadastrado com sucesso!.\");
					</script>
				"; 
				}else{
					//echo"nao foi";
				 	echo "
						<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=../../../administrativo.php?link=76&id=".$id_tarefa."'>
						<script type=\"text/javascript\">
							alert(\"foi cadastrado!.\");
						</script>
					";
				}
			}else{
				//Upload não foi efetuado com sucesso
				 echo "
					<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=../../../administrativo.php?link=76&id=".$id_tarefa."'>
					<script type=\"text/javascript\">
						alert(\"não foi cadastrado.\");
					</script>
				"; 
			}
		}
	
	///////////////////////////////////////////////////////////////////////////////////////
?>	
<?php $conn->close(); ?>