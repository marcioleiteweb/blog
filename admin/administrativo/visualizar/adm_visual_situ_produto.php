<?php
	$id = $_GET['id'];
	//Buscar os dados referente ao usuario situado neste id
	$result_situacoes_produtos = "SELECT * FROM situacoes_produtos WHERE id = '$id' LIMIT 1";
	$resultado_situacoes_produtos = mysqli_query($conn, $result_situacoes_produtos);
	$row_situacoes_produtos = mysqli_fetch_assoc($resultado_situacoes_produtos);	
?>
<div class="container theme-showcase" role="main">
	<div class="page-header">
        <h1>Visualizar Situação</h1>
	</div>
	<div class="row">
		<div class="pull-right" style="padding-bottom: 20px; ">
			<a href="administrativo.php?link=22">
				<button type='button' class='btn btn-sm btn-success'>Listar</button>
			</a>
			
			<a href="administrativo.php?link=24&id=<?php echo $row_situacoes_produtos["id"]; ?>">
				<button type="button" class="btn btn-sm btn-warning">
					Editar
				</button>
			</a>
			
			<a href="administrativo/processa/adm_apagar_situ_produto.php?id=<?php echo $row_situacoes_produtos["id"]; ?>">
				<button type="button" class="btn btn-sm btn-danger">
					Apagar
				</button>
			</a>
		</div>
	</div>
	<dl class="dl-horizontal">
		<dt>Id: </dt>
		<dd><?php echo $row_situacoes_produtos['id']; ?></dd>
		<dt>Nome: </dt>
		<dd><?php echo $row_situacoes_produtos['nome']; ?></dd>
		<dt>Inserido: </dt>
		<dd><?php 
			if(isset($row_situacoes_produtos['created'])){
				$inserido = $row_situacoes_produtos['created'];
				echo date('d/m/Y H:i:s', strtotime($inserido)); 
			}?>
		</dd>
		<dt>Alterado: </dt>
		<dd><?php 
			if(isset($row_situacoes_produtos['modified'])){				
				echo date('d/m/Y H:i:s',strtotime($row_situacoes_produtos['modified'])); 
			} ?>
		</dd>
	</dl>
</div>