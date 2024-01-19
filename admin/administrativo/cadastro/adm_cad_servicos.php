<div class="container theme-showcase" role="main">
	<div class="page-header">
        <h1>Cadastrar Serviços</h1>
	</div>
	<div class="row">
		<div class="pull-right" style="padding-bottom: 20px; ">
			<a href="administrativo.php?link=14"><button type='button' class='btn btn-sm btn-success'>voltar</button></a>
		</div>
	</div>
	<form class="form-horizontal" id="adm_cad_artigos" method="POST" action="administrativo/processa/cadastra/adm_proc_cad_quem_servicos.php" enctype="multipart/form-data">
		<div class="form-group">
			<label class="col-sm-2 control-label">Titulo do serviço</label>
			<div class="col-sm-10">
				<input type="titulo" name="titulo_servicos" class="form-control" id="inputEmail3" placeholder="Titulo do artigo">
			</div>
		</div>
	
		<div class="form-group">
			<label for="inputEmail3" class="col-sm-2 control-label">Texto do serviço</label>
			<div class="col-sm-10">
				<textarea name="texto_servicos" class="form-control" maxlength="350" rows="5" id="inputEmail3" placeholder="Conteudo" required></textarea>
			</div>
		</div>		
		
		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
				<button type="submit" class="btn btn-success" onclick="tinyMCE.triggerSave();">Cadastrar</button>
			</div>
		</div>
		
		
	</form>
</div>