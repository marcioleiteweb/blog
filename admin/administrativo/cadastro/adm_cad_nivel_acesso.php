<div class="container theme-showcase" role="main">
	<div class="page-header">
        <h1>Cadastrar Nivel de Acesso</h1>
	</div>
	<div class="row">
		<div class="pull-right" style="padding-bottom: 20px; ">
			<a href="administrativo.php?link=6"><button type='button' class='btn btn-sm btn-success'>Listar</button></a>
		</div>
	</div>
	<form class="form-horizontal" method="POST" action="administrativo/processa/cadastra/adm_proc_cad_nivel_acesso.php" enctype="multipart/form-data">
		<div class="form-group">
			<label class="col-sm-2 control-label">Nome</label>
			<div class="col-sm-10">
				<input type="text" name="nome" class="form-control" id="inputEmail3" placeholder="Nome do Nível de Acesso">
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label">Permissões</label>
			<div class="col-sm-10">
				<div class="form-check">
					<input name="visualizar" value="1" type="checkbox" class="form-check-input" id="exampleCheck1">
					<label class="form-check-label" for="exampleCheck1">Visualizar</label>
				</div>
				<div class="form-check">
					<input name="gravar" value="1" type="checkbox" class="form-check-input" id="exampleCheck1">
					<label class="form-check-label" for="exampleCheck1">Gravar</label>
				</div>
				<div class="form-check">
					<input name="deletar" value="1" type="checkbox" class="form-check-input" id="exampleCheck1">
					<label class="form-check-label" for="exampleCheck1">Deletar</label>
				</div>
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
				<button type="submit" class="btn btn-success">Cadastrar</button>
			</div>
		</div>
	</form>
</div>