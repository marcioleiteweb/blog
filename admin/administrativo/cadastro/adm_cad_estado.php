<div class="container theme-showcase" role="main">
	<div class="page-header">
        <h1>Cadastrar Estado</h1>
	</div>
	<div class="row">
		<div class="pull-right" style="padding-bottom: 20px; ">
			<a class='btn btn-sm btn-success' href="administrativo.php?link=20">
				Listar
			</a>
		</div>
	</div>
	<form class="form-horizontal" method="POST" action="administrativo/processa/cadastra/adm_proc_cad_estado.php" enctype="multipart/form-data">
		<div class="form-group">
			<label class="col-sm-2 control-label">Nome do Estado</label>
			<div class="col-sm-10">
				<input type="text" name="nome_estado" required class="form-control" id="inputEmail3" placeholder="Nome do Estado">
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
				<button type="submit" class="btn btn-success">Cadastrar</button>
			</div>
		</div>
	</form>
</div>