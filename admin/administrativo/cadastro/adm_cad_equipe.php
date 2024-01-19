<div class="container theme-showcase" role="main">
	<div class="page-header">
        <h1>Cadastrar Membro da Equipe</h1>
	</div>
	<div class="row">
		<div class="pull-right" style="padding-bottom: 20px; ">
			<a href="administrativo.php?link=17"><button type='button' class='btn btn-sm btn-success'>voltar</button></a>
		</div>
	</div>
	<form class="form-horizontal" id="adm_cad_artigos" method="POST" action="administrativo/processa/cadastra/adm_proc_cad_equipe.php" enctype="multipart/form-data">
		<div class="form-group">
			<label class="col-sm-2 control-label">Nome</label>
			<div class="col-sm-10">
				<input type="text" name="nome" class="form-control" required id="inputEmail3" placeholder="Nome">
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label">Cargo</label>
			<div class="col-sm-10">
				<input type="text" name="cargo" class="form-control" required id="inputEmail3" placeholder="Cargo">
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label">Link do facebook</label>
			<div class="col-sm-10">
				<input type="text" name="link_face" class="form-control" required id="inputEmail3" placeholder="Link do facebook">
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label">Link do instagram</label>
			<div class="col-sm-10">
				<input type="text" name="link_insta" class="form-control" required id="inputEmail3" placeholder="Link do instagram">
			</div>
		</div>

		<div class="form-group">
			<label for="inputEmail3" class="col-sm-2 control-label">foto do menbro</label>
			<div class="col-sm-10">
				<input name="arquivo" type="file"/>
			</div>
		</div>		
		
		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
				<button type="submit" class="btn btn-success" onclick="tinyMCE.triggerSave();">Cadastrar</button>
			</div>
		</div>
		
		
	</form>
</div>