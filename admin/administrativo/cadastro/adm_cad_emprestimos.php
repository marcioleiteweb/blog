<div class="container theme-showcase" role="main">
	<div class="page-header">
        <h1>Cadastrar Emprestimos</h1>
	</div>
	<div class="row">
		<div class="pull-right" style="padding-bottom: 20px; ">
			<a href="administrativo.php?link=56"><button type='button' class='btn btn-sm btn-success'>Listar</button></a>
		</div>
	</div>
	<form class="form-horizontal" method="POST" action="administrativo/processa/cadastra/adm_proc_cad_emprestimo.php" enctype="multipart/form-data">
		<div class="form-group">
			<label class="col-sm-2 control-label">Tipo de Emprestimo</label>
			<div class="col-sm-10">
				<input type="text" name="tipo_emprestimo" class="form-control" id="inputEmail3" placeholder="Tipo de Emprestimo">
			</div>
		</div>

		<div class="form-group">
			<label class="col-sm-2 control-label">Data do Emprestimo</label>
			<div class="col-sm-10">
				<input type="date" name="data_emprestimo" class="form-control" id="inputEmail3" placeholder="">
			</div>
		</div>
		
		<div class="form-group">
			<label class="col-sm-2 control-label">Valor Total</label>
			<div class="col-sm-10">
				<input type="text" name="valor" class="form-control" id="inputEmail3" placeholder="Valor Total">
			</div>
		</div>
		
		<div class="form-group">
			<label class="col-sm-2 control-label">Numero de Parcelamento</label>
			<div class="col-sm-10">
				<select class="form-control" name="numero_parcelamento">
					<option>Selecione</option>
						<option value="1x">1x</option>
						<option value="2x">2x</option>
						<option value="3x">3x</option>
						<option value="4x">4x</option>
						<option value="5x">5x</option>
						<option value="6x">6x</option>
						<option value="7x">7x</option>
						<option value="8x">8x</option>
						<option value="9x">9x</option>
						<option value="10x">10x</option>
						<option value="11x">11x</option>
						<option value="12x">12x</option>
				</select>
			</div>
		</div>

		
		
		
		
		<div class="form-group">
			<label class="col-sm-2 control-label">Qual Funcionário</label>
			<div class="col-sm-10">
				<select class="form-control" name="id_funcionario">
					<option>Selecione</option>
					<?php
					$result_categorias_produtos = "SELECT * FROM funcionarios";
					$result_categorias_produtos = mysqli_query($conn, $result_categorias_produtos);
					while($row_categorias_produtos = mysqli_fetch_assoc($result_categorias_produtos)){ ?> 
						<option value="<?php echo $row_categorias_produtos['id']; ?>"><?php echo $row_categorias_produtos['nome_completo']; ?></option>
					<?php } ?>
				</select>
			</div>
		</div>	
		
		<div class="form-group">
			<label class="col-sm-2 control-label">Situação do Emprestimo</label>
			<div class="col-sm-10">
				<select class="form-control" name="status_emprestimo">
					<option>Selecione</option>
					<?php
					$result_situacoes_produtos = "SELECT * FROM status_emprestimos";
					$result_situacoes_produtos = mysqli_query($conn, $result_situacoes_produtos);
					while($row_situacoes_produtos = mysqli_fetch_assoc($result_situacoes_produtos)){ ?> 
						<option value="<?php echo $row_situacoes_produtos['id']; ?>"><?php echo $row_situacoes_produtos['status']; ?></option>
					<?php } ?>
				</select>
			</div>
		</div>

		
		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
				<button type="submit" class="btn btn-success">Cadastrar</button>
			</div>
		</div>
	</form>
</div>