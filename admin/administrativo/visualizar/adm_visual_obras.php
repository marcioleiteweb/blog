<?php
	$id = $_GET['id'];
	//Buscar os dados referente ao usuario situado neste id
	$result_produtos = "SELECT * FROM obras WHERE id = '$id' LIMIT 1";
	$resultado_produtos = mysqli_query($conn, $result_produtos);
	$row_produtos = mysqli_fetch_assoc($resultado_produtos);
	
	
		//Buscar os dados referente ao usuario situado neste id
	$result_album = "SELECT * FROM fotos_obras  WHERE 	id_obras = '$id'";
	$resultado_album = mysqli_query($conn, $result_album);	
	
?>
<div class="container theme-showcase" role="main">
	<div class="page-header">
        <h1>Visualizar Obra</h1>
	</div>
	<div class="row">
		<div class="pull-right" style="padding-bottom: 20px; ">
			<a href="administrativo.php?link=48">
				<button type='button' class='btn btn-sm btn-success'>Listar</button>
			</a>
			
			<a href="administrativo.php?link=51&id=<?php echo $row_produtos["id"]; ?>">
				<button type="button" class="btn btn-sm btn-warning">
					Editar
				</button>
			</a>
			
			<a href="administrativo/processa/apaga/adm_apagar_obras.php?id=<?php echo $row_produtos["id"]; ?>">
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
		<dd><?php echo $row_produtos['titulo']; ?></dd>
		<dt>Texto: </dt>
		<dd class="alert alert-success" role="alert">
		<?php echo $row_produtos['texto']; ?>
		</dd>

		<dt>Foto: </dt>
		<dd>
		<img src="<?php echo '../imgs-sistema/img-obras/'.$row_produtos['foto_principal']; ?>" width="200">
		</dd>
		<dt>Foto do album: </dt>
		<br><br>
		<dd class="alert alert-warning">	
			<form id="adm_cad_produto" class="form-horizontal" method="POST" action="administrativo/processa/cadastra/adm_proc_obras_album.php" enctype="multipart/form-data">
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
				<input type="hidden" name="obras_album" value="<?php echo $row_produtos['obras_album']; ?>">
			</form>			
		</dd>
		<dt>Album: </dt>
		<dd>
				<div id="gallery">
					<ul class="alert alert-success">
					<?php while($row_album = mysqli_fetch_assoc($resultado_album)){?>
						<li>
							<a href="<?php echo '../imgs-sistema/img-obras/'.$row_produtos['obras_album'];?>/<?php echo $row_album['foto'];?>" rel="lightbox" title="<?php echo $row_album['foto'];?>">
							<img src="<?php echo '../imgs-sistema/img-obras/'.$row_produtos['obras_album'];?>/<?php echo $row_album['foto'];?>" width="160" height="160" alt="" title="" />
							  </a>
							 <a href="administrativo/processa/apaga/adm_apagar_foto_obras.php?id_foto=<?php echo $row_album["id"];?>&id_album=<?php echo $row_produtos["id"];?>" class="btn btn-sm btn-danger">
								Apagar
							 </a>
						</li>
					<?php }?>
					</ul>
				</div>	
		</dd>
	</dl>
</div>