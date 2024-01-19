<div class="container theme-showcase" role="main">
	<div class="page-header">
        <h1>Cadastrar Testemunho</h1>
	</div>
	<div class="row">
		<div class="pull-right" style="padding-bottom: 20px; ">
			<a href="administrativo.php?link=16"><button type='button' class='btn btn-sm btn-success'>voltar</button></a>
		</div>
	</div>
	<form class="form-horizontal" method="POST" action="administrativo/processa/cadastra/adm_proc_cad_lives.php" enctype="multipart/form-data">
		<div class="form-group">
			<label class="col-sm-2 control-label">Nome da Live</label>
			<div class="col-sm-10">
				<input type="text" name="nome" class="form-control" id="inputEmail3" placeholder="Nome da Live">
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label">Link da live</label>
			<div class="col-sm-10">
				<input type="text" name="link" class="form-control" id="inputEmail3" placeholder="Link da live">
			</div>
		</div>	
		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
				<button type="submit" class="btn btn-success">Cadastrar</button>
			</div>
		</div>
	</form>
</div>