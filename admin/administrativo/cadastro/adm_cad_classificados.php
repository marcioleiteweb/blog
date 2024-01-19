<div class="container theme-showcase" role="main">
	<div class="page-header">
        <h1>Cadastrar Artigo Blog</h1>
	</div>
	<div class="row">
		<div class="pull-right" style="padding-bottom: 20px; ">
			<a href="administrativo.php?link=27"><button type='button' class='btn btn-sm btn-success'>Listar</button></a>
		</div>
	</div>
	<form id="adm_cad_produto" class="form-horizontal" method="POST" action="administrativo/processa/cadastra/adm_proc_cad_classificado.php" enctype="multipart/form-data">
		<div class="form-group">
			<label class="col-sm-2 control-label">Titulo</label>
			<div class="col-sm-10">
				<input type="text" name="titulo_classificado" required class="form-control" id="inputEmail3" placeholder="Titulo">
			</div>
		</div>
		
		<div class="form-group">
			<label for="inputEmail3" class="col-sm-2 control-label">Texto</label>
			<div class="col-sm-10">
				<textarea name="texto_classificado" class="tinymce-editor"  rows="5" id="mytextarea1" placeholder="Texto" required></textarea>
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label">Fonte</label>
			<div class="col-sm-10">
				<input type="text" name="contato_classificado" required class="form-control" id="inputEmail3" placeholder="Fonte da Noticia">
			</div>
		</div>

			
		<div class="form-group">
			<label for="inputEmail3" class="col-sm-2 control-label">Imagem Principal</label>
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
					
		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
				
				<button type="submit" class="btn btn-success" onclick="return tinyMCE.triggerSave();">Cadastrar</button>
				
			</div>
		</div>
	</form>
</div>