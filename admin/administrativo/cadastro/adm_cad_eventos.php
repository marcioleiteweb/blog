<div class="container theme-showcase" role="main">
	<div class="page-header">
        <h1>Cadastrar Testemunho</h1>
	</div>
	<div class="row">
		<div class="pull-right" style="padding-bottom: 20px; ">
			<a href="administrativo.php?link=14"><button type='button' class='btn btn-sm btn-success'>voltar</button></a>
		</div>
	</div>
	<form class="form-horizontal" method="POST" action="administrativo/processa/cadastra/adm_proc_cad_eventos.php" enctype="multipart/form-data">
		<div class="form-group">
			<label class="col-sm-2 control-label">Nome do Evento</label>
			<div class="col-sm-10">
				<input type="text" name="evento" class="form-control" id="inputEmail3" placeholder="Nome do Evento">
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label">Data do Evento</label>
			<div class="col-sm-10">
				<input type="text" name="data" class="form-control" id="inputEmail3" placeholder="Data do Evento">
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label">Local</label>
			<div class="col-sm-10">
				<input type="text" name="local" class="form-control" id="inputEmail3" placeholder="Local">
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label">Link de uma pagina</label>
			<div class="col-sm-10">
				<input type="text" name="link" class="form-control" id="inputEmail3" placeholder="Link de uma pagina com mais informações">
			</div>
		</div>
					
		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
				<button type="submit" class="btn btn-success">Cadastrar</button>
			</div>
		</div>
	</form>
</div>