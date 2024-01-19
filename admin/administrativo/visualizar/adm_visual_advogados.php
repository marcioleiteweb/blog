<?php
	$id = $_GET['id'];
	//Buscar os dados referente ao usuario situado neste id
	$result_categorias_produtos = "SELECT * FROM vendedores WHERE id = '$id' LIMIT 1";
	$resultado_categorias_produtos = mysqli_query($conn, $result_categorias_produtos);
	$row_categorias_produtos = mysqli_fetch_assoc($resultado_categorias_produtos);

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
        <h1>Visualizar Gestor</h1>
	</div>
	<div class="row">
		<div class="pull-right" style="padding-bottom: 20px; ">
			<a href="administrativo.php?link=68">
				<button type='button' class='btn btn-sm btn-success'>Listar</button>
			</a>
			<?php if($row_categorias_permissao['gravar'] == 1){?>
			<a href="administrativo.php?link=71&id=<?php echo $row_categorias_produtos["id"]; ?>">
				<button type="button" class="btn btn-sm btn-warning">
					Editar
				</button>
			</a>
			<?php }?>
			<?php if($row_categorias_permissao['deletar'] == 1){?>	
			<a href="administrativo/processa/apaga/adm_apagar_advogados.php?id=<?php echo $row_categorias_produtos["id"]; ?>">
				<button type="button" class="btn btn-sm btn-danger">
					Apagar
				</button>
			</a>
			<?php }?>
		</div>
	</div>
	<dl class="dl-horizontal">
		<dt>Id: </dt>
		<dd><?php echo $row_categorias_produtos['id']; ?></dd>
		<dt>Nome Completo: </dt>
		<dd><?php echo $row_categorias_produtos['nome']; ?></dd>
		<dt>Email: </dt>
		<dd><?php echo $row_categorias_produtos['email']; ?></dd>
		<dt>Senha Cadastrada: </dt>
		<dd><?php echo $row_categorias_produtos['senha_real']; ?></dd>
		<dt>Numero WhatsApp: </dt>
		<dd><?php echo $row_categorias_produtos['whatsapp']; ?></dd>

	</dl>
</div>