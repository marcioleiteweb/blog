<div class="container theme-showcase" role="main">
	<div class="page-header">
        <h1>Cadastrar Gestor</h1>
	</div>
	<div class="row">
		<div class="pull-right" style="padding-bottom: 20px; ">
			<a href="administrativo.php?link=68"><button type='button' class='btn btn-sm btn-success'>Listar</button></a>
		</div>
	</div>
	<form class="form-horizontal" method="POST" action="administrativo/processa/cadastra/adm_proc_cad_advogados.php" enctype="multipart/form-data">
		<div class="form-group">
			<label class="col-sm-2 control-label">Nome</label>
			<div class="col-sm-10">
				<input type="text" name="nome" required class="form-control" id="inputEmail3" placeholder="Nome Completo">
			</div>
		</div>
		
		<div class="form-group">
			<label class="col-sm-2 control-label">E-mail</label>
			<div class="col-sm-10">
				<input type="email" name="email" required class="form-control" id="inputEmail3" placeholder="Coloque aqui seu melhor email">
			</div>
		</div>
		
		<div class="form-group">
			<label class="col-sm-2 control-label">Senha</label>
			<div class="col-sm-10">
				<input type="password" name="senha" required class="form-control" id="inputPassword3" placeholder="Senha">
			</div>
		</div>
		
		<div class="form-group">
			<label class="col-sm-2 control-label">WhatsApp</label>
			<div class="col-sm-10">
				<input type="text" name="whatsapp" required class="form-control" id="inputEmail3" placeholder="Número de WhatsApp">
			</div>
		</div>

		<div class="form-group">
			<label class="col-sm-2 control-label">Situação</label>
			<div class="col-sm-10">
				<select class="form-control" name="select_situacao">
					<option>Selecione</option>
					<?php
					$result_situacao = "SELECT * FROM situacoes";
					$result_situacao = mysqli_query($conn, $result_situacao);
					while($row_situacoes = mysqli_fetch_assoc($result_situacao)){ ?> 
						<option value="<?php echo $row_situacoes['id']; ?>"><?php echo $row_situacoes['nome']; ?></option>
					<?php } ?>
				</select>
			</div>
		</div>	
		
		<div class="form-group">
			<label class="col-sm-2 control-label">Nivel de Acesso</label>
			<div class="col-sm-10">
				<select class="form-control" name="select_nivel_acesso">
					<option>Selecione</option>
					<?php
					$result_niveis_acessos = "SELECT * FROM niveis_acessos";
					$result_niveis_acessos = mysqli_query($conn, $result_niveis_acessos);
					while($row_niveis_acessos = mysqli_fetch_assoc($result_niveis_acessos)){ ?> 
						<option value="<?php echo $row_niveis_acessos['id']; ?>"><?php echo $row_niveis_acessos['nome']; ?></option>
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