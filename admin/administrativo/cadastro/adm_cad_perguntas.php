<div class="container theme-showcase" role="main">
	<div class="page-header">
        <h1>Cadastrar Perguntas</h1>
	</div>
	<div class="row">
		<div class="pull-right" style="padding-bottom: 20px; ">
			<a href="administrativo.php?link=79"><button type='button' class='btn btn-sm btn-success'>voltar</button></a>
		</div>
	</div>
	<form class="form-horizontal" id="adm_cad_artigos" method="POST" action="administrativo/processa/cadastra/adm_proc_cad_perguntas.php" enctype="multipart/form-data">
		<div class="form-group">
			<label class="col-sm-2 control-label">Pergunta</label>
			<div class="col-sm-10">
				<input type="titulo" name="pergunta" class="form-control" id="inputEmail3" placeholder="Pergunta">
			</div>
		</div>
	
		<div class="form-group">
			<label for="inputEmail3" class="col-sm-2 control-label">Resposta</label>
			<div class="col-sm-10">
				<textarea id="mytextarea1" name="resposta" class="form-control" maxlength="800" rows="5" id="inputEmail3" placeholder="Resposta" required></textarea>
			</div>
		</div>		
		
		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
				<button type="submit" class="btn btn-success" onclick="tinyMCE.triggerSave();">Cadastrar</button>
			</div>
		</div>
		
		
	</form>
</div>