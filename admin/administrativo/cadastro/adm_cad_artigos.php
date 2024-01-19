<div class="container theme-showcase" role="main">
	<div class="page-header">
        <h1>Cadastrar Artigo</h1>
	</div>
	<div class="row">
		<div class="pull-right" style="padding-bottom: 20px; ">
			<a href="administrativo.php?link=18"><button type='button' class='btn btn-sm btn-success'>voltar</button></a>
		</div>
	</div>
	<form class="form-horizontal" id="adm_cad_artigos" method="POST" action="administrativo/processa/cadastra/adm_proc_cad_artigo.php" enctype="multipart/form-data">
		<div class="form-group">
			<label class="col-sm-2 control-label">Titulo do artigo</label>
			<div class="col-sm-10">
				<input type="text" name="titulo" class="form-control" id="inputEmail3" placeholder="Titulo do artigo">
			</div>
		</div>
	
		<div class="form-group">
			<label for="inputEmail3" class="col-sm-2 control-label">Conteudo</label>
			<div class="col-sm-10">
				<textarea name="conteudo" class="form-control" maxlength="1000" rows="5" id="inputEmail3" placeholder="Conteudo" required></textarea>
			</div>
		</div>		
		<div class="form-group">
			<div class="col-sm-10">
			<label for="formGroupExampleInput">Fotos do Album</label>
			<input type="text" name="album" class="form-control" id="inputEmail3" placeholder="Nome do album inteiro sem espaços">
			<input type="file" name="fotos[]" multiple="multiple" />
			</div>
		</div>
		<div class="form-group">
			
		</div>		
					
		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
				<button type="submit" class="btn btn-success" onclick="tinyMCE.triggerSave();">Cadastrar</button>
			</div>
		</div>
		
		
	</form>
</div>