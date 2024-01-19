<?php
	$id = $_GET['id'];
	//Buscar os dados referente ao usuario situado neste id
	$result_cliente = "SELECT * FROM clientes WHERE id = '$id' LIMIT 1";
	$resultado_cliente = mysqli_query($conn, $result_cliente);
	$row_cliente = mysqli_fetch_assoc($resultado_cliente);
	
	if(isset($_SESSION['usuarioId_adv'])){
		$id_adv = $_SESSION['usuarioId_adv'];
	}else{
		$id_adv = "0";
	}

	if(isset($_SESSION['usuarioNiveisAcessoId'])){
		$id_permissao = $_SESSION['usuarioNiveisAcessoId'];
	}elseif(isset($_SESSION['usuarioNiveisAcessoId_adv'])){
		$id_permissao = $_SESSION['usuarioNiveisAcessoId_adv'];
	}elseif(isset($_SESSION['usuarioNiveisAcessoId_cli'])){
		$id_permissao = $_SESSION['usuarioNiveisAcessoId_cli'];	
	}		
	//Buscar os dados referente ao usuario situado neste id
	$result_permissao = "SELECT * FROM niveis_acessos WHERE id = '$id_permissao' LIMIT 1";
	$resultado_permissao = mysqli_query($conn, $result_permissao);
	$row_categorias_permissao = mysqli_fetch_assoc($resultado_permissao);		
?>

<div class="container theme-showcase" role="main">
	<div class="page-header">
        <h1>Visualizar Cliente e oportunidades</h1>
	</div>
	<?php if(isset($_SESSION['usuarioId_cli'])){?>
	<div class="row">
		<div class="pull-right" style="padding-bottom: 20px; ">
				<button type="button" class="btn btn-sm btn-primary">
					Acesso somente Vizualizar
				</button>
		</div>
	</div>
	<?php }else{?>
	<div class="row">
		<div class="pull-right" style="padding-bottom: 20px; ">
			<a href="administrativo.php?link=72">
				<button type='button' class='btn btn-sm btn-success'>Listar</button>
			</a>
			<?php if($row_categorias_permissao['gravar'] == 1){?>
			<a href="administrativo.php?link=75&id=<?php echo $row_cliente["id"]; ?>">
				<button type="button" class="btn btn-sm btn-warning">
					Editar
				</button>
			</a>
			<?php }?>
			<?php if($row_categorias_permissao['deletar'] == 1){?>	
			<a href="administrativo/processa/apaga/adm_apagar_clientes.php?id=<?php echo $row_cliente["id"]; ?>">
				<button type="button" class="btn btn-sm btn-danger">
					Apagar
				</button>
			</a>
			<?php }?>
		</div>
	</div>
	<?php }?>
	<dl class="dl-horizontal">
	
	<?php if($id_adv == 0){?>
		<dt>Id: </dt>
		<dd><?php echo $row_cliente['id']; ?></dd>
		<dt>Nome Completo: </dt>
		<dd><?php echo $row_cliente['nome']; ?></dd>
		<dt>Email: </dt>
		<dd><?php echo $row_cliente['email']; ?></dd>
		<dt>Senha Cadastrada: </dt>
		<dd><?php echo $row_cliente['senha_real']; ?></dd>
		<dt>WhatsApp: </dt>
		<dd><?php echo $row_cliente['whatsapp']; ?></dd>
		<dt>CPF ou CNPJ: </dt>
		<dd><?php echo $row_cliente['cpf']; ?></dd>
	<?php }else{}?>	
		
		<dt>Observações: </dt>
		<dd class="alert alert-success bg-success text-light border-0 alert-dismissible fade show"><?php echo $row_cliente['descricao']; ?></dd>
		<dt>Qual Gestor de Trabalho: </dt>
		<dd>
		<?php 
			$categorias_produto_id = $row_cliente['id_advogado'];
			$result_categorias_produtos = "SELECT * FROM vendedores WHERE id = '$categorias_produto_id'";
			$result_categorias_produtos = mysqli_query($conn, $result_categorias_produtos);
			$row_categorias_produtos = mysqli_fetch_assoc($result_categorias_produtos);
			echo $row_categorias_produtos['nome']; 
		?>
		</dd>
	</dl>
</div>


<?php
	$result_cliente_tarefas = "SELECT * FROM tarefas WHERE id_cliente = '$id'";
	$resultado_cliente_tarefas = mysqli_query($conn , $result_cliente_tarefas);
?>
<div class="container theme-showcase" role="main">
	<div class="page-header">
        <h1>Lista de Oportunidades</h1>
	</div>
	<div class="row espaco">
		<div class="pull-right">
		<?php if($row_categorias_permissao['gravar'] == 1){?>
			<?php if(isset($_SESSION['usuarioNiveisAcessoId_cli'])){?>
			<?php }else{?>
				<a href="administrativo.php?link=77&id_cliente=<?php echo $row_cliente['id']; ?>"><button type='button' class='btn btn-sm btn-success'>Cadastrar</button></a>				
			<?php }?>
		<?php }?>
		</div>
	</div>
	<div class="row">
        <div class="col-md-12">
			<table class="table">
				<thead>
					<tr>
						<th class="text-center">Id</th>
						<th class="text-center">Oportunidade</th>
						<th class="text-center">status</th>
						<th class="text-center">Data Criada</th>
						<th class="text-center">Ação</th>
					</tr>
				</thead>
				<tbody>
					<?php while($row_cliente_tarefas = mysqli_fetch_assoc($resultado_cliente_tarefas)){?>
						<tr>
							<td class="text-center"><?php echo $row_cliente_tarefas["id"]; ?></td>
							<td class="text-center"><?php echo $row_cliente_tarefas["nome_tarefa"]; ?></td>
							<td class="text-center"><?php echo $row_cliente_tarefas["status_tarefa"]; ?></td>
							<td class="text-center"><?php echo $row_cliente_tarefas["data_criada"]; ?></td>
					
							
							<td class="text-center">
							<?php if($row_categorias_permissao['visualizar'] == 1){?>
								<a href="administrativo.php?link=76&id=<?php echo $row_cliente_tarefas["id"]; ?>">
									<button type="button" class="btn btn-xs btn-primary">
										Visualizar
									</button>
								</a>
							<?php }?>	
							<?php if(isset($_SESSION['usuarioId_cli'])){?>
							
							<?php }else{?>
								<?php if($row_categorias_permissao['gravar'] == 1){?>
								<a href="administrativo.php?link=78&id=<?php echo $row_cliente_tarefas["id"]; ?>">
									<button type="button" class="btn btn-xs btn-warning">
										Editar
									</button>
								</a>
								<?php }?>
								<?php if($row_categorias_permissao['deletar'] == 1){?>								
								<a href="administrativo/processa/apaga/adm_apagar_tarefas.php?id=<?php echo $row_cliente_tarefas["id"]; ?>">
									<button type="button" class="btn btn-xs btn-danger">
										Apagar
									</button>
								</a>
								<?php }?>
							<?php }?>
							</td>
						</tr>
					<?php } ?>
				</tbody>
			</table>
        </div>
	</div>
</div>