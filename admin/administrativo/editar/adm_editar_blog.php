<?php
	$id = $_GET['id'];
	//Buscar os dados referente ao usuario situado neste id
	$result_produtos = "SELECT * FROM blog_estados WHERE id = '$id' LIMIT 1";
	$resultado_produtos = mysqli_query($conn, $result_produtos);
	$row_produtos = mysqli_fetch_assoc($resultado_produtos);	
?>
<div class="container theme-showcase" role="main">

	<div class="page-header">
        <h1>Editar Artigo do Blog</h1>
	</div>
	<div class="row">
		<div class="pull-right" style="padding-bottom: 20px; ">	
			<a href="administrativo.php?link=23" class="btn btn-sm btn-success">
				Voltar
			</a>
		</div>
	</div>
	<form class="form-horizontal" id="adm_cad_central" method="POST" action="administrativo/processa/edita/adm_proc_editar_blog.php" enctype="multipart/form-data">
		<div class="form-group">
			<label class="col-sm-2 control-label">titulo</label>
			<div class="col-sm-10">
				<input type="text" name="titulo_blog" class="form-control" id="inputEmail3" placeholder="Nome do Produto" value="<?php echo $row_produtos['titulo']; ?>">
			</div>
		</div>
		
		<div class="form-group">
			<label for="inputEmail3" class="col-sm-2 control-label">texto</label>
			<div class="col-sm-10">
				<textarea id="mytextarea1" name="texto_blog" class="form-control" rows="5"> <?php echo $row_produtos['texto']; ?></textarea>
			</div>
		</div>
		
		<div class="form-group">
			<label for="inputEmail3" class="col-sm-2 control-label">Foto Principal</label>
			<div class="col-sm-10">
				<input name="arquivo" type="file"/>
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label">Artigo de qual Estado</label>
			<div class="col-sm-10">
				<select class="form-control" name="id_estados">
					<option>Selecione</option>
					<?php
					$result_categorias_produtos = "SELECT * FROM estados";
					$result_categorias_produtos = mysqli_query($conn, $result_categorias_produtos);
					while($row_categorias_produtos = mysqli_fetch_assoc($result_categorias_produtos)){ ?> 
						<option value="<?php echo $row_categorias_produtos['id']; ?>"><?php echo $row_categorias_produtos['nome']; ?></option>
					<?php } ?>
				</select>
			</div>
		</div>	


		
		<input type="hidden" name="id" value="<?php echo $row_produtos['id']; ?>">
		
		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
				<button type="submit" onclick="tinyMCE.triggerSave();" class="btn btn-warning">Alterar</button>
			</div>
		</div>
	</form>
</div>