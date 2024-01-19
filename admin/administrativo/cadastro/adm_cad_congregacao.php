<div class="container theme-showcase" role="main">
	<div class="page-header">
        <h1>Cadastrar de Congregações</h1>
	</div>
	<div class="row">
		<div class="pull-right" style="padding-bottom: 20px; ">
			<a href="administrativo.php?link=12"><button type='button' class='btn btn-sm btn-success'>voltar</button></a>
		</div>
	</div>
	<form class="form-horizontal" method="POST" action="administrativo/processa/cadastra/adm_proc_cad_congregacao.php" enctype="multipart/form-data">
		<div class="form-group">
			<label class="col-sm-2 control-label">Igreja</label>
			<div class="col-sm-10">
				<input type="text" name="igreja" class="form-control" id="inputEmail3" placeholder="Igreja">
			</div>
		</div>
		
		<div class="form-group">
			<label class="col-sm-2 control-label">Nome do Pastor</label>
			<div class="col-sm-10">
				<input type="text" name="pastor" class="form-control" id="inputEmail3" placeholder="Nome do Pastor">
			</div>
		</div>
		
		<div class="form-group">
			<label class="col-sm-2 control-label">Horários</label>
			<div class="col-sm-10">
				<input type="text" name="horarios" class="form-control" id="inputEmail3" placeholder="Horários">
			</div>
		</div>
		
		<div class="form-group">
			<label class="col-sm-2 control-label">Endereço da congregação</label>
			<div class="col-sm-10">
				<input type="text" name="endereco" class="form-control" id="inputEmail3" placeholder="Endereço da congregação">
			</div>
		</div>	
		
		<div class="form-group">
			<label for="inputEmail3" class="col-sm-2 control-label">foto do pastor</label>
			<div class="col-sm-10">
				<input name="arquivo" type="file"/>
			</div>
		</div>		
					
		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
				<button type="submit" class="btn btn-success">Cadastrar</button>
			</div>
		</div>
	</form>
</div>