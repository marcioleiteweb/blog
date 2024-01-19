<div class="container theme-showcase" role="main">
	<div class="page-header">
        <h1>Cadastrar Parceiros</h1>
	</div>
	<div class="row">
		<div class="pull-right" style="padding-bottom: 20px; ">
			<a href="administrativo.php?link=34"><button type='button' class='btn btn-sm btn-success'>Listar</button></a>
		</div>
	</div>
	<form id="adm_cad_produto" class="form-horizontal" method="POST" action="administrativo/processa/cadastra/adm_proc_cad_parceiros.php" enctype="multipart/form-data">
	
	
	<div class="form-group">
			<label class="col-sm-2 control-label">Nome</label>
			<div class="col-sm-10">
				<input type="text" name="nome" required class="form-control" id="inputEmail3" placeholder="Nome">
			</div>
		</div>
		
		<div class="form-group">
			<label for="inputEmail3" class="col-sm-2 control-label">Texto</label>
			<div class="col-sm-10">
				<textarea name="texto" class="tinymce-editor"  rows="5" id="mytextarea1" placeholder="Texto" required></textarea>
			</div>
		</div>
	
	
		<div class="form-group">
			<label class="col-sm-2 control-label">Contato do Parceiro</label>
			<div class="col-sm-10">
				<input type="text" name="contato_parceiro" required class="form-control" id="inputEmail3" placeholder="Contato do Parceiro">
			</div>
		</div>
		

			
		<div class="form-group">
			<label for="inputEmail3" class="col-sm-2 control-label">Imagem do Parceiro</label>
			<div class="col-sm-10">
				<input name="arquivo" type="file"/>
			</div>
		</div>	

					
		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
				
				<button type="submit" class="btn btn-success" onclick="return tinyMCE.triggerSave();">Cadastrar</button>
				
			</div>
		</div>
	</form>
</div>