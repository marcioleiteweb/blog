<?php
	$result_categorias_produtos = "SELECT * FROM  vendedores";
	$resultado_categorias_produtos = mysqli_query($conn , $result_categorias_produtos);
	
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
        <h1>Lista de Gestor</h1>
	</div>
	<div class="row espaco">
		<div class="pull-right">
			<?php if($row_categorias_permissao['gravar'] == 1){?>
			<a href="administrativo.php?link=70"><button type='button' class='btn btn-sm btn-success'>Cadastrar</button></a>
			<?php }?>
		</div>
	</div>
	<div class="row">
        <div class="col-md-12">
			<table class="table">
				<thead>
					<tr>
						<th class="text-center">Id</th>
						<th class="text-center">Nome Completo</th>
						<th class="text-center">WhatsApp</th>
						<th class="text-center">Ação</th>
					</tr>
				</thead>
				<tbody>
					<?php while($row_categorias_produtos = mysqli_fetch_assoc($resultado_categorias_produtos)){?>
						<tr>
							<td class="text-center"><?php echo $row_categorias_produtos["id"]; ?></td>
							<td class="text-center"><?php echo $row_categorias_produtos["nome"]; ?></td>
							<td class="text-center"><?php echo $row_categorias_produtos["whatsapp"]; ?></td>
							
							<td class="text-center">
							<?php if($row_categorias_permissao['visualizar'] == 1){?>
								<a href="administrativo.php?link=69&id=<?php echo $row_categorias_produtos["id"]; ?>">
									<button type="button" class="btn btn-xs btn-primary">
										Visualizar
									</button>
								</a>
							<?php }?>
							<?php if($row_categorias_permissao['gravar'] == 1){?>		
								<a href="administrativo.php?link=71&id=<?php echo $row_categorias_produtos["id"]; ?>">
									<button type="button" class="btn btn-xs btn-warning">
										Editar
									</button>
								</a>
							<?php }?>
							<?php if($row_categorias_permissao['deletar'] == 1){?>	
								<a href="administrativo/processa/apaga/adm_apagar_advogados.php?id=<?php echo $row_categorias_produtos["id"]; ?>">
									<button type="button" class="btn btn-xs btn-danger">
										Apagar
									</button>
								</a>
							<?php }?>	
							</td>
						</tr>
					<?php } ?>
				</tbody>
			</table>
        </div>
	</div>
</div>