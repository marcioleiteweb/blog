<?php
	$id = $_GET['id'];
	//Buscar os dados referente ao usuario situado neste id
	$result_tarefas = "SELECT * FROM tarefas WHERE id = '$id' LIMIT 1";
	$resultado_tarefas = mysqli_query($conn, $result_tarefas);
	$row_tarefas = mysqli_fetch_assoc($resultado_tarefas);
	
	 $id_cliente =  $row_tarefas['id_cliente'];
	
	if(isset($_SESSION['usuarioNiveisAcessoId'])){
		$id_permissao = $_SESSION['usuarioNiveisAcessoId'];
	}elseif(isset($_SESSION['usuarioNiveisAcessoId_adv'])){
		$id_permissao = $_SESSION['usuarioNiveisAcessoId_adv'];
	}elseif(isset($_SESSION['usuarioNiveisAcessoId_cli'])){
		$id_permissao = $_SESSION['usuarioNiveisAcessoId_cli'];	
	}		
	//Buscar os dados referente ao usuario situado neste id
	$result_permissao = "SELECT * FROM niveis_acessos WHERE id = '$id_permissao' LIMIT 1";
	$resultado_permissao = mysqli_query($conn, $result_permissao);
	$row_categorias_permissao = mysqli_fetch_assoc($resultado_permissao);
	
	
	
		//Buscar os dados referente ao usuario situado neste id
	$result_album = "SELECT * FROM anexos WHERE id_tarefa = '$id'";
	$resultado_album = mysqli_query($conn, $result_album);	
?>
<div class="container theme-showcase" role="main">
	<div class="page-header">
        <h1>Visualizar Oportunidade</h1>
	</div>
	
	<?php if(isset($_SESSION['usuarioId_cli'])){?>
	<div class="row">
		<div class="pull-right" style="padding-bottom: 20px; ">
			<button type="button" class="btn btn-sm btn-primary">
					Acesso somente Vizualizar
			</button>
		</div>
	</div>							
	<?php }else{?>
	<div class="row">
		<div class="pull-right" style="padding-bottom: 20px; ">
			<a href="administrativo.php?link=73&id=<?php echo "$id_cliente";?>">
				<button type='button' class='btn btn-sm btn-success'>Listar</button>
			</a>
		<?php if($row_categorias_permissao['gravar'] == 1){?>		
			<a href="administrativo.php?link=78&id=<?php echo $row_tarefas["id"]; ?>">
				<button type="button" class="btn btn-sm btn-warning">
					Editar
				</button>
			</a>
		<?php }?>
		<?php if($row_categorias_permissao['deletar'] == 1){?>			
			<a href="administrativo/processa/apaga/adm_apagar_tarefas.php?id=<?php echo $row_tarefas["id"]; ?>">
				<button type="button" class="btn btn-sm btn-danger">
					Apagar
				</button>
			</a>
		<?php }?>
		</div>
	</div>
	<?php }?>
	<dl class="dl-horizontal">
		<dt>Id: </dt>
		<dd><?php echo $row_tarefas['id']; ?></dd>
		<dt>Tarefa: </dt>
		<dd><?php echo $row_tarefas['nome_tarefa']; ?></dd>
		<dt>Descrição: </dt>
		<dd>
			<div class="alert alert-success" role="alert">
				<?php echo $row_tarefas['descricao_tarefa']; ?>
			</div>
		</dd>
		<dt>Data Criada: </dt>
		<dd>
			<div class="alert alert-warning" role="alert">
				<?php echo $row_tarefas['data_criada']; ?>
			</div>
		</dd>
		<dt>Status: </dt>
		<dd>
			<div class="alert alert-success" role="alert">
				<?php echo $row_tarefas['status_tarefa']; ?>
			</div>
		</dd>
		<dt>Qual Cliente: </dt>
		<dd>
		<?php 
			$categorias_produto_id = $row_tarefas['id_cliente'];
			$result_categorias_produtos = "SELECT * FROM clientes WHERE id = '$categorias_produto_id'";
			$result_categorias_produtos = mysqli_query($conn, $result_categorias_produtos);
			$row_categorias_produtos = mysqli_fetch_assoc($result_categorias_produtos);
			echo $row_categorias_produtos['nome']; 
		?>
		</dd>
		<dt>Qual Vendedor: </dt>
		<dd>
		<?php 
			$categorias_vendedor_id = $row_tarefas['id_advogado'];
			$result_vendedor = "SELECT * FROM vendedores WHERE id = '$categorias_vendedor_id'";
			$resultado_vendedor = mysqli_query($conn, $result_vendedor);
			$row_vendedor = mysqli_fetch_assoc($resultado_vendedor);
			echo $row_vendedor['nome']; 
		?>
		</dd>
		<dt>Anexo:</dt>
		<dd>
			<?php if($row_categorias_permissao['gravar'] == 1){?>
				<div class="card p-3">
					<form id="adm_cad_produto" class="form-horizontal" method="POST" action="administrativo/processa/cadastra/adm_proc_cad_anexos.php" enctype="multipart/form-data">
						<div class="form-group">
							<label class="col-sm-2 control-label">Nome do Anexo</label>
							<div class="col-sm-10">
								<input type="text" name="nome_anexo" required class="form-control" id="inputEmail3" placeholder="Nome do Anexo">
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-10">
								<input name="arquivo" type="file" accept=".doc, .docx, .txt, .pdf, .xlsx, .xls, .jpg, .jpeg, .png, .pptx" type="file" id="arquivo" />
							</div>
						</div>	
						<div class="form-group">
							<div class="col-sm-offset-2 col-sm-10">
								<button type="submit" class="btn btn-success" onclick="return tinyMCE.triggerSave();">Cadastrar Anexos</button>
							</div>
						</div>
						<input type="hidden" name="id_tarefa" value="<?php echo $row_tarefas['id']; ?>">
					</form>
				</div>
			<?php }?>
			<h3>Anexos</h3>
			<?php while($row_album = mysqli_fetch_assoc($resultado_album)){?>
			<div class="card p-3 pl-5 w-50 float-start text-center">
				<?php 
				$arquivo_up = $row_album["arquivo"];
				$extensao = pathinfo($arquivo_up);
				$extensao = $extensao['extension'];
				//echo "$extensao";
				?>
				<?php if($extensao == "doc" or $extensao == "docx"){?>
				<img src="imagens/icones-geral/icone-word.png" class="card-img-top alinha-centro w-25" alt="...">
				<?php }elseif($extensao == "pdf"){ ?>
				<img src="imagens/icones-geral/icone-pdf.png" class="card-img-top alinha-centro w-25" alt="...">
				<?php }elseif($extensao == "txt"){ ?>
				<img src="imagens/icones-geral/icone-txt.png" class="card-img-top alinha-centro w-25" alt="...">
				<?php }elseif($extensao == "xlsx" or $extensao == "xls"){ ?>
				<img src="imagens/icones-geral/icone-excel.png" class="card-img-top alinha-centro w-25" alt="...">
				<?php }elseif($extensao == "jpg" or $extensao == "jpeg" or $extensao == "png"){ ?>
				<img src="imagens/icones-geral/icone-imagem.png" class="card-img-top alinha-centro w-25" alt="...">
				<?php }elseif($extensao == "pptx"){ ?>
				<img src="imagens/icones-geral/icone-powerpoint.png" class="card-img-top alinha-centro w-25" alt="...">
				<?php }elseif($extensao == "mp3"){ ?>
				<img src="imagens/icones-geral/icone-mp3.png" class="card-img-top alinha-centro w-25" alt="...">
				<?php }?>
				<div class="card-body">
				  <h5 class="card-title">
				  <?php echo $row_album["nome_anexo"];?>
				  </h5> 
				  <a href="imgs-sistema/img-anexos/<?php echo $row_album["arquivo"];?>" class="btn btn-success"  target="_blank"><i class="bi bi-folder-symlink"></i> acessar</a>
				  <?php if($row_categorias_permissao['deletar'] == 1){?>
				  <a href="administrativo/processa/apaga/adm_apagar_arquivo_tarefa.php?id_arquivo=<?php echo $row_album["id"];?>" class="btn btn-danger"><i class="bi bi-folder-symlink"></i> apagar</a>
				  <?php }?>
				</div>
			</div>	
			<?php }?>
		</dd>
	</dl>
</div>
<div class="clearfix"></div>