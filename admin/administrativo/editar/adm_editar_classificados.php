<?php
	$id = $_GET['id'];
	//Buscar os dados referente ao usuario situado neste id
	$result_produtos = "SELECT * FROM classificados WHERE id = '$id' LIMIT 1";
	$resultado_produtos = mysqli_query($conn, $result_produtos);
	$row_produtos = mysqli_fetch_assoc($resultado_produtos);	
?>
<div class="container theme-showcase" role="main">

	<div class="page-header">
        <h1>Editar Artigo</h1>
	</div>
	<div class="row">
		<div class="pull-right" style="padding-bottom: 20px; ">	
			<a href="administrativo.php?link=27" class="btn btn-sm btn-success">
				Voltar
			</a>
		</div>
	</div>
	<form class="form-horizontal" id="adm_cad_central" method="POST" action="administrativo/processa/edita/adm_proc_editar_classificados.php" enctype="multipart/form-data">
		<div class="form-group">
			<label class="col-sm-2 control-label">titulo</label>
			<div class="col-sm-10">
				<input type="text" name="titulo_classificado" class="form-control" id="inputEmail3" required placeholder="titulo" value="<?php echo $row_produtos['titulo']; ?>">
			</div>
		</div>
		
		<div class="form-group">
			<label for="inputEmail3" class="col-sm-2 control-label">texto</label>
			<div class="col-sm-10">
				<textarea id="mytextarea1" name="texto_classificado" class="tinymce-editor" required rows="5"> <?php echo $row_produtos['texto']; ?></textarea>
			</div>
		</div>
		
		<div class="form-group">
			<label class="col-sm-2 control-label">Fonte</label>
			<div class="col-sm-10">
				<input type="text" name="contato_classificado" class="form-control" id="inputEmail3" required placeholder="Local da Obra" value="<?php echo $row_produtos['contato_bt']; ?>">
			</div>
		</div>
		
		<div class="form-group">
			<label for="inputEmail3" class="col-sm-2 control-label">Foto Principal</label>
			<div class="col-sm-10">
				<input name="arquivo" type="file"/>
			</div>
		</div>
		
			<div class="form-group">
			<label for="inputEmail3" class="col-sm-2 control-label"><b>Deixar em destaque na Home</b></label>			
				<div class="form-check">
				  <input class="form-check-input" type="radio" name="destaque" value="1" id="flexRadioDefault1">
				  <label class="form-check-label" for="flexRadioDefault1">
				   Em Destaque
				  </label>
				</div>
				<div class="form-check">
				  <input class="form-check-input" type="radio" name="destaque" value="0" id="flexRadioDefault2" checked>
				  <label class="form-check-label" for="flexRadioDefault2">
					Normal
				  </label>
				</div>
			</div>
				
			<div class="form-group">
			<label for="inputEmail3" class="col-sm-2 control-label"><b>Status de Publicação</b></label>	
				<div class="form-check">
				  <input class="form-check-input" type="radio" name="pub" value="1" id="flexRadioDefault1">
				  <label class="form-check-label" for="flexRadioDefault1">
					Publicado
				  </label>
				</div>
				<div class="form-check">
				  <input class="form-check-input" type="radio" name="pub" value="0" id="flexRadioDefault2" checked>
				  <label class="form-check-label" for="flexRadioDefault2">
					Arquivado
				  </label>
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