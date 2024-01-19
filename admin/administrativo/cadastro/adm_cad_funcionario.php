<div class="container theme-showcase" role="main">
	<div class="page-header">
        <h1>Cadastrar Funcionários</h1>
	</div>
	<div class="row">
		<div class="pull-right" style="padding-bottom: 20px; ">
			<a href="administrativo.php?link=52"><button type='button' class='btn btn-sm btn-success'>Listar</button></a>
		</div>
	</div>
	<form class="form-horizontal" method="POST" action="administrativo/processa/cadastra/adm_proc_cad_funcionario.php" enctype="multipart/form-data">
		<div class="form-group">
			<label class="col-sm-2 control-label">Nome Completo</label>
			<div class="col-sm-10">
				<input type="text" name="nome_completo" class="form-control" id="inputEmail3" placeholder="Nome Completo">
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label">RG</label>
			<div class="col-sm-10">
				<input type="text" name="rg" maxlength="9" class="form-control" id="inputEmail3" placeholder="Seu RG somente numeros">
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label">CPF</label>
			<div class="col-sm-10">
				<input type="text" name="cpf" maxlength="11" class="form-control" id="inputEmail3" placeholder="Seu CPF somente numeros">
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label">Data de Nascimento</label>
			<div class="col-sm-10">
				<input type="date" name="data_de_nascimento" class="form-control" id="inputEmail3" placeholder="">
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label">Cargo</label>
			<div class="col-sm-10">
				<input type="text" name="cargo" class="form-control" id="inputEmail3" placeholder="Cargo na Empresa">
			</div>
		</div>
		<div class="form-group">
			<label for="inputEmail3" class="col-sm-2 control-label">Observações</label>
			<div class="col-sm-10">
				<textarea name="observacoes" class="form-control" maxlength="1000" rows="5" id="inputEmail3" placeholder="Observações" required></textarea>
			</div>
		</div>	
		
		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
				<button type="submit" class="btn btn-success">Cadastrar</button>
			</div>
		</div>
	</form>
</div>