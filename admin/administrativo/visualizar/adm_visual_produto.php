<?php
	$id = $_GET['id'];
	//Buscar os dados referente ao usuario situado neste id
	$result_produtos = "SELECT * FROM produtos WHERE id = '$id' LIMIT 1";
	$resultado_produtos = mysqli_query($conn, $result_produtos);
	$row_produtos = mysqli_fetch_assoc($resultado_produtos);


		//Buscar os dados referente ao usuario situado neste id
	$result_album = "SELECT * FROM fotos_produtos  WHERE id_produto = '$id'";
	$resultado_album = mysqli_query($conn, $result_album);		
?>
<div class="container theme-showcase" role="main">
	<div class="page-header">
        <h1>Visualizar Produto</h1>
	</div>
	<div class="row">
		<div class="pull-right" style="padding-bottom: 20px; ">
			<a href="administrativo.php?link=56">
				<button type='button' class='btn btn-sm btn-success'>Listar</button>
			</a>
	
			<a href="administrativo.php?link=59&id=<?php echo $row_produtos["id"]; ?>">
				<button type="button" class="btn btn-sm btn-warning">
					Editar
				</button>
			</a>
		
			<a href="administrativo/processa/apaga/adm_apagar_produtos.php?id=<?php echo $row_produtos["id"]; ?>">
				<button type="button" class="btn btn-sm btn-danger">
					Apagar
				</button>
			</a>
		</div>
	</div>
	<dl class="dl-horizontal">		
		<dt>Id: </dt>
		<dd><?php echo $row_produtos['id']; ?></dd>
		<dt>Nome: </dt>
		<dd><?php echo $row_produtos['nome']; ?></dd>
		<dt>Quantidade: </dt>
		<dd><?php echo $row_produtos['quantidade']; ?></dd>
		<dt>Preço: </dt>
		<dd><b>R$ <?php echo $row_produtos['preco']; ?></b></dd>
		<dt>Descrição: </dt>
		<dd class="alert alert-success" role="alert">
		<?php echo $row_produtos['descricao']; ?>
		</dd>
		<dt>Categoria do Produto: </dt>
		<dd><?php 
			$categorias_produto_id = $row_produtos['categorias_produto_id'];
			$result_categorias_produtos = "SELECT * FROM categorias_produtos WHERE id = '$categorias_produto_id'";
			$result_categorias_produtos = mysqli_query($conn, $result_categorias_produtos);
			$row_categorias_produtos = mysqli_fetch_assoc($result_categorias_produtos);
			echo $row_categorias_produtos['nome']; ?>
		</dd>
		<dt>Situação do Produto: </dt>
		<dd><?php 
			$situacoes_produto_id = $row_produtos['situacoes_produto_id'];
			$result_situacoes_produtos = "SELECT * FROM situacoes_produtos WHERE id = '$situacoes_produto_id'";
			$result_situacoes_produtos = mysqli_query($conn, $result_situacoes_produtos);
			$row_situacoes_produtos = mysqli_fetch_assoc($result_situacoes_produtos);
			echo $row_situacoes_produtos['nome']; ?>
		</dd>
		<dt>Inserido: </dt>
		<dd><?php 
			if(isset($row_produtos['created'])){
				$inserido = $row_produtos['created'];
				echo date('d/m/Y H:i:s', strtotime($inserido)); 
			}?>
		</dd>
		<dt>Alterado: </dt>
		<dd><?php 
			if(isset($row_produtos['modified'])){				
				echo date('d/m/Y H:i:s',strtotime($row_produtos['modified'])); 
			} ?>
		</dd>
		<dt>Foto: </dt>
		<dd>
		<img src="<?php echo '../imagem_produto/'.$row_produtos['foto']; ?>" width="200">
		</dd>
		
		
		
		<dt>Foto do album: </dt>
		<br><br>
		<dd class="alert alert-warning">	
			<form id="adm_cad_produto" class="form-horizontal" method="POST" action="administrativo/processa/cadastra/adm_proc_produto_album.php" enctype="multipart/form-data">
				<div class="form-group">
					<div class="col-sm-10">
						<input name="arquivo" type="file"/>
					</div>
				</div>	
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						<button type="submit" class="btn btn-success" onclick="return tinyMCE.triggerSave();">Cadastrar</button>
					</div>
				</div>
				<input type="hidden" name="id" value="<?php echo $row_produtos['id']; ?>">
				<input type="hidden" name="produto_album" value="<?php echo $row_produtos['produto_album']; ?>">
			</form>			
		</dd>
		<dt>Album: </dt>
		<dd>
				<div id="gallery">
					<ul class="alert alert-success">
					<?php while($row_album = mysqli_fetch_assoc($resultado_album)){?>
						<li>
							<a href="<?php echo '../imagem_produto/'.$row_produtos['produto_album'];?>/<?php echo $row_album['fotos_produto'];?>" rel="lightbox" title="<?php echo $row_album['fotos_produto'];?>"><img src="<?php echo '../imagem_produto/'.$row_produtos['produto_album'];?>/<?php echo $row_album['fotos_produto'];?>" width="160" height="160" alt="" title="" />
							  </a>
							 <a href="administrativo/processa/apaga/adm_apagar_foto_produto.php?id_foto=<?php echo $row_album["id"];?>&id_album=<?php echo $row_produtos["id"];?>" class="btn btn-sm btn-danger">
								Apagar
							 </a>
						</li>
					<?php }?>
					</ul>
				</div>	
		</dd>
		
		
		
		
	</dl>
</div>