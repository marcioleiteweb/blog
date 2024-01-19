<?php
	$id = $_GET['id'];
	//Buscar os dados referente ao usuario situado neste id
	$result_vendas = "SELECT * FROM vendas WHERE id = '$id' LIMIT 1";
	$resultado_vendas = mysqli_query($conn, $result_vendas);
	$row_vendas = mysqli_fetch_assoc($resultado_vendas);	
?>
<div class="container theme-showcase" role="main">
	<div class="page-header">
        <h1>Visualizar Venda</h1>
	</div>
	<div class="row">
		<div class="pull-right" style="padding-bottom: 20px; ">
			<a href="administrativo.php?link=30">
				<button type='button' class='btn btn-sm btn-success'>Listar</button>
			</a>
			
			<a href="administrativo.php?link=32&id=<?php echo $row_vendas["id"]; ?>">
				<button type="button" class="btn btn-sm btn-warning">
					Editar
				</button>
			</a>
			
			<a href="administrativo/processa/adm_apagar_venda.php?id=<?php echo $row_vendas["id"]; ?>">
				<button type="button" class="btn btn-sm btn-danger">
					Apagar
				</button>
			</a>
		</div>
	</div>
	<dl class="dl-horizontal">		
		<dt>Id: </dt>
		<dd><?php echo $row_vendas['id']; ?></dd>
		<dt>Produto: </dt>
		<dd><?php 
			$produto_id = $row_vendas['produto_id'];
			$result_produtos = "SELECT * FROM produtos WHERE id = '$produto_id'";
			$result_produtos = mysqli_query($conn, $result_produtos);
			$row_produtos = mysqli_fetch_assoc($result_produtos);
			echo $row_produtos['nome']; ?>
		</dd>
		<dt>Situação da Venda: </dt>
		<dd><?php 
			$situacoes_venda_id = $row_vendas['situacoes_venda_id'];
			$result_situacoes_vendas = "SELECT * FROM situacoes_vendas WHERE id = '$situacoes_venda_id'";
			$result_situacoes_vendas = mysqli_query($conn, $result_situacoes_vendas);
			$row_situacoes_vendas = mysqli_fetch_assoc($result_situacoes_vendas);
			echo $row_situacoes_vendas['nome']; ?>
		</dd>
		<dt>Cliente: </dt>
		<dd><?php 
			if(isset($row_vendas['usuario_id'])){
				$usuario_id = $row_vendas['usuario_id'];
				$result_usuarios = "SELECT * FROM usuarios WHERE id = '$usuario_id'";
				$result_usuarios = mysqli_query($conn, $result_usuarios);
				$row_usuarios = mysqli_fetch_assoc($result_usuarios);
				echo $row_usuarios['nome']; 				
			}
			?>
		</dd>
		<dt>Data Venda: </dt>
		<dd><?php 
			if(isset($row_vendas['data_venda'])){
				$inserido = $row_vendas['data_venda'];
				echo date('d/m/Y H:i:s', strtotime($inserido)); 
			}?>
		</dd>
		<dt>Inserido: </dt>
		<dd><?php 
			if(isset($row_vendas['created'])){
				$inserido = $row_vendas['created'];
				echo date('d/m/Y H:i:s', strtotime($inserido)); 
			}?>
		</dd>
		<dt>Alterado: </dt>
		<dd><?php 
			if(isset($row_vendas['modified'])){				
				echo date('d/m/Y H:i:s',strtotime($row_vendas['modified'])); 
			} ?>
		</dd>
	</dl>
</div>