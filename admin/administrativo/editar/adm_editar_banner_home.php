<?php
	$id = $_GET['id'];
	//Buscar os dados referente ao usuario situado neste id
	$result_produtos = "SELECT * FROM banner_home WHERE id = '$id' LIMIT 1";
	$resultado_produtos = mysqli_query($conn, $result_produtos);
	$row_produtos = mysqli_fetch_assoc($resultado_produtos);	
?>
<div class="container theme-showcase" role="main">
	<div class="page-header">
        <h1>Editar Banner Home</h1>
	</div>
	<div class="row">
		<div class="pull-right" style="padding-bottom: 20px; ">
			<a href="administrativo.php?link=23"><button type='button' class='btn btn-sm btn-success'>Listar</button></a>
		</div>
	</div>
	<form class="form-horizontal" method="POST" action="administrativo/processa/edita/adm_proc_editar_banner_home.php" enctype="multipart/form-data">
		<div class="form-group">
			<label class="col-sm-2 control-label">titulo_banner</label>
			<div class="col-sm-10">
				<input type="text" name="titulo_banner" class="form-control" id="inputEmail3" placeholder="titulo_banner" value="<?php echo $row_produtos['titulo_banner']; ?>">
			</div>
		</div>

		<div class="form-group">
			<label for="inputEmail3" class="col-sm-2 control-label">texto_banner</label>
			<div class="col-sm-10">
				<textarea name="texto_banner" class="form-control" rows="5" maxlength="800" id="mytextarea2" placeholder="texto_banner" required> <?php echo $row_produtos['texto_banner']; ?></textarea>
			</div>
		</div>
		

		
		<div class="form-group">
			<label for="inputEmail3" class="col-sm-2 control-label">Imagem</label>
			<div class="col-sm-10">
				<input name="arquivo" type="file"/>
			</div>
		</div>	

		<input type="hidden" name="id" value="<?php echo $row_produtos['id']; ?>">
		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
				<button type="submit" class="btn btn-warning" onclick="return tinyMCE.triggerSave();">Alterar</button>
			</div>
		</div>
	</form>
</div>