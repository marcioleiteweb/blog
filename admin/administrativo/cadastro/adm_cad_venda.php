<div class="container theme-showcase" role="main">
	<div class="page-header">
        <h1>Cadastrar Venda</h1>
	</div>
	<div class="row">
		<div class="pull-right" style="padding-bottom: 20px; ">
			<a href="administrativo.php?link=30"><button type='button' class='btn btn-sm btn-success'>Listar</button></a>
		</div>
	</div>
	<form class="form-horizontal" method="POST" action="administrativo/processa/adm_proc_cad_venda.php" enctype="multipart/form-data">
	
		<div class="form-group">
			<label class="col-sm-2 control-label">Produto</label>
			<div class="col-sm-10">
				<select class="form-control" name="produto_id">
					<option>Selecione</option>
					<?php
					$result_produtos = "SELECT * FROM produtos";
					$result_produtos = mysqli_query($conn, $result_produtos);
					while($row_produtos = mysqli_fetch_assoc($result_produtos)){ ?> 
						<option value="<?php echo $row_produtos['id']; ?>"><?php echo $row_produtos['nome']; ?></option>
					<?php } ?>
				</select>
			</div>
		</div>
		
		<div class="form-group">
			<label class="col-sm-2 control-label">Situação da Venda</label>
			<div class="col-sm-10">
				<select class="form-control" name="situacoes_venda_id">
					<option>Selecione</option>
					<?php
					$result_situacoes_vendas = "SELECT * FROM situacoes_vendas";
					$result_situacoes_vendas = mysqli_query($conn, $result_situacoes_vendas);
					while($row_situacoes_vendas = mysqli_fetch_assoc($result_situacoes_vendas)){ ?> 
						<option value="<?php echo $row_situacoes_vendas['id']; ?>"><?php echo $row_situacoes_vendas['nome']; ?></option>
					<?php } ?>
				</select>
			</div>
		</div>
		
		<div class="form-group">
			<label class="col-sm-2 control-label">Cliente</label>
			<div class="col-sm-10">
				<select class="form-control" name="usuario_id">
					<option>Selecione</option>
					<?php
					$result_usuarios = "SELECT * FROM usuarios";
					$result_usuarios = mysqli_query($conn, $result_usuarios);
					while($row_usuarios = mysqli_fetch_assoc($result_usuarios)){ ?> 
						<option value="<?php echo $row_usuarios['id']; ?>"><?php echo $row_usuarios['nome']; ?></option>
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