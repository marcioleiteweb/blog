<?php
	$id = $_GET['id'];
	//Buscar os dados referente ao usuario situado neste id
	$result_categorias_produtos = "SELECT * FROM funcionarios WHERE id = '$id' LIMIT 1";
	$resultado_categorias_produtos = mysqli_query($conn, $result_categorias_produtos);
	$row_categorias_produtos = mysqli_fetch_assoc($resultado_categorias_produtos);	
?>
<div class="container theme-showcase" role="main">
	<div class="page-header">
        <h1>Editar Funcinário</h1>
	</div>
	<div class="row">
		<div class="pull-right" style="padding-bottom: 20px; ">
			<a href="administrativo.php?link=52"><button type='button' class='btn btn-sm btn-success'>Listar</button></a>
		</div>
	</div>
	<form class="form-horizontal" method="POST" action="administrativo/processa/edita/adm_proc_edita_funcionario.php" enctype="multipart/form-data">		
		<div class="form-group">
			<label class="col-sm-2 control-label">Nome Completo</label>
			<div class="col-sm-10">
				<input type="text" name="nome_completo" class="form-control" id="inputEmail3" value="<?php echo $row_categorias_produtos['nome_completo']; ?>">
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label">RG</label>
			<div class="col-sm-10">
				<input type="text" name="rg" maxlength="9" class="form-control" id="inputEmail3" value="<?php echo $row_categorias_produtos['rg']; ?>">
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label">CPF</label>
			<div class="col-sm-10">
				<input type="text" name="cpf" maxlength="11" class="form-control" id="inputEmail3" value="<?php echo $row_categorias_produtos['cpf']; ?>">
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label">Data de Nascimento</label>
			<div class="col-sm-10">
				<input type="date" name="data_de_nascimento" class="form-control" id="inputEmail3" value="<?php echo date('d/m/Y',strtotime($row_categorias_produtos["data_de_nascimento"])); ?>">
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label">Cargo</label>
			<div class="col-sm-10">
				<input type="text" name="cargo" class="form-control" id="inputEmail3" value="<?php echo $row_categorias_produtos['cargo']; ?>">
			</div>
		</div>
		<div class="form-group">
			<label for="inputEmail3" class="col-sm-2 control-label">Observações</label>
			<div class="col-sm-10">
				<textarea name="observacoes" class="form-control" maxlength="1000" rows="5" id="inputEmail3" placeholder="Observações" required>
				<?php echo $row_categorias_produtos['observacoes']; ?>
				</textarea>
			</div>
		</div>
		
		<input type="hidden" name="id" value="<?php echo $row_categorias_produtos['id']; ?>">
		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
				<button type="submit" class="btn btn-warning">Alterar</button>
			</div>
		</div>
	</form>
</div>