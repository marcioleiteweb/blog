<?php
	$id = $_GET['id'];
	//Buscar os dados referente ao usuario situado neste id
	$result_produtos = "SELECT * FROM quem_somos WHERE id = '$id' LIMIT 1";
	$resultado_produtos = mysqli_query($conn, $result_produtos);
	$row_produtos = mysqli_fetch_assoc($resultado_produtos);	
?>
<div class="container theme-showcase" role="main">

	<div class="page-header">
        <h1>Editar Quem Somos</h1>
	</div>
	<div class="row">
		<div class="pull-right" style="padding-bottom: 20px; ">	
			<a href="administrativo.php?link=14" class="btn btn-sm btn-success">
				Voltar
			</a>
		</div>
	</div>
	<form class="form-horizontal" id="adm_cad_central" method="POST" action="administrativo/processa/edita/adm_proc_edita_quem_somos.php" enctype="multipart/form-data">
		<div class="form-group">
			<label class="col-sm-2 control-label">titulo</label>
			<div class="col-sm-10">
				<input type="text" name="titulo_quem_somos" class="form-control" id="inputEmail3" placeholder="Nome do Produto" value="<?php echo $row_produtos['titulo']; ?>">
			</div>
		</div>
		
		<div class="form-group">
			<label for="inputEmail3" class="col-sm-2 control-label">texto</label>
			<div class="col-sm-10">
				<textarea id="mytextarea1" name="texto_quem_somos" class="form-control" rows="5"> <?php echo $row_produtos['texto']; ?></textarea>
			</div>
		</div>
		
		<div class="form-group">
			<label for="inputEmail3" class="col-sm-2 control-label">Foto Principal</label>
			<div class="col-sm-10">
				<input name="arquivo" type="file"/>
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