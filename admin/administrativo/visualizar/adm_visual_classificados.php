<?php
	$id = $_GET['id'];
	//Buscar os dados referente ao usuario situado neste id
	$result_produtos = "SELECT * FROM classificados WHERE id = '$id' LIMIT 1";
	$resultado_produtos = mysqli_query($conn, $result_produtos);
	$row_produtos = mysqli_fetch_assoc($resultado_produtos);
	
	
		//Buscar os dados referente ao usuario situado neste id
	$result_album = "SELECT * FROM fotos_classificados  WHERE id_classificados = '$id'";
	$resultado_album = mysqli_query($conn, $result_album);	
	
?>
<div class="container theme-showcase" role="main">
	<div class="page-header">
        <h1>Visualizar Blog</h1>
	</div>
	<div class="row">
		<div class="pull-right" style="padding-bottom: 20px; ">
			<a href="administrativo.php?link=27">
				<button type='button' class='btn btn-sm btn-success'>Listar</button>
			</a>
			
			<a href="administrativo.php?link=30&id=<?php echo $row_produtos["id"]; ?>">
				<button type="button" class="btn btn-sm btn-warning">
					Editar
				</button>
			</a>
			
			<a href="administrativo/processa/apaga/adm_apagar_classificados.php?id=<?php echo $row_produtos["id"]; ?>">
				<button type="button" class="btn btn-sm btn-danger">
					Apagar
				</button>
			</a>
		</div>
	</div>
	<dl class="dl-horizontal">		
		<dt>Id: </dt>
		<dd><?php echo $row_produtos['id']; ?></dd>
		<dt>Titulo: </dt>
		<dd><?php echo $row_produtos['titulo']; ?></dd>
		<dt>Texto: </dt>
		<dd class="alert alert-success" role="alert">
		<?php echo $row_produtos['texto']; ?>
		</dd>
		<dt>Local: </dt>
		<dd class="alert alert-success" role="alert">
		<?php echo $row_produtos['contato_bt']; ?>
		</dd>
		<dt>Em Destaque: </dt>
		<?php if($row_produtos['destaque'] == 1){?>
		<dd class="alert alert-success" role="alert">
		<?php echo "Em Destaque na Home";?>
		</dd>
		<?php }else{?>
		<dd class="alert alert-danger" role="alert">
		<?php	echo "Artigo Comum";?>
		</dd>
		<?php }?>
		<dt>Foto: </dt>
		<dd>
		<img src="<?php echo '../imgs-sistema/img-classificados/'.$row_produtos['foto_principal']; ?>" width="200">
		</dd>
		<dt>Fotos do album: </dt>
		<br><br>
		
		<?php
				class Redimensiona{
					public function Redimensionar($imagem, $largura, $pasta){
							/* aqui ficam os dados de conexao com seu sistema*/
							
							$servidor = "localhost";// coloque aqui o servidor MYSQL do seu servidor;
							$usuario = "root";      // coloque aqui o usuario do banco criado;
							$senha = "";			// coloque aqui a senha do banco criado;
							$dbname = "blog_babi";// coloque aqui o nome do banco criado;
							
							
							//Criar a conexão
							$conn = mysqli_connect($servidor, $usuario, $senha, $dbname);
							if(!$conn){
								die("Falha na conexao: " . mysqli_connect_error());
							}else{
								//echo "Conexao realizada com sucesso";
							}						
						
						$id = $_GET['id'];
						//Buscar os dados referente ao usuario situado neste id
						$result_produtos1 = "SELECT * FROM classificados WHERE id = '$id' LIMIT 1";
						$resultado_produtos1 = mysqli_query($conn, $result_produtos1);
						$row_produtos1 = mysqli_fetch_assoc($resultado_produtos1);
						
							
						$id_blog_classificados = $row_produtos1['id'];
						$classificados_album = $row_produtos1['classificado_album'];					
						
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
						
						$nome_foto = mysqli_real_escape_string($conn, $_POST['nome']);
						
						if(isset($nome)){
						$result_produtos_g= "INSERT INTO fotos_classificados (id_classificados, foto, nome) VALUES ('$id_blog_classificados', '$nome', '$nome_foto')";
						$resultado_produtos_g = mysqli_query($conn, $result_produtos_g);
						}
								if(mysqli_affected_rows($conn) != 0){
									echo "
									<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=administrativo.php?link=28&id=$id_blog_classificados'>
									<script type=\"text/javascript\">
										alert(\"foi cadastrado com sucesso!.\");
									</script>
								"; 
								}else{
									echo "
									<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=administrativo.php?link=28&id=$id_blog_classificados'>
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
				
			if (isset($_POST['acao']) && $_POST['acao']=="cadastrar"){
				
				$classificados_album = $row_produtos['classificado_album'];
				
				$foto = $_FILES['foto'];	
				$redim = new Redimensiona();
				$pastaFinal = '../imgs-sistema/img-classificados/'.$classificados_album.'/';
				$src=$redim->Redimensionar($foto, 800, $pastaFinal);	
				
			} 

			?>
		
		<dd class="alert alert-warning">	
			<form id="adm_cad_produto" class="form-horizontal" method="POST" action="" enctype="multipart/form-data">
				<div class="form-group">
					<div class="col-sm-10">
						<input type="file" name="foto">
						<input type="hidden" name="acao" value="cadastrar" />					
    				</div>
				</div>
				<div class="form-group">
					<div class="col-sm-10">
						<input type="text" name="nome" required class="form-control" id="inputEmail3" placeholder="Nome da Foto">
					</div>
				</div>				
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						<button type="submit" class="btn btn-success" onclick="return tinyMCE.triggerSave();">Cadastrar</button>
					</div>
				</div>
				<input type="hidden" name="id" value="<?php echo $row_produtos['id']; ?>">
				<input type="hidden" name="classificados_album" value="<?php echo $row_produtos['classificado_album']; ?>">
			</form>			
		</dd>
		<dt>Album: </dt>
		<dd>
				<div id="gallery">
					<ul class="alert alert-success">
					<?php while($row_album = mysqli_fetch_assoc($resultado_album)){?>
						<li>
							<a href="<?php echo '../imgs-sistema/img-classificados/'.$row_produtos['classificado_album'];?>/<?php echo $row_album['foto'];?>" rel="lightbox" title="<?php echo $row_album['foto'];?>"><img src="<?php echo '../imgs-sistema/img-classificados/'.$row_produtos['classificado_album'];?>/<?php echo $row_album['foto'];?>" width="160" height="160" alt="" title="" />
							  </a>
							  
								<p class="alert alert-danger" role="alert">
								<?php echo $row_album['nome']; ?>
								</p>
							  
							 <a href="administrativo/processa/apaga/adm_apagar_foto_classificados.php?id_foto=<?php echo $row_album["id"];?>&id_album=<?php echo $row_produtos["id"];?>" class="btn btn-sm btn-danger">
								Apagar
							 </a>
						</li>
					<?php }?>
					</ul>
				</div>	
		</dd>
	</dl>
</div>