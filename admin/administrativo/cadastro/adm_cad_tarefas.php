<div class="container theme-showcase" role="main">
	<div class="page-header">
        <h1>Cadastrar Oportunidade</h1>
	</div>
	<div class="row">
		<div class="pull-right" style="padding-bottom: 20px; ">
			<a href="administrativo.php?link=72"><button type='button' class='btn btn-sm btn-success'>Listar</button></a>
		</div>
	</div>
	<form class="form-horizontal" method="POST" action="administrativo/processa/cadastra/adm_proc_cad_tarefas.php" enctype="multipart/form-data">
		<div class="form-group">
			<label class="col-sm-2 control-label">Nome</label>
			<div class="col-sm-10">
				<input type="text" name="nome_tarefa" required class="form-control" id="inputEmail3" placeholder="Nome">
			</div>
		</div>
		
		
		<div class="form-group">
			<label for="inputEmail3" class="col-sm-2 control-label">Descrição</label>
			<div class="col-sm-10">
				<textarea id="mytextarea1" name="descricao_tarefa" class="form-control" maxlength="800" rows="7" id="inputEmail3" placeholder="Descrição" required></textarea>
			</div>
		</div>	
		
		<div class="form-group">
			<label class="col-sm-2 control-label">Valor</label>
			<div class="col-sm-10">
				<input type="text" name="valor" required class="form-control" id="inputEmail3" placeholder="Valor: Ex: 750,00">
			</div>
		</div>
		
	


		<div class="form-group">
			<label class="col-sm-2 control-label">Status</label>
			<div class="col-sm-10">
				<select class="form-control" name="status_tarefa">
					<option>Selecione</option>	 
						<option value="Em Andamento">Em Andamento</option>
						<option value="Aguardando">Aguardando</option>
						<option value="Orçamento">Orçamento</option>
						<option value="Concluido">Concluido</option>
						<option value="Cancelado">Cancelado</option>
				</select>
			</div>
		</div>
		
		<div class="form-group">
			<label class="col-sm-2 control-label">Cliente</label>
			<div class="col-sm-10">
				<select class="form-control" name="select_cliente">
					<?php
					$id_cliente = $_GET['id_cliente'];
					$result_situacao = "SELECT * FROM clientes WHERE id = '$id_cliente'";
					$result_situacao = mysqli_query($conn, $result_situacao);
					while($row_situacoes = mysqli_fetch_assoc($result_situacao)){ ?> 
						<option value="<?php echo $row_situacoes['id']; ?>"><?php echo $row_situacoes['nome']; ?></option>
					<?php } ?>
				</select>
			</div>
		</div>

		<div class="form-group">
			<label class="col-sm-2 control-label">Parceiro de Job</label>
			<div class="col-sm-10">
				<select class="form-control" name="select_vendedor">
					<?php
					$result_chama_cliente = "SELECT * FROM clientes WHERE id = '$id_cliente'";
					$result_chama_cliente = mysqli_query($conn, $result_chama_cliente);
					$row_chama_cliente = mysqli_fetch_assoc($result_chama_cliente);	
					$id_vendedor = $row_chama_cliente['id_advogado'];
					
					$result_vendedor = "SELECT * FROM vendedores WHERE id = '$id_vendedor'";
					$result_vendedor = mysqli_query($conn, $result_vendedor);
					while($row_vendedor = mysqli_fetch_assoc($result_vendedor)){ ?> 
						<option value="<?php echo $row_vendedor['id']; ?>"><?php echo $row_vendedor['nome']; ?></option>
					<?php } ?>
				</select>
			</div>
		</div>	

		
		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
				<button type="submit" class="btn btn-success" onclick="return tinyMCE.triggerSave();">Cadastrar</button>
			</div>
		</div>
	</form>
</div>