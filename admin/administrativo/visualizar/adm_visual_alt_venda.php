<?php
	$id = $_GET['id'];
	//Buscar os dados referente ao usuario situado neste id
	$result_alt_vendas = "SELECT * FROM alteracoes_sitacoes_vendas WHERE id = '$id' LIMIT 1";
	$resultado_alt_vendas = mysqli_query($conn, $result_alt_vendas);
	$row_alt_vendas = mysqli_fetch_assoc($resultado_alt_vendas);	
?>
<div class="container theme-showcase" role="main">
	<div class="page-header">
        <h1>Visualizar Alteração na Venda</h1>
	</div>
	<div class="row">
		<div class="pull-right" style="padding-bottom: 20px; ">
			<a href="administrativo.php?link=34">
				<button type='button' class='btn btn-sm btn-success'>Listar</button>
			</a>
			
			<a href="administrativo.php?link=36&id=<?php echo $row_alt_vendas["id"]; ?>">
				<button type="button" class="btn btn-sm btn-warning">
					Editar
				</button>
			</a>
			
			<a href="administrativo/processa/adm_apagar_alt_venda.php?id=<?php echo $row_alt_vendas["id"]; ?>">
				<button type="button" class="btn btn-sm btn-danger">
					Apagar
				</button>
			</a>
		</div>
	</div>
	<dl class="dl-horizontal">		
		<dt>Id: </dt>
		<dd><?php echo $row_alt_vendas['id']; ?></dd>
		<dt>Número da Venda: </dt>
		<dd><?php 
			$venda_id = $row_alt_vendas['venda_id'];
			$result_vendas = "SELECT * FROM vendas WHERE id = '$venda_id'";
			$result_vendas = mysqli_query($conn, $result_vendas);
			$row_vendas = mysqli_fetch_assoc($result_vendas);
			echo $row_vendas['id']; ?>
		</dd>
		<dt>Situação da Venda: </dt>
		<dd><?php 
			$situacoes_venda_id = $row_alt_vendas['situacoes_venda_id'];
			$result_situacoes_vendas = "SELECT * FROM situacoes_vendas WHERE id = '$situacoes_venda_id'";
			$result_situacoes_vendas = mysqli_query($conn, $result_situacoes_vendas);
			$row_situacoes_vendas = mysqli_fetch_assoc($result_situacoes_vendas);
			echo $row_situacoes_vendas['nome']; ?>
		</dd>
		<dt>Inserido: </dt>
		<dd><?php 
			if(isset($row_alt_vendas['created'])){
				$inserido = $row_alt_vendas['created'];
				echo date('d/m/Y H:i:s', strtotime($inserido)); 
			}?>
		</dd>
		<dt>Alterado: </dt>
		<dd><?php 
			if(isset($row_alt_vendas['modified'])){				
				echo date('d/m/Y H:i:s',strtotime($row_alt_vendas['modified'])); 
			} ?>
		</dd>
	</dl>
</div>